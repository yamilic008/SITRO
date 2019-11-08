<?php

namespace App\Http\Controllers\super;

use App\Http\Controllers\Controller;
use View;
use Hash;
use App\User;
use App\Cliente;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\assignRole;
use Illuminate\Support\Facades\Auth;
Use Alert;


class UsuarioController extends Controller
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
            $users = User::all();
            $roles = Role::pluck('name','id');
               /*toast('Your Post as been submited!','success','top-right');*/
            return view('super.usuarios.index',compact('users','roles'));
        }

        if(auth()->user()->hasRole('AdministradorA'))
        {
            $users = User::where('empresa_id',auth()->user()->empresa_id)->get();
            $roles = Role::pluck('name','id');
            return view('admin.a.usuarios.index',compact('users','roles'));
/*            return route('gestion')
*/      }

        else 
        {
            return view('home');
        }
        
        
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = new User;
         $roles = Role::pluck('name','id');
        
        
        return view('super.usuarios.crear', compact( 'users' ,'roles'));
        //return view('usuario.creaUsuario2');
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
        $user = new User;
        $user-> name = $request->name;
        $user-> email = $request->email;
        $user-> password = Hash::make($request->password);
        $user-> user_id = auth()->user()->id;
        if(isset($request->empresa))
        {
          $user-> empresa_id = $request->empresa;  
        } 
        $user->save();
        
        $users = User::find($request->name);
        $user-> assignRole($request->roles);
        $user->save();

        if(isset($request->empresa))
        {
            $dato = new Cliente;
            $dato-> user_id = $user->id;
            $dato-> Nombre = 'sin datos';
            $dato-> Direccion = 'sin datos';
            $dato-> Telefono = 'sin datos';
            $dato-> RFC = 'sin datos';
            $dato->save();

            toast('Usuario Creado!','success','top-right');
            return Redirect()->route('usuario.index');
        } 
        else
        {
            toast('Usuario Creado!','success','top-right');
            return Redirect('usuario');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      /* dd($request->all()); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dato = User::find($id);
        $roles = Role::pluck('name','id');
        return view('super.usuarios.edita',compact('dato','roles'));
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

        $users = User::find($id);
        $users-> name = $request->name;
        $users-> email = $request->email;
        $users->syncRoles($request->roles);
        $users->save();

        toast('Registro Actualizado!','success','top-right');
        return redirect('usuario');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete($id);

        toast('Registro Eliminado!','success','top-right');
        return redirect('usuario');
        /* $users = User::find($id);
        $id->delete();
       /* 
       return redirect()
       ->route('usuario.index')
       ->with('flash','se ha eliminado el usuario'); */
    }
    public function pass(Request $request, $id)
    {
        

        $dato = User::find($id);

        if (Hash::check($request->OldPassword, $dato->password))
        {
        $dato-> password = Hash::make($request->password);
        $dato->save();
         Alert::success('Cambio Realizado', 'Contraseña Cambiada');
         return view('super.usuarios.perfil', ['user' => $dato]);
        }
        Alert::warning('Cuidado', 'La contraseña anterior no coincide');
         return view('super.usuarios.perfil', ['user' => $dato]);
   /*     $users-> name = $request->name;
        $users-> email = $request->email;
        $users->syncRoles($request->roles);
        $users->save();
*/
        /*toast('Registro Actualizado!','success','top-right');
        return redirect('usuario');*/

    }
     public function name(Request $request, $id)
    {
        

        $dato = User::find($id);

        $dato-> name = $request->name;
        $dato->save();
         Alert::success('Cambio Realizado', 'Nombre Cambiado');
         return view('super.usuarios.perfil', ['user' => $dato]);

    }

    public function __construct() 
    {
        $this->middleware('auth')->only('profile', 'update_profile');
    }
 
    public function profile() 
    {
        $user = Auth::user();
        return view('super.usuarios.perfil', ['user' => $user]);
    }

    public function update_profile(Request $request) 
    {
    $this->validate($request, [
      'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
    ]);
 
    /*$filename = Auth::id().'_'.time().'.'.$request->avatar->getClientOriginalExtension();*/
    $filename = Auth::id().'.'.$request->avatar->getClientOriginalExtension();
    $request->avatar->move(public_path('uploads/users/'.Auth::id().''), $filename);

    
    $user = Auth::user();
    $user-> avatar = $filename;
    $user->save();
 
    return view('super.usuarios.perfil', ['user' => $user]);
  }

}
