<?php

namespace App\Http\Controllers\super;

use App\Http\Controllers\Controller;

use App\Pago;
use App\Empresa;
use App\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dato = User::all();
       $dato1 = User::all();
       $admin = Empresa::all();
       
        return view('super.pago.index',compact('dato','dato1','admin'));
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
        /*$hoy = Carbon::parse($request->hoy);
        return $hoy->format('d-m-Y h:i:s A');*/
        $hoy = Carbon::parse($request->hoy);
        $add = $request->mes;
        $suma = $hoy->addMonths($add);

        
        $dato = new Pago;
        $dato-> empresa_id = $request->cliente;
        $dato-> monto = $request->monto;
        $dato-> fechaainicio = $request->hoy;
        $dato-> fechafin = $suma;
        $dato->save(); 

        toast('Registro agregado!','success','top-right');
        return redirect()->route ('pagos.show',$request->cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actual = now();
        $caducidad = Pago::where('empresa_id',$id)->orderBy('fechafin', 'desc')->first();
        $CaducidadAnterior = Pago::select('fechafin')->where('empresa_id',$id)->orderBy('fechafin', 'desc')->skip(1)->first();
        $CaducidadA = Pago::select('fechafin')->where('empresa_id',$id)->orderBy('fechafin', 'desc')->get();
        $contador = 0;
        foreach ($CaducidadA as $CadAnt) 
        {
            if ($CadAnt->fechafin >= Carbon::parse($actual)) 
                {
                   $DifAnt= Carbon::parse($CadAnt->fechafin)->diffInDays($actual);  
                   $contador = $contador + $DifAnt;
                }
        }

      /*   if (isset($caducidad->fechafin)) 
        {
            $cad = $caducidad->fechafin;
            if ($cad >= Carbon::parse($actual)) 
            {
                $uno = "uno";
                if ($CaducidadAnterior->fechafin >= Carbon::parse($actual)) 
                {
                    $DiferenciaAnterior= Carbon::parse($CaducidadAnterior->fechafin)->diffInDays($actual); 
                    $diferencia= Carbon::parse($cad)->diffInDays($actual);
                    $diferencia = $diferencia + $DiferenciaAnterior;
                }



                /*return $cad;
            }
            else
            { 
                $uno = "dos";
                $dif= Carbon::parse($cad)->diffInDays($actual); 
               $diferencia= Carbon::parse($actual)->diffInDays($actual->subDay($dif), false); 
            }
            
        }
        else
        {
            $uno = "cero";
            $cad = 0;
            $diferencia=0;
        }*/
        $diferencia=0;
      

        $dato = Empresa::find($id);
        $pago = Pago::where('empresa_id',$id)->orderBy('id', 'desc')->get();
        $hoy = now();
        /*toast('Registro agregado!','success','top-right');*/
        return view('super.pago.detalle',compact('dato','pago','hoy','diferencia','cad','uno','CaducidadAnterior','contador'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(pago $pago)
    {
        //
    }
}
