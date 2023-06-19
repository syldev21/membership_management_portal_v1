<?php

namespace App\Http\Controllers;

use App\Conf\Config;
use App\Mail\ForgotPassword;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Calculation\DateTime;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function loginPage(){
        return view('auth.login');
    }
    public function registrationPage(){
        return view('auth.register');
    }
    public function index(){
//        return view('auth.login');
        return view('welcome');
    }
    public function register(){
        if (session()->has('loggedInUser')){
            return redirect('/profile');
        }else{
            return view('auth.register');
        }
    }
    public function forgot(){
        if (session()->has('loggedInUser')){
            return redirect('/profile');
        }else {
            return view('auth.forgot');
        }
    }
    public function reset(Request $request){
        $email = $request->email;
        $token = $request->token;
        return view('auth.reset', ['email'=>$email, 'token'=>$token]);
    }

    //handle terms review ajax request
    public function reviewTerms(Request $request){
            if ($request->review_value == 1){
                $alert_status = 200;
                $alert_message = 'Thank you for accepting our terms! You will be redirected to the registration page to continue with registration!';
            }else{
                $alert_status = 401;
                $alert_message = 'Thank you for your review! However, you cannot proceed with the registration without accepting our terms!';
            }
            return response()->json([
                'status'=>$alert_status,
                'messages'=>$alert_message
            ]);
    }
    //handle register user ajax request
    public function saveUser(Request $request){
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|max:50',
            'otherNames' => 'required|max:50',
            'email' => 'nullable|email|unique:users|max:100',
            'password' => 'required|min:6|max:50',
            'confirm_password' => 'required|min:6|same:password',
            'terms' => 'accepted', // Use 'accepted' rule for checkbox validation
        ], [
            'confirm_password.same' => 'Password did not match!',
            'confirm_password.required' => 'Confirm password is required!',
            'terms.accepted' => 'You need to read and accept our terms and conditions!',
        ]
        );

        if ($validator->fails()) {
            return response()->json(['messages' => $validator->messages()], 422);
        }else{
          $fullName = implode(' ', [$request->firstName, $request->otherNames]);

          $member = User::orderBy("id","DESC")->first();
          if(isset($member->member_number))
          {
              $memberNoArray = explode('/',$member->member_number);

              $lastArrayElement = end($memberNoArray);
              $lastArrayElement++;
              array_pop($memberNoArray);
              array_push($memberNoArray,$lastArrayElement);
              $member_number = implode('/',$memberNoArray);
          }else
          {
              $member_number = 'VOSHC/BB/1';
          }

          $memberNoArray = explode('/',$member_number);
          $lastArrayElement = end($memberNoArray);
          $updatedLastArrayElement = str_pad($lastArrayElement, 5, '0', STR_PAD_LEFT);
          array_pop($memberNoArray);
          array_push($memberNoArray,$updatedLastArrayElement);
          $member_number = implode('/',$memberNoArray);

          // Get the last part of the member number after the last forward slash
          $parts = explode('/', $member_number);
          $last_part = end($parts);

// Determine the length of the last part of the member number
          $length = strlen($last_part);

// Determine the number of leading zeros in the last part of the member number
          $num_zeros = strspn($last_part, "0");

// Extract the appropriate number of digits from the last part of the member number
          if ($num_zeros >= 2) {
              $digits = substr($last_part, -3);
//              $last_three = substr($string, -3)
          } elseif ($num_zeros == 1) {
              $digits = substr($last_part, -4);
          } else {
              $digits = $last_part;
          }

// Pad the digits with leading zeros if necessary
//          $digits = str_pad($digits, 4, "0", STR_PAD_LEFT);

// Concatenate the first name and digits to create the username
          $username = $request->firstName . $digits;
          $user = new User();
          $user->name = $fullName;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $user->user_name = $username;
          $user->member_number = $member_number;
          $user->registration_status = config('membership.registration_statuses.church_approved.id');
          $user->save();

            if (Str::contains($request->email, 'voshburuburu') && Str::contains($fullName, 'Admin')) {
                User::where('id', $user->id)->update(['title'=>config('membership.title.admin.id')]);
            $role = Role::findByName('Admin')->first(); // Find the 'Admin' role by its name
            if ($role) {
                $user->roles()->sync($role->id); // Assign the role to the user
                $user->refresh(); // Refresh the user model

                // Sync the permissions for the user
                $permissions = $role->permissions()->pluck('id')->toArray();
                $user->permissions()->sync($permissions);
            }
                return  response()->json([
                    'status'=>200,
                    'messages'=>'Admin Registered Successfully;&nbsp; Your username is '.$username.' <a href="/login">Login Now</a>',
                ]);
        }else{
                return  response()->json([
                    'status'=>200,
                    'messages'=>'Registered Successfully;&nbsp; Your username is '.$username.' <a href="/login">Login Now</a>',
                ]);
            }

      }
    }
