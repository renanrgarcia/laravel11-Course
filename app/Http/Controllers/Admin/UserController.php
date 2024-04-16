<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::paginate(15); //User::all(); // can be get(). Returns a collection, specific type of array
        // dd($users); // it's used to dump and die, util to see the output and debug
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }
}
