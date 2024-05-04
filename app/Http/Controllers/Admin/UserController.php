<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
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

    public function store(StoreUserRequest $request) {
        User::create($request->validated());

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function edit(string $id) {
        // $user = User::where('id', '=', $id)->first();
        // $user = User::where('id', $id)->first(); // to API is common ->firstOrFail()
        if (!$user = User::find($id)) {
            return redirect()
                ->route('users.index')
                ->with('message', 'User not found');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update (UpdateUserRequest $request, string $id) {
        if (!$user = User::find($id)) {
            return back()->with('message', 'User not found');
        }

        $data = $request->only('name', 'email');
    
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully');
    }
}
