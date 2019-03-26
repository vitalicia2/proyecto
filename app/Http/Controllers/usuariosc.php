<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\usuarios;
use Session;

class usuariosc extends Controller
{
    public function login()
	{
		return view ('vitalicia.login');
	}
   public function iniciasesion (Request $request)
   {
	   $usuario = $request->usuario;
	   $passw = $request->contrasena;
	   $consulta = usuarios::withTrashed()->where('usuario','=',$usuario)
	                         ->where ('contrasena','=',$passw)
							 ->get();

	   //return $consulta;
	 if(count($consulta)==0)
	   {
    Session::flash('error', 'El usuario no existe o la contraseña
                          		 no es correcta');
		 return redirect()->route('login');
		  
	   }
	   else
	   {
		   $desactivado = $consulta[0]->deleted_at;
		   if ($desactivado!="")
		   {
		    Session::flash('error', 'El usuario esta deshabilitado 
			pase con su administrador');
		 return redirect()->route('login');
		   }
		   else
		   {
	      Session::put('sesionname',$consulta[0]->usuario);
		  Session::put('sesionidu',$consulta[0]->idu);
		  Session::put('sesiontipo',$consulta[0]->idt);
	      
		  $sname = Session::get('sesionname');
		  $sidu = Session::get('sesionidu');
		  $stipo = Session::get('sesiontipo');
		 // echo $sname . ' '. $sidu . ' '. $stipo;
	      return redirect()->route('principal');
		   }
	   }
       
   }
   public function principal()
   {
	   if( Session::get('sesionidu')!="")
	   return redirect()->route('home');
       else
	   {
		Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
	   }
   }
   public function cerrarsesion()
   {
	   Session::forget('sesionname');
	   Session::forget('sesionidu');
	   Session::forget('sesiontipo');
	   Session::flush();
	   Session::flash('error', 'Session Cerrada Correctamente');
	   return redirect()->route('login');
   }
}
