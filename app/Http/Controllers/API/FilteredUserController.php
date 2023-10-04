<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FilteredUserController extends Controller
{
    public function users(){
        try{
            $users = User::all();
        return response()->json($users);
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }
}
