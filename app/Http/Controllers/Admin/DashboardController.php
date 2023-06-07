<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModelHasRole;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;
use function PHPUnit\Framework\isEmpty;

class DashboardController extends Controller
{
    public function index(){
        $all_members = count(User::all());
        return View("admin.dashboard")
            ->with("all_members", $all_members);
    }

    public function conditionTitleArray(Request $request){
        $email = $request->email;
        return view('admin.conditional_title_array', ['email'=>$email]);
    }
    public function statusBasedMembers(Request $request){
        $gender_cell_group = $request->gender_cell;
        $member_category = $request->member_category;
        $member_age_cluster_category_text = $request->category_name;
        $category = $request->category;
        $active_status = $request->active;

        $progressive_registration = $request->progressive_registration??null;
        $class_name = $request->class_name;
        $loggedin_user = User::where('id', auth()->id())->with('customRoles')->first();

        if (isset($class_name) && strpos($class_name, 'progressive-registration')){

            $display_for_progress = true;
            $members= User::where('existing', 1)->where('registration_status', config('membership.statuses.registration_statuses')[$progressive_registration]);
        }else{
            $display_for_progress = false;
            if (isset($category) && strpos($category, 'church-members')){
                if ($member_category == config('membership.age_clusters.All_members')['id']){
                    if ($active_status == 'active') {
                        $members = User::where('age_cluster', '!=', null)->where('cell_group_id', '!=', null)->where('existing', 1)->where('active', 1)->where('registration_status', 5);
                    }elseif ($active_status == 'inactive'){
                        $members= User::where('age_cluster', '!=', null)->where('cell_group_id', '!=', null)->where('existing', 1)->where('active', 0)->where('registration_status', 5);
                    }elseif($active_status == 'all'){
                        $members= User::where('id', '!=', null);
                    }else{
                        $members= User::where('age_cluster', '!=', null)->where('cell_group_id', '!=', null)->where('existing', 0)->where('registration_status', 5);
                    }
                }elseif (strpos($category, 'gender-based')){
                    if ($active_status == 'active') {
                        if (isset($gender_cell_group)){
                            $members= User::where('age_cluster', '!=', null)->where('cell_group_id', $gender_cell_group)->where('active', 1)->where('registration_status', 5)->where('gender', $member_category);
                        }else{
                            $members = User::where('age_cluster', '!=', null)->where('cell_group_id', '!=', null)->where('existing', 1)->where('active', 1)->where('registration_status', 5)->where('gender', $member_category);
                        }
                    }elseif ($active_status == 'inactive'){
                        if (isset($gender_cell_group)){
                            $members= User::where('age_cluster', '!=', null)->where('cell_group_id', $gender_cell_group)->where('existing', 1)->where('active', 0)->where('registration_status', 5)->where('gender', $member_category);
                        }else{
                            $members= User::where('age_cluster', '!=', null)->where('cell_group_id', '!=', null)->where('existing', 1)->where('active', 0)->where('registration_status', 5)->where('gender', $member_category);
                        }

                    }elseif($active_status == 'all'){
                        if (isset($gender_cell_group)){
                            $members= User::where('id', '!=', null)->where('cell_group_id', $gender_cell_group);
                        }else{
                            $members= User::where('id', '!=', null)->where('cell_group_id', $member_category);
                        }
                    }else{
                        if (isset($gender_cell_group)){
                            $members= User::where('age_cluster', '!=', null)->where('cell_group_id', $gender_cell_group)->where('existing', 0)->where('registration_status', 5)->where('gender', $member_category);
                        }else{
                            $members= User::where('age_cluster', '!=', null)->where('cell_group_id', '!=', null)->where('existing', 0)->where('registration_status', 5)->where('gender', $member_category);
                        }
                    }
                }else{
                    if ($active_status == 'active') {
                        $members = User::where('cell_group_id', '!=', null)->where(['age_cluster' => $member_category])->where('existing', 1)->where('active', 1)->where('registration_status', 5);
                    }elseif ($active_status == 'inactive'){
                        $members = User::where('cell_group_id', '!=', null)->where(['age_cluster' => $member_category])->where('existing', 1)->where('active', 0)->where('registration_status', 5);
                    }elseif ($active_status == 'all'){
                        $members = User::where(['age_cluster'=>$member_category]);
                    }else{
                        $members = User::where('cell_group_id', '!=', null)->where(['age_cluster' => $member_category])->where('existing', 0)->where('registration_status', 5);
                    }
                }
            }else{
                if ($active_status == 'active') {
                    $members = User::where('age_cluster', '!=', null)->where('cell_group_id', $member_category)->where('existing', 1)->where('active', 1)->where('registration_status', 5);
                }elseif ($active_status == 'inactive'){
                    $members = User::where('age_cluster', '!=', null)->where('cell_group_id', $member_category)->where('existing', 1)->where('active', 0)->where('registration_status', 5);
                }elseif($active_status == 'all'){
                    $members = User::where('cell_group_id', $member_category);
                }else{
                    $members = User::where('age_cluster', '!=', null)->where('cell_group_id', $member_category)->where('existing', 0)->where('registration_status', 5);
                }

            }
        }

        $loggedin_user = Auth::user();
        if ($loggedin_user->roles()->first()->name == config('membership.roles.cell_group_pastor.text')) {

            $filteredMembers = collect([]);

            foreach ($members->get() as $member) {
                if ($member->cell_group_id == $loggedin_user->cell_group_id) {
                    $filteredMembers->push($member);
                }
            }

            $members = $filteredMembers;
        } else {
            $members = $members->get();
        }

        $category_detail_description = '';
        if ($request->category_name == 'Privileged Users'){
            $priv = true;
        }else{
            $priv = false;
        }

        return view('admin.status_based_members',
            [
                'auth_user_role'=>$loggedin_user->roles()->first()->name,
                'category_detail_description'=>$category_detail_description,
                'members' => $members,
                'category_name'=>$member_age_cluster_category_text,
                'display_for_progress'=>$display_for_progress,
                'progressive_registration'=>$progressive_registration,
                'priv'=>$priv
            ]);
    }

