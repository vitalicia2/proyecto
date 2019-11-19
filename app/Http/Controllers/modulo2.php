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
use App\categorias;
use App\productos;
use App\ventasdes;
use App\ventadetallesdes;
use Session;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use DB;




class modulo2 extends Controller
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
        
       
    //

    function datos2()
    {
        if( Session::get('sesionidu')!="")
		 {

        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $time = Carbon::now();
        $time = $time->format('h:i:s A');

       
    
          $datosde = datosdetalles::all();
          return view('vitalicia.modulo2')
          ->with('datosde',$datosde);
    }
        else
    {
        Session::flash('error', 'Favor de loguearse antes de 
   continuar');
    return redirect()->route('login');
    }
}


public function obtenerdatos(Request $request,$ida)
{
if( Session::get('sesionidu')!="")
       {
                      $idp = $request->get('probar');
                     
                      $datosdetal = datosdetalles::where('ida','=',$ida) ->get();
                     
                        
                   

                      $clavequesigue = ventasdes::orderBy('idv','desc')
                        ->take(1)->get();
                      $cuantos = count($clavequesigue);
                      if($cuantos==0)
                      {
                          $idv= 1;
                      }
                      else
                      {
                        $idv = $clavequesigue[0]->idv+1;   
                      }
                      
                      $categorias = categorias::all();

 
    
                   

      
              return view ('vitalicia.consulta')
              ->with('datosdetal',$datosdetal[0])
              ->with('categorias',$categorias)
              ->with('idv',$idv);
                      
              

          
    }
      else
       {
           Session::flash('error', 'Favor de loguearse antes de 
      continuar');
       return redirect()->route('login');
       }
  }


  
  

  
 


  

  //jnfdkslkññ+dfs´


  function venta(Request $request)
    {
         $clavequesigue = ventasdes::orderBy('idv','desc')
								->take(1)->get();
         $cuantos = count($clavequesigue);
         if($cuantos==0)
         {
             $idv= 1;
         }
         else
         {
          $idv = $clavequesigue[0]->idv+1;   
         }
         
         $categorias = categorias::all();
     return view('vitalicia.carrito')
      ->with('categorias',$categorias)
      ->with('idv',$idv);
    }
  

  function comboca(Request $request)
  {
       $idc = $request->get('idc');
       $productos = productos::where('idc','=',$idc)->get();
      
       return view ('vitalicia.combopro')
       ->with('productos',$productos);
  }




        function detallep(Request $request)
      {
          $idp = $request->get('idp');
          $productos = productos::where('idp','=',$idp)->get();
          return view ('vitalicia.detallep')
          ->with('productos',$productos[0]);
          //echo "$idp";
      }

                            

      function carrito(Request $request)
        {
          $exist = $request->existencia;

          $idv = $request->idv;
          $idcl = $request->country_name;
          $fecha = $request->fecha;
          $descuento = $request->des;
          $cantidad = $request->cantidad;

          $ventas = ventasdes::where('idv',$request->idv)->get();
          
          $cuantos = count($ventas);
      
            if($cuantos==0)
            {   
              
                $ventas = new ventasdes;
                $ventas->idv = $request->idv;
                $ventas->idcl = $request->country_name;
                $ventas->fecha =$request->fecha;
                $ventas->save();

              
                
                $ventadetalles = new ventadetallesdes;
                $ventadetalles->idv = $request->idv;
                $ventadetalles->idp = $request->idp;
                $ventadetalles->cantidad = $cantidad;
                $ventadetalles->costo = $request->subt / $request->cantidad ;
                $ventadetalles->descuento = $request->des;
                $ventadetalles->save();
              
            }
            else
            {
                $ventadetalles = new ventadetallesdes;
                $ventadetalles->idv = $request->idv;
                $ventadetalles->idp = $request->idp;
                $ventadetalles->cantidad = $request->cantidad;
                $ventadetalles->costo = $request->subt / $request->cantidad ;
                $ventadetalles->descuento = $request->des;
                $ventadetalles->save();
            
            }

      $totp = $exist - $request->cantidad;
      
      $updated = \DB::update('update productos set cantidad=? 
                            where idp=?',[$totp ,$request->idp]);


      
    $resultado=\DB::select("SELECT vd.idvd,vd.idp,vd.cantidad,vd.costo,vd.cantidad * vd.costo - vd.descuento AS subt,p.nombre
            FROM ventadetallesdes AS vd
            INNER JOIN productos AS p ON p.idp = vd.idp
            WHERE vd.idv= ?",[$request->idv]);
            

          

    $resultado2=\DB::select("SELECT SUM(cantidad*costo)-descuento AS subtotal,
            ROUND(SUM(cantidad*costo-descuento)*0.16,2) AS iva,
            SUM(cantidad*costo)-descuento + ROUND(SUM(cantidad*costo-descuento)*0.16,2) AS total
            FROM ventadetallesdes
            WHERE idv = ?",[$request->idv]);

          
      //   echo "$ventas"."<br>";
     //   echo "$ventadetalles"."<br>";
         return view ('vitalicia.listap')
        ->with('resultado',$resultado)
          ->with('resultado2',$resultado2[0]);
        }
        
        
                
            public function borraventas(Request $request)
            {
            $canti = $request->canti;
                $ventas = ventadetallesdes::where('idvd',$request->idvd)->get();
            $idv = $ventas[0]->idv;
          $idp = $ventas[0]->idp;
          
            $productos = productos::where('idp',$idp)->get();
            $exist = $productos[0]->cantidad;

            
          $updated = \DB::update('update productos set cantidad=cantidad +? where idp=?',[$canti ,$idp]);


          
          ventadetallesde::find($request->idvd)->delete();
                ////////////////////////////
            //echo "borraventas con clave $request->idvd con venta $idv ";
            $resultado=\DB::select("SELECT vd.idvd,vd.idp,vd.cantidad,vd.costo,vd.cantidad * vd.costo AS subt,p.nombre
                FROM ventadetallesdes AS vd
                INNER JOIN productos AS p ON p.idp = vd.idp
                WHERE vd.idv= ?",[$idv]);
                
                $resultado2=\DB::select("SELECT SUM(cantidad*costo)AS total,ROUND(SUM(cantidad*costo)/1.16,2) AS subtotal,
          SUM(cantidad*costo)-ROUND(SUM(cantidad*costo)/1.16,2) AS iva
          FROM ventadetallesdes WHERE idv = ?",[$idv]);
            
              return view ('vitalicia.listap')
              ->with('resultado',$resultado)
              ->with('resultado2',$resultado2[0]);
            }
            
          }