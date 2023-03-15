<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;
use function PHPUnit\Framework\isEmpty;

class DashboardController extends Controller
{
    public function index(){
        return View("admin.dashboard")
            ->with("value", "something");
    }

    public function churchMembers(Request $request){


        $member_category = $request->member_category;


          if ($member_category == config('membership.age_clusters.All_members')['id']){
              $members= User::all();
          }else{
              $members = User::where(['age_cluster' => $member_category])->get();
          }
          if (count($members)>0){
              foreach ($members as $member){
                  $age =  Carbon::parse($member->dob)->age;

                  if ($member->ministries_of_interest == null){
                      $ministries = 'none';
                  }else{
                      if (strpos($member->ministries_of_interest, ',') == false){
                          $ministries = config('membership.statuses.ministry')[$member->ministries_of_interest];
//
                      }else{
                          $ministry_id_array = explode(',', $member->ministries_of_interest);
                          $ministry_array = [];
                          foreach ($ministry_id_array as $ministry_id){
                              $ministry = config('membership.statuses.ministry')[$ministry_id];
                              array_push($ministry_array, $ministry);
                          }
                          $ministries = implode(', ', $ministry_array);
                      }
                  }
              }
          }else{
              $age = null;
              $ministries = null;
          }
        return view('admin.church-members', ['members' => $members, 'age'=>$age, 'member_category'=>$member_category, 'ministries'=>$ministries]);
    }
}
