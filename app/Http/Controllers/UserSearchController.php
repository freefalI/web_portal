<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function index(Request $request)
    {
        return view('user.search');
    }

    public function ajax_search(Request $request)
    {
        $users = User::where('nickname', 'LIKE', '%' . $request->search . "%")->
        orWhere('name', 'LIKE', '%' . $request->search . "%")->get();
        return response()->json($users);
    }
}