//    handle login user ajax request
    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required|min:6|max:100',
        ], [
            'login.required' => 'Kindly enter the system generated username or the email you used for registration!',
            'password.required' => 'The password field is required!',
            'password.min' => 'The password must be at least 6 characters!',
            'password.max' => 'The password may not be greater than 100 characters!',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'messages' => $validator->errors(),
            ]);
        }

        $credentials = $request->only('login', 'password');
        $usernameValid = Auth::attempt([
            'user_name' => $credentials['login'],
            'password' => $credentials['password']
        ]);

        $emailValid = Auth::attempt([
            'email' => $credentials['login'],
            'password' => $credentials['password']
        ]);

        if ($usernameValid || $emailValid) {
            $request->session()->put('loggedInUser', Auth::id());
            return response()->json([
                'status' => 200,
                'messages' => 'Success',
            ]);
        } else {
            return response()->json([
                'status' => 422,
                'messages' => 'Wrong login and  password combination. Please try again.',
            ]);
        }
    }

//    profile page

public function profile(Request $request){

//        $user = ['userInfo'=>DB::table('users')->where('id', session('loggedInUser'))->first()];
        $user = auth()->user();

        return view('profile', ['userInfo'=>$user]);
}


//Logout meth
    public function logout(){
        if (session()->has('loggedInUser')){
            session()->pull('loggedInUser');
            return redirect('/');
        }
    }

//    update user profile image ajax request

    public function profileImageUpdate(Request $request){
        $user_id =$request->user_id;
        $user = User::find($user_id);
//        dd($request->hasFile('picture'));

        if ($request->hasFile('picture')){
            $file=$request->file('picture');

            $fileName = time().'.'.$file->getClientOriginalExtension();

            $file->storeAs('public/images/', $fileName);

            if ($user->picture){
                Storage::delete('public/images/' . $user->picture);
            }
        }

        User::where('id', $user_id)->update([
            'picture'=>$fileName
        ]);

        return response()->json([
            'status'=>200,
            'messages'=>'Profile image updated successfully!'
        ]);
    }

