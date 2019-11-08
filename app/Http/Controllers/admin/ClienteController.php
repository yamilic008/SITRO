<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Administrador;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\assignRole;
use RealRashid\SweetAlert\Facades\Alert;

class ClienteController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dato = Cliente::where('user_id',$id)->get()->first();
        $user = User::find($id);
        return view('super.pago.facturacion',compact('dato','user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dato1 = Cliente::find($id);
        $dato1-> Nombre = $request->nombre;
        $dato1-> Direccion = $request->direccion;
        $dato1-> Telefono = $request->telefono;
        $dato1-> RFC = $request->rfc;
        $dato1->save(); 

        $dato = Cliente::find($id);
        $user = User::find($dato->user_id);
        //toast('Registro $id se ha Modificado!','success','top-right');
        Alert::toast('Registro se ha Modificado!', 'success', 'top-right');
        return view('super.pago.facturacion',compact('dato','user')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
