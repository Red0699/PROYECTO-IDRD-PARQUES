<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        abort_if(Gate::denies('user_index'), 403);
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), 403);
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        
        $user = User::create($request->only('name', 'email', 'password'));

        $roles = $request->input('roles', []);

        $user->syncRoles($roles);

        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all();
        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only('name', 'email', 'password'));
        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