//    handle profile update ajax request
    public function profileUpdate(Request $request){
            if (isset($request->dob)){
                $validator = Validator::make($request->all(), [
                    'dob' => 'date|before_or_equal:today',
                ],[
                    'dob.before_or_equal'=>'Your date of birth cannot be later than today'
                ]);
                if ($validator->fails()){
                    return response()->json([
                        'status'=>401,
                        'messages'=>$validator->getMessageBag()
                    ]);
                }
                $age = Carbon::parse($request->dob)->age;
                if ($age<18){
                    $value = 'N/A';
                }
            }
            $user = User::where('id', $request->id);
            $phone = $request->phone;
            $country_code = $request->countryCode;
            $country_name = $request->countryName;
            $validator = false;
                if (isset($phone)){

                    $validator = Validator::make($request->all(), [
//                        'phone' => ['regex:/^(\+254|0)[1-9]\d{8}$/i', 'unique:users'],
                        'phone' => [function ($attribute, $value, $fail) use ($request) {
                            // Check if the country code is 254
                            if ($request->countryCode == '254') {
                                // Perform the phone number validation
                                if (!preg_match('/^(0|7)\d{8}$/i', $value)) {
                                    $fail('The phone number format is invalid.');
                                }
                            }
                        },
                            'unique:users'],
                    ]);
                }
            if ($validator && $validator->fails()){
                return response()->json(
                    [
                        'status'=>400,
                        'messages'=>$validator->getMessageBag()
                    ]
                );
            }else{
                $complete_phone_number = implode(' ',[$country_code,$phone]);
                $full_name = implode(' ',[$request->firstName, $request->otherNames]);
                $udpate_data_array = [
                    'name' => $full_name,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'dob' => $request->dob,
                    'phone' => $value ?? $phone,
                    'dialing_code' => $value ?? $country_code,
                    'country' => $value ?? $country_name,
                    'marital_status_id' => $value ?? $request->marital_status,
                    'estate_id' => $request->estate,
                    'ward' => $request->ward,
                    'cell_group_id' => $request->cell_group,
                    'employment_status_id' => $value ?? $request->employment_status,
                    'born_again_id' => $request->born_again,
                    'leadership_status_id' => $request->leadership_status,
                    'ministry_id' => $request->ministry,
                    'occupation_id' => $value ?? $request->occupation,
                    'education_level_id' => $request->education_level,
                    'ministries_of_interest' => isset($request->check_box)?implode (',', $request->check_box):null,
                    'year_joined' => $request->year_joined??null,
                ];
                foreach ($udpate_data_array as  $key=>$value){
                    if (is_null($value)){
                        unset($udpate_data_array[$key]);
                    }
                }
                $user->update(
                    $udpate_data_array
                );

                return response()->json([
                    'status'=>200,
                    'messages'=>'Profile updated successfully!',
                ]);

        }
    }

    //handle member delete

    public function destroy(Request $request){
        $member_id = $request->id ?: null;
        $validator = Validator::make($request->all(), [
            'delete_reason' => 'required',
        ], [
            'delete_reason.required' => 'Choose a reason from above for deleting ' . ($request->first_name ?: ''),
        ]);
        $member = User::where('id', $member_id);
        if ($member->first()->existing == 1){
            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'messages' => $validator->getMessageBag()
                ]);
            }
            else {
                $member->update(['existing' => 0, 'active' => 0, 'delete_reason'=>$request->delete_reason]);
                if ($member->first()->hasAnyRole()){
                    $member->first()->roles()->detach(); // Unassign all roles from the user
                    $member->first()->permissions()->sync([]); // Remove all  permissions associated with the user
                }
                return response()->json([
                    'status' => 200,
                    'messages' => explode(' ', $member->first()->name)[0].' deleted successfully'
                ]);
            }
        }else{
            $member->update(['existing' => 1, 'active' => 1]);
            return response()->json([
                'status' => 200,
                'messages' => explode(' ', $member->first()->name)[0].' reinstated successfully'
            ]);
        }
    }

    //handle deactivate user

    public function deactivate(Request $request){
        $member_id = $request->id;
        $change_status_reason = $request->deactivate_reason;
        $validator = Validator::make($request->all(), [
            'deactivate_reason'=>'required'
        ],[
            'deactivate_reason.required'=>'Please select reason for deactivating '.explode(' ', User::where('id', $member_id)->first()->name)[0]
        ]);

            if (isset($member_id)) {
                $user = User::where('id', $member_id)->first();
                if ($user->active == 1) {
                    if ($validator->fails()){
                        return response()->json([
                            'status'=>400,
                            'messages'=>$validator->getMessageBag()
                        ]);
                    }else{
                        $deactivated = User::where('id', $member_id)->update(['active' => 0, 'deactivate_reason'=>$change_status_reason]);
                        if ($user->hasAnyRole()){
                            $user->roles()->detach(); // Unassign all roles from the user
                            $user->permissions()->sync([]); // Remove all associated permissions
                        }
                        if ($deactivated) {
                            return response()->json([
                                'status' => 200,
                                'messages' => explode(' ', $user->name)[0].' deactivated successfully'
                            ]);
                        }
                    }

                } else {
                    $activated = User::where('id', $member_id)->update(['active' => 1]);
                    if ($activated) {
                        return response()->json([
                            'status' => 200,
                            'messages' => explode(' ', $user->name)[0].' activated successfully'
                        ]);
                    }
                }

            } else {
                return response()->json([
                    'status' => 401,
                    'messages' => 'A problem occurred while trying to deactivate the user'
                ]);
            }
    }

    //handle forgot password

    public function forgotPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100'
        ]);

        if ($validator->fails()){
            return response()->json([
                'status'=>400,
                'messages'=>$validator->getMessageBag()
            ]);
        }else{
            $token = Str::uuid();
            $user = DB::table('users')->where('email', $request->email)->first();
            $details = [
                'body'=> route('reset', ['email'=>$request->email, 'token'=>$token])
            ];

            if ($user){
                User::where('email', $request->email)->update([
                    'token' => $token,
                    'token_expire' => Carbon::now()->addMinutes(10)->toDateTimeString()
                ]);

                Mail::to($request->email)->send(new ForgotPassword($details));

                return response()->json([
                    'status'=>200,
                    'messages'=>'Reset password link has been sent to your e-mail'
                ]);
            }
            else{
                return response()->json([
                    'status'=>401,
                    'messages'=>'This e-mail is not registered with with us'
                ]);
            }
        }
    }

    //handle reset password
    public function resetPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'npassword'=>'required|min:6|max:50',
            'cnpassword'=>'required|min:6|max:50:same:npassword',

        ],[
            'npassword.required'=>'Please enter a new password!',
            'cnpassword.required'=>'Please confirm your new password!',
            'cnpassword.same'=>'Password did not match!'
        ]);

        if ($validator->fails()){
            return response()->json([
                'status'=>400,
                'messages'=>$validator->getMessageBag()
            ]);
        }else{
            $user = DB::table('users')
                ->where('email', $request->email)
                ->whereNotNull('token')
                ->where('token', $request->token)
                ->where('token_expire', '>', Carbon::now())
                ->exists();
            if ($user){
                User::where('email', $request->email)
                    ->update([
                        'password'=>Hash::make($request->password),
                        'token'=>null,
                        'token_expire'=>null,
                    ]);
                return response()->json([

                    'status'=>200,
                    'messages'=>'New password updated;&nbsp;<a href="/login">Login Now</a>',
                ]);
            }else{
                return response()->json([
                   'status'=>4001,
                   'messages'=>'Reset link expired! Request for a new reset password link'
                ]);
            }

        }
    }
    public function profilePasSubcounty(Request $request){
        return view('admin.with-subcounty-id', ['sub_county'=>$request->sub_county]);
    }
}
