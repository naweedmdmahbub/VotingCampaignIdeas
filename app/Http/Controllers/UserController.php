<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $states = State::all();
        $users = User::with('country.states')->get();
        dd($users);
    }
}
