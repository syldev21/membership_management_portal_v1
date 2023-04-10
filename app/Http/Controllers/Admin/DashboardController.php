<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function churchMembers(Request $request){


        $member_category = $request->member_category;
        $category_name = $request->category_name;


        if (isset($request->category) && strpos($request->category, 'church-members') == true){
              if ($member_category == config('membership.age_clusters.All_members')['id']){
                  $members= User::where('exists', 1)->where('active', 1)->get();
              }else{
                  $members = User::where(['age_cluster' => $member_category])->where('exists', 1)->where('active', 1)->get();
              }
          }else{
              $members = User::where('cell_group_id', $member_category)->where('exists', 1)->where('active', 1)->get();
          }
        return view('admin.church-members', ['members' => $members,'category_name'=>$category_name]);
    }
    public function editMember($id){
        $member = User::where('id', $id)->first();
//        dd($member);
        return view('profile', ['userInfo'=>$member]);
    }
}
