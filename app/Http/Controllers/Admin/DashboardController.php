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
        $category_name = $request->category_name;


        if (isset($request->category) && strpos($request->category, 'church-members') == true){
              if ($member_category == config('membership.age_clusters.All_members')['id']){
                  $members= User::all();
              }else{
                  $members = User::where(['age_cluster' => $member_category])->get();
              }
          }else{
              $members = User::where('cell_group_id', $member_category)->get();
          }
        return view('admin.church-members', ['members' => $members,'category_name'=>$category_name]);
    }
}
