<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\formValidation;
use App\cuidadores;
use App\datosdetalles;
use App\detalles;
use Session;




class modulos extends Controller
{
    
        //INICIO
        public function confirmacion2()
        {
                if( Session::get('sesionidu')!="")
             {
                    return view ('vitalicia.confirmacion2');
             }
            else
             {
                 Session::flash('error', 'Favor de loguearse antes de 
            continuar');
             return redirect()->route('login');
             }
        }
        
        
        public function certificado()
    {
        if( Session::get('sesionidu')!="")
     {
            return view ('vitalicia.modugeneral');
     }
    else
     {
         Session::flash('error', 'Favor de loguearse antes de 
    continuar');
     return redirect()->route('login');
     }
    }

    //funcion para obtener el doctor,el usuario de tipo paciente.

    function datos()
    {
        if( Session::get('sesionidu')!="")
		 {

         $clavequesigue = detalles::orderBy('ida','desc')
								->take(1)->get();
         $cuantos = count($clavequesigue);
         if($cuantos==0)
         {
             $ida= 1;
         }
         else
         {
          $ida = $clavequesigue[0]->ida+1;   
         }
    
          $cuida = cuidadores::all();
          return view('vitalicia.datos')
          ->with('cuida',$cuida)
          ->with('ida',$ida);
    }
        else
    {
        Session::flash('error', 'Favor de loguearse antes de 
   continuar');
    return redirect()->route('login');
    }
}


    function guardatosdel(Request $request)
    {
	    
       
        $datos = detalles::where('ida',$request->ida)->get();
       
		
          
		$cuantos = count($datos);


		 $exist = $request->alerg;

            if($exist!="")
            {	 
                $exist = $request->alerg;
            }
            else
            {
                $exist = "Ninguna";
            }

	
        if($cuantos==0)
        {   
          
            $datos = new detalles;
			$datos->ida = $request->ida;
			$datos->idcuidador = $request->idc;
			$datos->fecha =$request->fecha;
			$datos->hora =$request->hora;
			$datos->save();

			$detalles = new datosdetalles;
            $detalles->ida = $request->ida;
            $detalles->paciente = $request->paciente;
            $detalles->edad = $request->edad;
            $detalles->sexo = $request->sexo;
            $detalles->talla = $request->talla;
            $detalles->peso = $request->peso;
            $detalles->ta = $request->ta;
            $detalles->fc = $request->fc;
            $detalles->fr = $request->fr;
            $detalles->grupsan = $request->sang;
            $detalles->aguvi = $request->visual;
            $detalles->alergia = $request->alergia;
            $detalles->tipalergia = $exist;
            $detalles->observaciones = $request->comentarios;
            $detalles->save();
           
            
           
        }
        else
        {
            $detalles = new datosdetalles;
            $detalles->ida = $request->ida;
            $detalles->paciente = $request->paciente;
            $detalles->edad = $request->edad;
            $detalles->sexo = $request->sexo;
            $detalles->talla = $request->talla;
            $detalles->peso = $request->peso;
            $detalles->ta = $request->ta;
            $detalles->fc = $request->fc;
            $detalles->fr = $request->fr;
            $detalles->grupsan = $request->sang;
            $detalles->aguvi = $request->visual;
            $detalles->alergia = $request->alergia;
            $detalles->tipalergia = $exist;
            $detalles->observaciones = $request->comentarios;
            $detalles->save();
        }
          
         
            
       
        

      
      echo "$datos"."<br>";
      echo "$detalles"."<br>";
       //return view ('listap')
      // ->with('resultado',$resultado)
      // ->with('resultado2',$resultado2[0]);
    }

}