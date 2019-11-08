<?php

namespace App\Http\Controllers;

use App\Tarea;
use App\Empresa;
use App\Articulo;
use Illuminate\Http\Request;
use App\User;

class TareaController extends Controller
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
        
        
        $dato = new Tarea;
        $dato-> nombre = $request->Nombre;
        $dato-> observacion = $request->Observacion;
        $dato-> estatus = $request->Estatus;
        $dato-> Total = 0;
        $dato-> empresa_id = $request->Administrador;
        $dato-> cliente_id = $request->Cliente;
        $dato-> pagado = 0.00;
        $dato->save();

        
        /*$dato->find($dato->id);*/

        $tarea = Tarea::find($dato->id);
        $dato = Articulo::where('tarea_id',$tarea->id)->get();
        $total = Articulo::where('tarea_id',$tarea->id)->sum('Total');

        toast('Tarea agregada Exitosamente!','success','top-right');
        return view('admin.a.tareas.articulo.index',compact('dato','total','tarea'));
        
        
        /*return view('tareas.articulo.index', compact( 'dato'));*/





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Empresa::find($id);
        $dato= Tarea::where('empresa_id',$admin->id)->get();
        $cliente = User::where('empresa_id',$id)->get();
        if(auth()->user()->hasRole('AdministradorA'))
        {
            return view('admin.a.tareas.index', compact( 'dato','admin','cliente'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $dato = Tarea::find($id);
        $adminid = $dato->empresa_id;


        $admin = Empresa::find($adminid);

        $dato->articulo()->forceDelete($id);
        $dato->forceDelete($id);
        /*return $adminid;*/
        $dato= Tarea::where('empresa_id',$adminid)->get();
        
        alert()->success('Borrado!','El Registro ha sido borrado');
        return view('admin.a.tareas.index', compact( 'dato','admin'));
    }


    public function actualizar(Request $request,$id)
    {
        $dato = Tarea::find($id);
        $dato-> estatus = $request->estatus;
        $dato->save();

        $tarea = Tarea::find($id);
        $dato = Articulo::where('tarea_id',$id)->get();
        $total = Articulo::where('tarea_id',$id)->sum('Total');

        toast('Registro Actualizado!','success','top-right');
        return view('admin.a.tareas.articulo.index',compact('dato','total','tarea'));

    }
     public function busca()
    {
        
        return view('buscaticket.index');

    } 
    public function buscat(Request $request)
    {
        $tarea = Tarea::find($request->ticket);
        if($tarea)
        {
            $articulo = Articulo::where('tarea_id',$request->ticket)->get();
            $total = Articulo::where('tarea_id',$request->ticket)->sum('Total');

            return view('buscaticket.ticket',compact('articulo','total','tarea'));   
        }
        else
        {
            
             alert()->error('Error!','Registro no encontrado');
            return back();
        }
        

    }
    public function verpago($id)
    {
        $dato = Tarea::find($id);
        

        return view('admin.a.tareas.pago',compact('dato')); 

    }
    public function pago(Request $request,$id)
    {

        $dato = Tarea::find($request->tarea);
        $dato-> pagado = $request->mientras;
        $dato->save();
        
        $admin = Empresa::find($request->lista);
        $dato= Tarea::where('empresa_id',$admin->id)->get();

        toast('Registro Actualizado!','success','top-right');
        return view('admin.a.tareas.index', compact( 'dato','admin'));
        /*return redirect()->back();*/

    }
}
