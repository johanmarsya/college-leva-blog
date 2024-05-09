<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('users.index')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
    }
}
