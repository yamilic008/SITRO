<?php 
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use Auth;
use App\Pago;
use Carbon\Carbon;

class CaducidadComposer
{
	Public function compose(View $view)
	{
		$actual = now();
		$admin1=isset(Auth::user()->empresa_id);
        $contador=0;
		if($admin1>0)
		{
			$admin=Auth::user()->empresa_id;
		}
		else
		{
			$admin=0;
		}
		$CaducidadA = Pago::select('fechafin')->where('empresa_id',$admin)->orderBy('fechafin', 'desc')->get();
        $caducidad = Pago::where('empresa_id',$admin)->orderBy('fechafin', 'desc')->first();
        foreach ($CaducidadA as $CadAnt) 
        {
            if ($CadAnt->fechafin >= Carbon::parse($actual)) 
                {
                   $DifAnt= Carbon::parse($CadAnt->fechafin)->diffInDays($actual);  
                   $contador = $contador + $DifAnt;
                }
        }

		if (isset($caducidad->fechafin)) 
        {
            $cad = $caducidad->fechafin;
            $inic = $caducidad->fechainicio;

            $max = Carbon::parse($cad)->diffInDays($inic); 

            /*if ($cad >= Carbon::parse($actual)) 
            {
                $uno = "uno";
                $diferencia= Carbon::parse($cad)->diffInDays($actual); 
            }
            else
            { 
                $uno = "dos";
                $dif= Carbon::parse($cad)->diffInDays($actual); 
               $diferencia= Carbon::parse($actual)->diffInDays($actual->subDay($dif), false); 
            }*/
            
        }
        else
        {
            $uno = "cero";
            $cad = 0;
            $diferencia=0;
            $max = 0;
        }
		$view->with('caducidad',$contador);
        $view->with('max',$max);

	}
}

