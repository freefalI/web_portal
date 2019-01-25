<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('show');

        // $this->middleware('can:update,user')->only(['edit','update','destroy']);
    }

    public function show(User $user)
    {
        $posts= $user->posts()->latest()->get();
        return view('user.show',compact(['user','posts']));
    }
}