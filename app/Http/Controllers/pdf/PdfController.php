<?php

namespace App\Http\Controllers\pdf;

use App\Tarea;
use App\Articulo;

use App\Area;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\pdf\ReportArea;
use App\Impresora;
use App\Oficina;

use App\Printloger;
use App\Seccion;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function pdfarea()
    {
        $area= Area::all();
        $oficina = Oficina::all();
        $seccion = Seccion::all();
        $pdf = PDF::loadView('pdf.pdfarea',compact('area','oficina','seccion'));
        //return $pdf->download('Oficians.pdf');  
        return $pdf->stream();
    }
   

    public function pdfimp()
    {
        
        $dato= Impresora::all();
        $seccion = Seccion::all();
        $area = Area::all();
        $oficinaa = Oficina::all();
        
        $pdf = PDF::loadView('pdf.pdfimp',compact('dato','seccion','area','oficinaa'));
        /*return $pdf->download('pdfview.pdf'); */  
        return $pdf->stream();
    }
    

    public function ticket(Request $request, $id)
    {
        
        $dato= Tarea::find($id);
        $fecha = Carbon::now();
        $articulo = Articulo::where('tarea_id','=', $id)->get();


        $pdf = PDF::loadView('pdf.ticket',compact('dato','articulo','fecha'));
        $pdf->setPaper("letter","landscape");
       
        /*$pdf->setOptions('enable-javascript', true);*/
        /*$pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);*/
        /*return $pdf->download('pdfview.pdf'); */  
        return $pdf->stream();
    }
}