    public function churchMembers(Request $request){
        $gender_cell_group = $request->gender_cell;
        $member_age_cluster_category_id = $request->member_category;
        $member_age_cluster_category_text = $request->category_name;
        $category = $request->category;

        $progressive_registration = $request->progressive_registration ?? null;
        $class_name = $request->class_name;

        $loggedin_user = User::where('id', auth()->id())->with('customRoles')->first();

        if (isset($class_name) && strpos($class_name, 'progressive-registration')) {
            $display_for_progress = true;
            $members = User::where('age_cluster', '!=', null)
                ->where('cell_group_id', '!=', null)
                ->where('existing', 1)
                ->where('registration_status', config('membership.statuses.registration_statuses')[$progressive_registration]);
        } else {
            $display_for_progress = false;
            if (isset($category) && strpos($category, 'church-members')) {
                if ($member_age_cluster_category_id == config('membership.age_clusters.All_members')['id']) {
                    $members = User::where('age_cluster', '!=', null)
                        ->where('cell_group_id', '!=', null)
                        ->where('active', 1)
                        ->where('registration_status', 5)
                        ;
                    $category_detail_description = '(All Ages)';
                } elseif (strpos($category, 'gender-based')) {
                    if (isset($gender_cell_group)) {
                        $members = User::where('age_cluster', '!=', null)
                            ->where('cell_group_id', $gender_cell_group)
                            ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where('gender', $member_age_cluster_category_id)
                            ;
                    } else {
                        $members = User::where('age_cluster', '!=', null)
                            ->where('cell_group_id', '!=', null)
                            ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where('gender', $member_age_cluster_category_id)
                            ;
                    }
                } else {
                    $category_details = config('membership.statuses.age_clusters')[$member_age_cluster_category_id];
                    if (isset($category_details['end'])) {
                        $category_detail_description = 'Age between ' . $category_details['start'] . ' - ' . $category_details['end'];
                    } else {
                        $category_detail_description = 'Age above ' . $category_details['start'];
                    }
                    $category_detail_description = '(' . $category_detail_description . ')';
                    $members = User::where('cell_group_id', '!=', null)
                        ->where(['age_cluster' => $member_age_cluster_category_id])
                        ->where('active', 1)
                        ->where('registration_status', 5)
                        ;
                }
            } else {
                $members = User::where('age_cluster', '!=', null)
                    ->where('cell_group_id', $member_age_cluster_category_id)
                    ->where('active', 1)
                    ->where('registration_status', 5)
                    ;
            }
        }

        if ($request->priviledged_id) {
            $members = User::has('roles')->get();
            $priv = true;
        } else if ($loggedin_user->roles()->first()->name == config('membership.roles.cell_group_pastor.text')) {
            $loggedin_user = Auth::user();
            $filteredMembers = collect([]);

            foreach ($members->get() as $member) {
                if ($member->cell_group_id == $loggedin_user->cell_group_id) {
                    $filteredMembers->push($member);
                }
            }

            $members = $filteredMembers;
            $priv = false;
        } else {
            $members = $members->get();
            $priv = false;
        }

        return view('admin.church-members', [
            'auth_user_role'=>$loggedin_user->roles()->first()->name,
            'category_detail_description' => $category_detail_description ?? null,
            'priv' => $priv,
            'members' => $members,
            'category_name' => $member_age_cluster_category_text,
            'member_age_cluster_category_id' => $member_age_cluster_category_id,
            'category' => $category,
            'display_for_progress' => $display_for_progress,
            'progressive_registration' => $progressive_registration
        ]);

    }
    public function editMember($id){
        $member = User::where('id', $id)->first();
        return view('profile', ['userInfo'=>$member]);
    }
    public function adminRegisterMember(Request $request){
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
        if (isset($request->dob)){
            $age = Carbon::parse($request->dob)->age;

            if ($age<5){
                $age_cluster = config('membership.age_clusters.stage1.id');
            }elseif($age>=5 && $age<10){
                $age_cluster = config('membership.age_clusters.stage2.id');
            }elseif($age>=10 && $age<15){
                $age_cluster = config('membership.age_clusters.stage3.id');
            }elseif($age>=15 && $age<20){
                $age_cluster = config('membership.age_clusters.stage4.id');
            }
            elseif($age>=20 && $age<25){
                $age_cluster = config('membership.age_clusters.stage5.id');
            }
            elseif($age>=25 && $age<30){
                $age_cluster = config('membership.age_clusters.stage6.id');
            }
            elseif($age>=30 && $age<35){
                $age_cluster = config('membership.age_clusters.stage7.id');
            }
            elseif($age>=35 && $age<40){
                $age_cluster = config('membership.age_clusters.stage8.id');
            }
            elseif($age>=40 && $age<45){
                $age_cluster = config('membership.age_clusters.stage9.id');
            }
            elseif($age>=45 && $age<50){
                $age_cluster = config('membership.age_clusters.stage10.id');
            }
            elseif($age>=50 && $age<55){
                $age_cluster = config('membership.age_clusters.stage11.id');
            }
            elseif($age>=55 && $age<60){
                $age_cluster = config('membership.age_clusters.stage12.id');
            }
            elseif($age>=60 && $age<65){
                $age_cluster = config('membership.age_clusters.stage13.id');
            }
            elseif($age>=65 && $age<70){
                $age_cluster = config('membership.age_clusters.stage14.id');
            }
            elseif($age>=70 && $age<75){
                $age_cluster = config('membership.age_clusters.stage15.id');
            }
            elseif($age>=75 && $age<80){
                $age_cluster = config('membership.age_clusters.stage16.id');
            }
            elseif($age>=80){
                $age_cluster = config('membership.age_clusters.stage17.id');
            }

            if ($age<18){
                $value = 'N/A';
            }
        }
        if (isset($request->firstName) || isset($request->otherNames)){
            $fullName = implode(' ', [$request->firstName, $request->otherNames]);
        }

        if (isset($request->id)){
            $udpate_data_array = [
                'name' => $fullName??'',
                'email' => $request->email,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'phone' => $value ?? $request->phone,
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
                'age_cluster' => $age_cluster??null,
                'ministries_of_interest' => isset($request->check_box)?implode (',', $request->check_box):null,
                'title' => $request->title ?? null,
                'year_joined' => $request->year_joined ?? null,
            ];


            foreach ($udpate_data_array as  $key=>$value){
                if (is_null($value)){
                    unset($udpate_data_array[$key]);
                }
            }

            $user = User::where('id', $request->id);
            $user->update(
                $udpate_data_array
            );

            return response()->json([
                'status'=>200,
                'messages'=>'Profile updated successfully!',
            ]);

        }else{


            $validator_array = [
                'firstName'=>'required|regex:/^[a-zA-Z]+$/',
                'otherNames'=>'required',
                'email'=>'required|email|unique:users|min:11|max:30',
                'title'=>'required',
                'dob' => 'required|date|before_or_equal:today',
                'cell_group'=>'required',
                'phone' => ['required', 'regex:/^(\+254|0)[1-9]\d{8}$/i', 'unique:users'],
                'year_joined' => 'required|date|before_or_equal:today',
            ];
            if (isset($age) && $age<18) {
                unset($validator_array['phone']);
            }

            $validator = Validator::make($request->all(),
                $validator_array,
                [
                'email.required'=>'The email field is required!',
                'email.min'=>'The email address cannot be less than 11 characters!',
                'email.max'=>'The email address cannot be more than 30 characters!',
                'title.required'=>'Choose a title  from the drop down menu!',
                'dob.required'=>'Pick the date of birth from the calender!',
                'year_joined.required'=>"Pick the year you joined VOSH Church Int'l from the calender!",
                'year_joined.before_or_equal'=>'The date of you joined cannot be later than today!',
                'dob.before_or_equal'=>'The date of birth cannot be later than today!',
                'cell_group.required'=>'Choose the member cell group from the drop down menu!',
            ]
            );

            if ($validator->fails()){
                return response()->json([
                    'status'=>400,
                    'messages'=>$validator->getMessageBag()
                ]);
            }
            else{
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
                $fullName = implode(' ', [$request->firstName, $request->otherNames]);
                $user_name = $username;
                $user = new User();
                $user->name = $fullName;
                $user->email = $request->email;
                $user->gender=$request->gender??null;
                $user->dob=$request->dob??null;
                $user->phone=$value ?? $request->phone??null;
                $user->marital_status_id=$value ?? ($request->marital_status??null);
                $user->estate_id=$request->estate ?? null;
                $user->ward=$request->ward ?? null;
                $user->cell_group_id=$request->cell_group ?? null;
                $user->education_level_id=$request->education_level ?? null;
                $user->born_again_id=$request->born_again ?? null;
                $user->leadership_status_id=$request->leadership_status ?? null;
                $user->ministry_id=$request->ministry ?? null;
                $user->ministries_of_interest=isset($request->check_box)?implode (',', $request->check_box):null;
                $user->occupation_id=$value ?? ($request->occupation ?? null);
                $user->employment_status_id=$value ?? ($request->employment_status ?? null);
                $user->age_cluster = $age_cluster??null;
                $user->member_number = $member_number??null;
                $user->user_name = $username;
                $user->title = $request->title??null;
                $user->year_joined = $request->year_joined??null;
                $user->save();
                return  response()->json([
                    'status'=>200,
                    'messages'=>'Member Registered Successfully;&nbsp; with username; '.$user_name,
                ]);
            }
        }

    }
    public function adminAssignRole(Request $request){
      // Get the user ID and role ID from the request
        $userId = $request->input('id');
        $roleId = $request->input('role_id');

        // Find the user
        $user = User::find($userId);

        // Get the currently assigned role
        $currentRole = $user->roles->first();


        // Get the requested role
        $requestedRole = Role::find($roleId);

        // Find the user
        $user = User::find($userId);

        if ($roleId) {
            // A role is selected
            // Find the role based on the ID
            $role = Role::find($roleId);

            // Assign the role to the user
            $user->syncRoles([$role]);

            // Retrieve the associated permissions of the role
            $permissions = $role->permissions->pluck('name')->toArray();

            // Assign the permissions to the user
            $user->syncPermissions($permissions);
            User::where('id', $userId)->update(['registration_status'=>config('membership.registration_statuses.church_approved')['id']]);

            if (isset($currentRole->name)){
                if ($currentRole->name == $requestedRole->name){
                    return response()->json([
                        'status'=>200,
                        'messages'=>$currentRole->name.' role and associated permissions confirmed successfully'
                    ]);
                }else{
                    return response()->json([
                        'status'=>200,
                        'messages'=>'Role changed from '.$currentRole->name.' to '.$requestedRole->name.' and associated permissions assigned successfully'
                    ]);
                }
            }else{
                return response()->json([
                    'status'=>200,
                    'messages'=>$requestedRole->name.' and associated permissions assigned successfully'
                ]);
            }
        } else {
            // No role is selected, unassign the current role and permissions
            $user->syncRoles([]);
            $user->syncPermissions([]);
            if (isset($currentRole->name)){
                return response()->json([
                    'status'=>200,
                    'messages'=>$currentRole->name.' role and associated permissions unassigned successfully'
                ]);
            }else{
                return response()->json([
                    'status'=>200,
                    'messages'=>'Member has no role and this has been  confirmed successfully'
                ]);
            }

        }
    }
    public function adminAssignId(Request $request){
        return view('admin.with-id', ['id'=>$request->id]);
    }
    public function reviewMembership(Request $request){$member_id = $request->id;
        $review_reason = $request->decline_data;
        $registration_status = $request->registration_status;
        $user = User::where('id', $member_id);
        $declining_membership = $request->decline_action;

        if ($declining_membership){
            $validator = Validator::make($request->all(),[
                'decline_data'=>'required',
            ],[
                'decline_data.required'=>'Kindly select a reason for declining '.$request->member_first_name." 's membership",
            ]);

            if ($validator->fails()){
                return response()->json([
                    'status'=>400,
                    'messages'=>$validator->getMessageBag()
                ]);
            }else{
                $user->update(['previous_registration_status'=>config('membership.registration_statuses.church_approved.id'), 'registration_status'=>config('membership.registration_statuses.declined_members.id'), 'decline_reason'=>$review_reason]);

                if ($user->first()->hasAnyRole()){
                    $user->first()->roles()->detach(); // Unassign all roles from the user
                    $user->first()->permissions()->sync([]); // Remove all associated permissions
                }
                return response()->json([
                    'status'=>200,
                    'messages'=>$request->member_first_name."'s membership status declined successfully!"
                ]);
            }
        }else{
            $name =  User::where('id', $request->id)->first()->name;
            $first_name = $request->member_first_name ?? explode(' ', $name)[0];
            $response = response()->json([
                'status'=>200,
                'messages'=>$first_name."'s membership status approved successfully!"
            ]);
            if ($registration_status == 0){
                $user->update(['registration_status'=>$user->first()->previous_registration_status, 'previous_registration_status'=>null]);
                return response()->json([
                    'status'=>200,
                    'messages'=>$request->member_first_name."'s membership status status reinstated successfully!"
                ]);
            }else if ($registration_status == 1){
                $user->update(['registration_status'=>config('membership.registration_statuses.cell_group_approved.id')]);
                return $response;
            }else if ($registration_status == 2){
                $user->update(['registration_status'=>config('membership.registration_statuses.church_registered.id')]);
                return $response;
            }else if ($registration_status == 3){
                $user->update(['registration_status'=>config('membership.registration_statuses.church_provisionally_approved.id')]);

                return $response;
            }else if ($registration_status == 4){
                $user->update(['registration_status'=>config('membership.registration_statuses.church_approved.id')]);

                return $response;
            }
        }
    }
}
