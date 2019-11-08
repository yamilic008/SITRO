<?php

namespace App\Http\Controllers\super;

use App\Empresa;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $dato = new Empresa;
        $dato-> Nombre = $request->nombre;
        $dato-> Direccion = $request->direccion;
        $dato-> Telefono = $request->telefono;
        $dato-> Rfc = $request->rfc;
        $dato->save(); 

        toast('Registro agregado!','success','top-right');
        return redirect()->route ('pagos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dato = Empresa::find($id);
        $users = User::where('empresa_id',$id)->get();
        $roles = Role::all();
        

        if($AdministradorA=auth()->user()->hasRole('AdministradorA'))
        {
            return view('admin.a.usuarios.clientes',compact('user','dato','roles')); 
        }
        if($AdministradorA=auth()->user()->hasRole('Super_Usuario'))
        {
            return view('super.pago.users',compact('users','dato','roles')); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(auth()->user()->empresa_id == $id || auth()->user()->hasRole('Super_Usuario'))
        {
            $dato = Empresa::find($id);
            return view('super.pago.empresaedita',compact('dato'));    
        }
        else
        {
            alert()->error('Error','No tienes permitido hacer eso');
            return back();
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dato = Empresa::find($id);
        $dato-> Nombre = $request->nombre;
        $dato-> Direccion = $request->direccion;
        $dato-> Telefono = $request->telefono;
        $dato-> Rfc = $request->rfc;
        $dato->save(); 

        toast('Registro Modificado!','success','top-right');
        return view('super.pago.empresaedita', ['dato' => $dato]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dato = Empresa::find($id);
        $dato->delete($id);
        toast('Registro Elminiado!','success','top-right');
        return redirect()->route ('pagos.index');
    }
    public function update_empresa(Request $request) 
    {
        $this->validate($request, [
          'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $empresa = Empresa::find($request->id);
        /*$filename = Auth::id().'_'.time().'.'.$request->avatar->getClientOriginalExtension();*/
        $filename = $empresa->id.'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('uploads/empresa/'.$empresa->id.''), $filename);



        $dato = Empresa::find($empresa->id);
        $dato->logo = $filename;
        $dato->save();

        toast('Logotipo Modificado!','success','top-right');
        return view('super.pago.empresaedita', ['dato' => $dato]);
    }
    
}
