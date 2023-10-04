<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function churchLevelMembers(Request $request){
        $church_membership_category = $request->member_category;
        $category_class = $request->category;
        $church_text = 'Church ';

        if (isset($category_class) && strpos($category_class, 'gender-based')) {

            $active_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '!=', null)
                ->where(['gender'=> $church_membership_category])
                ->where('registration_status', 5)
                    ->where(['active'=> 1])
                    ->get();
            if ($church_membership_category == config('membership.gender.male.id')){
                $member_category_description = 'All Male '.$church_text. 'Members';
            }else{
                $member_category_description = 'All Female '.$church_text. 'Members';
            }
        }
        else{
            if ($church_membership_category == config('membership.age_clusters.All_members')['id']) {
                $active_members = User::where('dob', '!=', null)
                    ->where('cell_group_id', '!=', null)
                    ->where('registration_status', 5)
                                ->where('active', 1)
                                ->get();
                $member_category_description = 'All '.$church_text. 'Members';
            }else{
                $category_details = config('membership.statuses.age_clusters')[$church_membership_category];
                $members_pending_age_cluster_filter = User::where('cell_group_id', '!=', null)
                    ->where('registration_status', 5);
                if (isset($category_details['end'])) {
                    $age_cluster_array= [$category_details['start'], $category_details['end']];
                    $members = $members_pending_age_cluster_filter->where(function ($query) use ($age_cluster_array) {
                        $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                    });
                    $member_category_description = $church_text.' Members of age between ' . $category_details['start'] . ' - ' . $category_details['end'];
                } else {
                    $members = $members_pending_age_cluster_filter->where(function ($query) use ($category_details) {
                        $query->where(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), '>=', $category_details['start']);
                    });
                    $member_category_description = $church_text.' Members of age ' . $category_details['start'].'<span class="arrow"> &rarr;</span>';
                }
                $active_members = $members
                    ->where('active', 1)
                    ->get();
            }

        }
        return view('admin.church-level-members.main', [
            'members'=>$active_members,
            'member_category_description'=>$member_category_description,
            'category_class'=>$category_class,
            'church_membership_category'=>$church_membership_category
        ]);
    }
    public function churchStatusBasedMembers(Request $request){
        $membership_status = $request->active;
        $member_category_class = $request->member_category_class;
        $member_category_id = $request->member_category_id;
        $church_text = 'Church ';
        if (isset($member_category_class) && strpos($member_category_class, 'gender-based')) {
            $active_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '!=', null)
                ->where(['gender'=> $member_category_id])
                ->where('registration_status', 5)
                ->where(['active'=> 1])
                ->get();
            $inactive_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '!=', null)
                ->where(['gender'=> $member_category_id])
                ->where('registration_status', 5)
                ->where(['active'=> 0, 'existing'=>1])
                ->get();
            $deleted_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '!=', null)
                ->where(['gender'=> $member_category_id])
                ->where('registration_status', 5)
                ->where(['existing'=>0])
                ->get();
            $all_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '!=', null)
                ->where(['gender'=> $member_category_id])
                ->where('registration_status', 5)
                ->get();
            if ($member_category_id == config('membership.gender.male.id')){
                $member_category_description = $church_text.'Male Members';
            }else{
                $member_category_description = $church_text.' Female Members';
            }
        }
        else{
            if ($member_category_id == config('membership.age_clusters.All_members')['id']) {
                $category_detail_description = '(All Stages)';
                $active_members = User::where('dob', '!=', null)
                    ->where('cell_group_id', '!=', null)
                    ->where('registration_status', 5)
                    ->where('active', 1)
                    ->get();
                $inactive_members = User::where('dob', '!=', null)
                    ->where('cell_group_id', '!=', null)
                    ->where('registration_status', 5)
                    ->where('active', 0)
                    ->where('existing', 1)
                    ->get();
                $deleted_members = User::where('dob', '!=', null)
                    ->where('cell_group_id', '!=', null)
                    ->where('registration_status', 5)
                    ->where('existing', 0)
                    ->get();
                $all_members = User::where('dob', '!=', null)
                    ->where('cell_group_id', '!=', null)
                    ->where('registration_status', 5)
                    ->get();
                $member_category_description = $church_text.' All Members';
            }else{
                $category_details = config('membership.statuses.age_clusters')[$member_category_id];
                $members_pending_age_cluster_filter = User::where('cell_group_id', '!=', null)
                    ->where('registration_status', 5);
                if (isset($category_details['end'])) {
                    $age_cluster_array= [$category_details['start'], $category_details['end']];
                    $members = $members_pending_age_cluster_filter->where(function ($query) use ($age_cluster_array) {
                        $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                    });
                    $member_category_description = 'Active '.$church_text.'Members of age between ' . $category_details['start'] . ' - ' . $category_details['end'];
                } else {
                    $members = $members_pending_age_cluster_filter->where(function ($query) use ($category_details) {
                        $query->where(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), '>=', $category_details['start']);
                    });
                    $member_category_description = 'Active '.$church_text.'Members of age ' . $category_details['start'].' and above';
                }
                $active_members = $members
                    ->where('active', 1)
                    ->get();
                $inactive_members = $members
                    ->where('active', 0)
                    ->where('existing', 1)
                    ->get();
                $deleted_members = $members
                    ->where('existing', 0)
                    ->get();
                $all_members = $members->get();
            }

        }
        if ($membership_status == 'active'){
            $members = $active_members;
        }elseif ($membership_status == 'inactive'){
            $members = $inactive_members;
        }elseif ($membership_status == 'deleted'){
            $members = $deleted_members;
        }else{
            $members = $all_members;
        }
        return view('admin.church-level-members.status-based', [
            'members'=>$members,
            'status_member_category_description'=>$member_category_description,
        ]);
    }
    public function cellGroupMembers(Request $request){
        $member_category = $request->member_category;
        $gender_based_member = $request->gender_based_member;
        $cell_church = config('membership.statuses.cell_group')[$member_category];
        $cell_group_text = 'Cell Group';
        $not_sure_cell_group = 'Not Sure of their Cell Group';
        if(isset($gender_based_member)){
            $members = User::where('dob', '!=', null)
                ->where('cell_group_id', '=', $member_category)
                ->where('gender', '=', $gender_based_member)
                ->where('registration_status', 5)
                ->where('active', 1)
                ->get();
            if ($gender_based_member == config('membership.gender.male.id')){

                $member_category_description = $cell_church == 'Not Sure' ? 'Male members '.$not_sure_cell_group : config('membership.gender.male.text').' '.$cell_church.' '.$cell_group_text.' Members';
            }else{
                $member_category_description = $cell_church == 'Not Sure' ? 'Female members '.$not_sure_cell_group :config('membership.gender.female.text').' '.$cell_church.' '.$cell_group_text.' Members';
            }
        }else{
            $members = User::where('dob', '!=', null)
                ->where('cell_group_id', '=', $member_category)
                ->where('registration_status', 5)
                ->where('active', 1)
                ->get();
            $member_category_description = $cell_church == 'Not Sure' ? 'All members '.$not_sure_cell_group :'All '.$cell_church.' '.$cell_group_text.' Members';
        }
        return view('admin.church-level-members.main', [
            'members'=>$members,
            'member_category_description'=>$member_category_description,
            'member_category'=>$member_category,
            'gender_based_member'=>$gender_based_member,
        ]);
    }
    public function cellGroupStatusBasedMembers(Request $request){
        $report_status = $request->active;
        $cell_group_id = $request->cell_group_id;
        $gender_based_members = $request->cell_member_gender_category;
        $cell_church = config('membership.statuses.cell_group')[$cell_group_id];
        if(is_null($gender_based_members)){
            $active_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '=', $cell_group_id)
                ->where('registration_status', 5)
                ->where(['active'=> 1])
                ->get();
            $inactive_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '=', $cell_group_id)
                ->where('registration_status', 5)
                ->where(['active'=> 0, 'existing'=>1])
                ->get();
            $deleted_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '=', $cell_group_id)
                ->where('registration_status', 5)
                ->where(['existing'=>0])
                ->get();
            $all_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '=', $cell_group_id)
                ->where('registration_status', 5)
                ->get();
            $member_category_description = 'All '.$cell_church.' Members';
        }else{
            $active_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '=', $cell_group_id)
                ->where(['gender'=> $gender_based_members])
                ->where('registration_status', 5)
                ->where(['active'=> 1])
                ->get();
            $inactive_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '=', $cell_group_id)
                ->where(['gender'=> $gender_based_members])
                ->where('registration_status', 5)
                ->where(['active'=> 0, 'existing'=>1])
                ->get();
            $deleted_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '=', $cell_group_id)
                ->where(['gender'=> $gender_based_members])
                ->where('registration_status', 5)
                ->where(['existing'=>0])
                ->get();
            $all_members = User::where('dob', '!=', null)
                ->where('cell_group_id', '=', $cell_group_id)
                ->where(['gender'=> $gender_based_members])
                ->where('registration_status', 5)
                ->get();
            if ($gender_based_members == config('membership.gender.male.id')){
                $member_category_description = 'Male '.$cell_church.' Members';
            }else{
                $member_category_description = 'Female '.$cell_church.' Members';
            }
        }
        if ($report_status == 'active'){
            $members = $active_members;
        }elseif ($report_status == 'inactive'){
            $members = $inactive_members;
        }elseif ($report_status == 'deleted'){
            $members = $deleted_members;
        }else{
            $members = $all_members;
        }
        return view('admin.church-level-members.status-based', [
            'members'=>$members,
            'status_member_category_description'=>$member_category_description,
        ]);
    }
    public function membersUnderRegistration(Request $request){
        $registration_level = $request->registration_level;
        $members = User::where('dob', '!=', null)
            ->where('cell_group_id', '!=', null)
            ->where('registration_status', $registration_level)
            ->where(['active'=> 1])
            ->get();
        $member_category_description = config('membership.statuses.registration_statuses')[$registration_level]['text'];
        return view('admin.church-level-members.main', [
            'members'=>$members,
            'member_category_description'=>$member_category_description,
            'under_registration'=>'under registration',
        ]);
    }
    public function privilegedUsers(Request $request){
        $members = User::has('roles')->get();
        return view('admin.church-level-members.privileged-users', ['members'=>$members]);
    }
}
