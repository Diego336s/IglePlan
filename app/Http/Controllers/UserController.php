<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = User::with('rol')->get();

        return view('admin.users.index', compact('users'));
    }
}
