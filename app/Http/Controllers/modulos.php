<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Requests\formValidation;
use App\cuidadores;
use App\datosdetalles;
use App\detalles;
use App\datotes;
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
          
      
       
        

      
     // echo "$datos"."<br>";
    //  echo "$detalles"."<br>";
  //  return view ('vitalicia.reporte')
   // ->with('resultado',$resultado);
      // ->with('resultado2',$resultado2[0]);
    }

    // pruwebas del pdf

    public function invoice() 
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('vitalicia.prueba', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
       //return $pdf->download('invoice');
    }

    public function getData() 
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }


    public function reporte(Request $request) 
    {

 

   /* $resultado=\DB::select("SELECT de.`ida` AS 'folio',cui.`nombre`AS 'licenciada',de.`fecha`,de.`hora`,dt.`paciente`,
    dt.`edad`,dt.`sexo`,dt.`talla`,dt.`peso`,dt.`ta`,dt.`fc`,dt.`fr`,dt.`grupsan` AS 'gruposanguineo',
    dt.`aguvi` AS 'agudezavisual',dt.`alergia`,dt.`tipalergia`,dt.`observaciones`
    FROM datosdetalles AS dt
    INNER JOIN detalles AS de ON de.`ida` = dt.`ida`
    INNER JOIN cuidadores AS cui ON cui.`idcuidador`=de.`idcuidador`
    ORDER BY de.`ida` DESC LIMIT 1);*/

  /*  $resultado=\DB::select("SELECT de.`ida` AS 'folio',cui.`nombre`AS 'licenciada',de.`fecha`,de.`hora`,dt.`paciente`,
    dt.`edad`,dt.`sexo`,dt.`talla`,dt.`peso`,dt.`ta`,dt.`fc`,dt.`fr`,dt.`grupsan` AS 'gruposanguineo',
    dt.`aguvi` AS 'agudezavisual',dt.`alergia`,dt.`tipalergia`,dt.`observaciones`
    FROM datosdetalles AS dt, detalles AS de, cuidadores AS cui
    WHERE de.`ida`=dt.`ida`
    AND   cui.`idcuidador`=de.`idcuidador`");*/
    
  //  $view =  \View::make('vitalicia.pdf')->with('resultado',$resultado)->render();

    //$resultado=\DB::table('datosdetalles')

   // ->select(['ida','paciente','edad','sexo','talla','peso'])->get();

  //  $view =  \View::make('vitalicia.reporte', compact('resultado'))->render();

  //  $resultado=\DB::table('datotes')

  //  ->select(['ida','licenciada','fecha','hora','paciente','edad'])->get();

    $resultado=\DB::select("SELECT de.`ida`,cui.`nombre`AS 'licenciada',de.`fecha`,de.`hora`,dt.`paciente`,
    dt.`edad`,dt.`sexo`,dt.`talla`,dt.`peso`,dt.`ta`,dt.`fc`,dt.`fr`,dt.`grupsan` AS 'gruposanguineo',
    dt.`aguvi` AS 'agudezavisual',dt.`alergia`,dt.`tipalergia`,dt.`observaciones`
    FROM datosdetalles AS dt
    INNER JOIN detalles AS de ON de.`ida` = dt.`ida`
    INNER JOIN cuidadores AS cui ON cui.`idcuidador`=de.`idcuidador`
    ORDER BY de.`ida` DESC LIMIT 1");

    $view =  \View::make('vitalicia.pdf', compact('resultado'))->render();

    $pdf = \App::make('dompdf.wrapper');

    $pdf->loadHTML($view);
    
  //  return $pdf->stream('informe'.'.pdf');  mostrar el pdf en pantalla

    return $pdf->download('informe'.'.pdf');  // descargar el pdf
    


    }

    function imprimir()
    {
        
        return view ('vitalicia.reporte');
    
    }

}

