<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        $users = User::with('country','state')->get();
        // dd($users);
        
        return view('users.index',compact('users','groups'));
    }
}
