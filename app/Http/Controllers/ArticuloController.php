<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Tarea;
use Illuminate\Http\Request;

class ArticuloController extends Controller
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
    public function create($id)
    {
        $tarea= Tarea::find($id);
        return view('admin.a.tareas.articulo.crear',compact('tarea'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dato = new Articulo;
        $dato-> tarea_id = $request->tarea;
        /*$dato-> fechaadquisicion =  now();*/
        $dato-> nombre = $request->articulo;
        $dato-> cantidad = $request->cantidad;
        $dato-> udm = $request->udm;
        
      if ($request->checkiva === "on") 
        {
          $dato-> precio = $request->temporal;
        }
      else
        {
          $dato-> precio = $request->precio;
        }

        $dato-> subtotal = $request->sub;
        $dato-> iva = $request->iva;
        $dato-> total = $request->total;
        $dato-> observacion = $request->observacion;
        $dato-> autorizado = 0;
        $dato->save();

        $actividad = Tarea::find($request->tarea);
        $actividad1 = Articulo::where('tarea_id','=', $request->tarea)->sum('Total');
        $actividad-> total = $actividad1;

        $actividad->save();

        toast('Registro agregado!','success','top-right');
        return redirect()->route ('articulo.show',$request->tarea);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tarea = Tarea::find($id);
        $dato = Articulo::where('tarea_id',$id)->get();
        $total = Articulo::where('tarea_id',$id)->sum('Total');

        return view('admin.a.tareas.articulo.index',compact('dato','total','tarea'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dato = Articulo::find($id);
        return view('admin.a.tareas.articulo.edit',compact('dato'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
          $dato = Articulo::find($id);
          /*$dato-> tarea_id = $request->tarea;*/
          /*$dato-> fechaadquisicion =  now();*/
          $dato-> nombre = $request->articulo;
          $dato-> cantidad = $request->cantidad;
          $dato-> udm = $request->udm;
          
        if ($request->checkiva === "on") 
          {
            $dato-> precio = $request->temporal;
          }
        else
          {
            $dato-> precio = $request->precio;
          }

          $dato-> subtotal = $request->sub;
          $dato-> iva = $request->iva;
          $dato-> total = $request->total;
          $dato-> observacion = $request->observacion;
          $dato-> autorizado = 0;
          $dato->save();

          $actividad = Tarea::find($dato->tarea_id);
          $actividad1 = Articulo::where('tarea_id','=', $dato->tarea_id)->sum('Total');
          $actividad-> total = $actividad1;

          $actividad->save();

          toast('Registro agregado!','success','top-right');
          return redirect()->route ('articulo.show',$dato->tarea_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }

    public function actualizar(Request $request)
    {
        return $request;
    }
}
