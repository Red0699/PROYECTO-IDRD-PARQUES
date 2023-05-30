<?php

namespace App\Http\Controllers;

use App\Events\UserRecord;
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
        abort_if(Gate::denies('users_module'), 403);
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('users_module'), 403);
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {

        $user = User::create($request->only('name', 'email') + [
            'password' => bcrypt($request->input('password')),
        ]);

        $roles = $request->input('roles', []);

        $user->syncRoles($roles);
        event(new UserRecord($user, "create", "ALL"));
        return redirect()->route('user.index')->with('success', 'Se ha registrado el usuario correctamente');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('users_module'), 403);
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('users_module'), 403);
        $roles = Role::all();
        $user->load('roles');
        //dd($user);
        //dd($roles);

        if (auth()->user()->hasRole('Administrador')) {
            // Verificar y desencriptar la contraseña
            $user->password = Hash::check('secret', $user->password) ? 'secret' : '';
        } else  {
            // Desencriptar la contraseña
            $user->password = bcrypt($user->password);
        }
        //dd($user->password);

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->only('name', 'email');
        $password = $request->input('password');

        if ($password)
            $data['password'] = bcrypt($password);
        // if(trim($request->password)=='')
        // {
        //     $data=$request->except('password');
        // }
        // else{
        //     $data=$request->all();
        //     $data['password']=bcrypt($request->password);
        // }

        $user->update($data);
        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        $updated_fields = $user->getChanges(); // Campos que han sido modificados

        $campos = implode(',', $updated_fields); //Se pasa el array a un string
        event(new UserRecord($user, "update", $campos));
        return redirect()->route('user.index')->with('success', 'Se ha editado el usuario correctamente');
    }

    public function destroy(User $user)
    {

        if (auth()->user()->id == $user->id) {
            return redirect()->route('user.index');
        }
        event(new UserRecord($user, "delete", "ALL"));
        $user->delete();
        return back()->with('success', 'Usuario eliminado correctamente');
    }
}
