<?php

namespace App\Http\Controllers\super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\assignRole;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('Super_Usuario'))
        {
            $roles = Role::all();
            $permisos = Permission::all();
            
               /*toast('Your Post as been submited!','success','top-right');*/
            return view('super.roles.index',compact('permisos','roles'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*return $request;*/
        $role = Role::create(['guard_name' => $request->guard, 'name' => $request->name]);

        $roles = Role::all();
        $permisos = Permission::all();
        return view('super.roles.index',compact('permisos','roles'));

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $dato = Role::find($id);
        $permisos = Permission::all();

        return view('super.roles.edita',compact('dato','permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roles = Role::find($id);
        $roles-> name = $request->name;
        $roles->save();
        $roles->syncPermissions($request->permisos);

        $roles = Role::all();
        $permisos = Permission::all();
        toast('Registro Actualizado!','success','top-right');
        return view('super.roles.index',compact('permisos','roles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Role::find($id);
        $roles->revokePermissionTo (Permission::all() ); 
        $roles->delete($id);

        toast('Registro Eliminado!','success','top-right');
        return redirect('roles');

    }
}
