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
              }
          }else{
              $age = null;
          }
        return view('admin.church-members', ['members' => $members, 'age'=>$age, 'member_category'=>$member_category]);
    }
}
