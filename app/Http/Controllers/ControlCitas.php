<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Mail;
use App\citas;
use App\chorarios;
use App\thoras;

class ControlCitas extends Controller
{


        function cita()
        {
             $clavequesigue = citas::orderBy('idcitas','desc')
                                    ->take(1)->get();
             $cuantos = count($clavequesigue);
             if($cuantos==0)
             {
                 $idcitas= 1;
             }
             else
             {
              $idcitas = $clavequesigue[0]->idcitas+1;   
             }

             $chorarios = chorarios::all();
         return view('vitalicia.agendar')
          ->with('chorarios',$chorarios)
          ->with('idcitas',$idcitas);
        }


        function combocahorario(Request $request)
        {
             $idhc = $request->get('idhc');
             $thoras = thoras::where('idhc','=',$idhc)->get();
             return view ('vitalicia.comboh')
                ->with('thoras',$thoras);
        }

        function confirma(Request $request)
    {
                //$request->all();
                
                    $idcitas = $request->idcitas;
                    $fecha = $request->fecha;
                    $hora =$request->idhora;
                    $horaturno= $request->idhc;
                    $persona= $request->persona;
                    $parentesco= $request->relacion;
                    $appotro= $request->appotro;
                    $apmotro= $request->apmotro;
                    $nombreotro= $request->nombreotro;
                    $direotro= $request->direotro;
                    $cpotro= $request->cpotro;
                    $ciudadotro= $request->ciudadotro;
                    $municipiootro= $request->municipiootro;
                    $telotro= $request->telotro;
                    $correootro= $request->correootro;
                    $atencion= $request->atencion;
                    $folio= $request->folio;
                    $trato= $request->trato;
                    $app= $request->app;
                    $apm= $request->apm;
                    $nombrepaciente= $request->nombrepaciente;
                    $direccion= $request->direccion;
                    $ciudad= $request->ciudad;
                    $estado= $request->estado;
                    $cp= $request->cp;
                    $tlpaciente= $request->tlpaciente;
                    $sexo= $request->sexo;
                    $fnacimiento= $request->fnacimiento;
                    $motivo= $request->motivo;
            
                //$fol = $request->folio;
                //$folio= $request->folio;
                //$consul = citas::where('idcitas','=',$fol)->get();
                //$consul=\DB::select('SELECT c.idcitas FROM citas AS c where idcitas=?',[$request->folio]);
            
                 if($folio == '')
                 {
                    $ci = new citas;
                    $ci->idcitas = $request->idcitas;
                    $ci->fecha = $request->fecha;
                    $ci->hora =$request->idhora;
                    $ci->horaturno= $request->idhc;
                    $ci->persona= $request->persona;
                    $ci->parentesco= $request->relacion;
                    $ci->appotro= $request->appotro;
                    $ci->apmotro= $request->apmotro;
                    $ci->nombreotro= $request->nombreotro;
                    $ci->direotro= $request->direotro;
                    $ci->cpotro= $request->cpotro;
                    $ci->ciudadotro= $request->ciudadotro;
                    $ci->municipiootro= $request->municipiootro;
                    $ci->telotro= $request->telotro;
                    $ci->correootro= $request->correootro;
                    $ci->atencion= $request->atencion;
                    $ci->folio= $request->folio;
                    $ci->trato= $request->trato;
                    $ci->app= $request->app;
                    $ci->apm= $request->apm;
                    $ci->nombrepaciente= $request->nombrepaciente;
                    $ci->direccion= $request->direccion;
                    $ci->ciudad= $request->ciudad;
                    $ci->estado= $request->estado;
                    $ci->cp= $request->cp;
                    $ci->tlpaciente= $request->tlpaciente;
                    $ci->sexo= $request->sexo;
                    $ci->fnacimiento= $request->fnacimiento;
                    $ci->motivo= $request->motivo;
                    $ci->save();
                
                }
                else
                {
                    
                    
                    //$this->validate($request,[
                  //      'app' => 'required'
                 //]);
            
                
                    //$exist = $request->existencia;
                    //$totp = $exist - $request->cantidad;
                    //$updated = \DB::update('update productos set cantidad=? where idp=?',[$totp ,$request->idp]);
                    
                    //$cita = $request->folio;
                    //$moti = $request->motivo;
                    $updated = \DB::update('update citas set fecha=?, hora=?, horaturno=?, persona=?, parentesco=?, appotro=?, apmotro=?, nombreotro=?, direotro=?, cpotro=?, ciudadotro=?, municipiootro=?, telotro=?, correootro=?, motivo=? where idcitas=?',[$fecha, $hora, $horaturno, $persona, $parentesco, $appotro, $apmotro, $nombreotro, $direotro, $cpotro, $ciudadotro, $municipiootro, $telotro, $correootro, $motivo, $folio]);
                    
                    
     
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                }
            
                
                
            
            
             return redirect()->route('inicio');
    }
    
    
    
    
    
}

    

