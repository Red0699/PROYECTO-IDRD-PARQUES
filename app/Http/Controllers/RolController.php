<?php

namespace App\Http\Controllers;

use App\Events\RolRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_if(Gate::denies('roles_module'), 403);
        $roles = Role::all();

        return view('pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('roles_module'), 403);
        $permissions = Permission::all()->pluck('name', 'id');

        return view('pages.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $rol = Role::create($request->only('name'));

        $rol->permissions()->sync($request->input('permissions', []));
        event(new RolRecord($rol, "create", "ALL"));
        return redirect()->route('rol.index')->with('success', 'Se ha registrado el rol correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        abort_if(Gate::denies('roles_module'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $rol)
    {
        //
        abort_if(Gate::denies('roles_module'), 403);
        $permissions = Permission::all()->pluck('name', 'id');
        $rol->load('permissions');
        return view('pages.roles.edit', compact('rol', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $rol)
    {
        //
        $rol->update($request->only('name'));
        $rol->permissions()->sync($request->input('permissions', []));
        $updated_fields = $rol->getChanges(); // Campos que han sido modificados
        
        $campos = implode(',', $updated_fields); //Se pasa el array a un string
        event(new RolRecord($rol, "update", $campos));
        return redirect()->route('rol.index')->with('success', 'Se ha editado el rol '.$rol->name.' correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $rol)
    {
        //
        event(new RolRecord($rol, "delete", "ALL"));
        $rol->delete();

        return redirect()->route('rol.index')->with('success', 'Se ha eliminado el parque');
    }
}
