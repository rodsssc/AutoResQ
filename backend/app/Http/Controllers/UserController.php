<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Logic to manage users, e.g., fetching all users
        $users = User::all();
        return response()->json($users);
    }
}
