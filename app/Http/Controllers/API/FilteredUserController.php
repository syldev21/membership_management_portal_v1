<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FilteredUserController extends Controller
{
    public function filteredUsers(){
        $members = User::all();
        return response()->json($members);
    }
}
