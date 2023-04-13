<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;
use function PHPUnit\Framework\isEmpty;

class DashboardController extends Controller
{
    public function index(){
        $all_members = count(User::all());
        return View("admin.dash")
            ->with("all_members", $all_members);
    }

    public function members(Request $request){

        $member_category = $request->member_category;
        $category_name = $request->category_name;

        if ($request->active == 'active') {
            $members = User::where('exists', 1)->where('active', 1)->get();
        }elseif ($request->active == 'inactive'){
            $members= User::where('exists', 1)->where('active', 0)->get();
        }else{
            $members= User::where('exists', 0)->get();
        }



        return view('admin.members', ['members' => $members, 'category_name'=>$category_name]);
    }

    public function churchMembers(Request $request){


        $member_category = $request->member_category;
        $category_name = $request->category_name;


        if (isset($request->category) && strpos($request->category, 'church-members') == true){
              if ($member_category == config('membership.age_clusters.All_members')['id']){
                  $members= User::where('exists', 1)->where('active', 1)->get();
                  $inactive_members= User::where('exists', 1)->where('active', 0)->get();
                  $deleted_members= User::where('exists', 0)->get();
              }else{
                  $members = User::where(['age_cluster' => $member_category])->where('exists', 1)->where('active', 1)->get();
                  $inactive_members = User::where(['age_cluster' => $member_category])->where('exists', 1)->where('active', 0)->get();
                  $deleted_members = User::where(['age_cluster' => $member_category])->where('exists', 0)->get();
              }
          }else{
              $members = User::where('cell_group_id', $member_category)->where('exists', 1)->where('active', 1)->get();
            $inactive_members = User::where('cell_group_id', $member_category)->where('exists', 1)->where('active', 0)->get();
            $deleted_members = User::where('cell_group_id', $member_category)->where('exists', 0)->get();
          }
        return view('admin.church-members', ['members' => $members,'inactive_members' => $inactive_members,'deleted_members' => $deleted_members,'category_name'=>$category_name]);
    }
    public function editMember($id){
        $member = User::where('id', $id)->first();
//        dd($member);
        return view('profile', ['userInfo'=>$member]);
    }
    public function adminRegisterMember(Request $request){
        if (isset($request->dob)){
            $age = Carbon::parse($request->dob)->age;

            if ($age<12){
                $age_cluster = config('membership.age_clusters.Children.id');
            }elseif($age>=13 && $age<=19){
                $age_cluster = config('membership.age_clusters.Teenies.id');
            }elseif($age>=20 && $age<=35){
                $age_cluster = config('membership.age_clusters.Youths.id');
            }elseif($age>=36 && $age<=40){
                $age_cluster = config('membership.age_clusters.Middle_Age.id');
            }elseif($age>=41){
                $age_cluster = config('membership.age_clusters.Adults.id');
            }

            if ($age<18){
                $value = 'N/A';
            }
        }
        if (isset($request->id)){
            $udpate_data_array = [
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'phone' => isset($value) ? $value : $request->phone,
                'marital_status_id' => isset($value) ? $value : $request->marital_status,
                'estate_id' => $request->estate,
                'cell_group_id' => $request->cell_group,
                'employment_status_id' => isset($value) ? $value : $request->employment_status,
                'born_again_id' => $request->born_again,
                'leadership_status_id' => $request->leadership_status,
                'ministry_id' => $request->ministry,
                'occupation_id' => isset($value) ? $value : $request->occupation,
                'education_level_id' => $request->education_level,
                'age_cluster' => isset($age_cluster)?$age_cluster:null,
                'ministries_of_interest' => isset($request->check_box)?implode (',', $request->check_box):null,
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
            $validator = Validator::make($request->all(),[
                'name'=>'required|max:50',
                'email'=>'required|email|unique:users|max:100',
                'gender'=>'required',
                'dob'=>'required',
//            'phone'=>'required',
//            'marital_status'=>'required',
                'estate'=>'required',
                'cell_group'=>'required',
                'education_level'=>'required',
                'born_again'=>'required',
                'leadership_status'=>'required',
                'ministry'=>'required',
                'check_box'=>'required',
//            'occupation'=>'required',
//            'employment_status'=>'required',
            ]);
        }
                if ($validator->fails()){
            return response()->json([
                'status'=>400,
                'messages'=>$validator->getMessageBag()
            ]);
        }else{
                    $user_name = substr(explode(' ', $request->name)[0], 0, 4).Factory::create()->randomNumber(4, true);
                    $user = new User();
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->gender=$request->gender;
                    $user->dob=$request->dob;
                    $user->phone=$value ?? $request->phone;
                    $user->marital_status_id=$value ?? $request->marital_status;
                    $user->estate_id=$request->estate;
                    $user->cell_group_id=$request->cell_group;
                    $user->education_level_id=$request->education_level;
                    $user->born_again_id=$request->born_again;
                    $user->leadership_status_id=$request->leadership_status;
                    $user->ministry_id=$request->ministry;
                    $user->ministries_of_interest=isset($request->check_box)?implode (',', $request->check_box):null;
                    $user->occupation_id=$value ?? $request->occupation;
                    $user->employment_status_id=$value ?? $request->employment_status;
                    $user->age_cluster = isset($age_cluster)?$age_cluster:null;
                    $user->user_name = $user_name;
                    $user->save();
                    return  response()->json([
                        'status'=>200,
                        'messages'=>'Member Registered Successfully;&nbsp; ,with username; '.$user_name.' <a href="/">Login Now</a>',
                    ]);
                }
//
    }
}
