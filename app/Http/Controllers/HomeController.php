<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarea;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->hasRole('AdministradorA'))
        {
            $tarea=Tarea::select('total')->where('empresa_id',auth()->user()->empresa_id)->sum('total');
            $anticipo=Tarea::select('pagado')->where('empresa_id',auth()->user()->empresa_id)->sum('pagado');
            return view('admin.a.home',compact('tarea','anticipo'));
        }
        
        return view('home');
    }
}
