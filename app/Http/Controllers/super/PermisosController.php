<?php

namespace App\Http\Controllers\super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\assignRole;

class PermisosController extends Controller
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
            $dato = Permission::all();
            
               /*toast('Your Post as been submited!','success','top-right');*/
            return view('super.permisos.index',compact('dato'));
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
        $role = Permission::create(['guard_name' => $request->guard, 'name' => $request->name]);

        $dato = Permission::all();
        return view('super.permisos.index',compact('dato'));

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

        $dato = Permission::find($id);

        return view('super.permisos.edita',compact('dato'));
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
        $dato = Permission::find($id);
        $dato-> name =$request->name;
        $dato-> guard_name =$request->guard;
        $dato->save();

        $dato = Permission::all();
        toast('Registro Actualizado!','success','top-right');
        return view('super.permisos.index',compact('dato'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dato = Permission::find($id);
        $dato->revokePermissionTo (role::all() ); 
        $dato->delete($id);

        toast('Registro Eliminado!','success','top-right');
        return redirect('permisos');

    }
}
