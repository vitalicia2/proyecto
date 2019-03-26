<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\formValidation;
use App\tipos;
use App\usuarios;
use App\medicamentos;
use App\horarios;
use App\alimentaciones;
use App\alimentos;
use App\geriatricos;
use App\gvalores;
use App\cuidadores;
use App\turnos;
use App\signos;
use App\pacientes;
use App\amedicamentos;
use App\actividades;
use App\npacientes;
use App\detalles;
use App\datos;
use Session;



class vitalicia extends Controller
{
    //INICIO
       public function home()
    { 
        if( Session::get('sesionidu')!="")
		 {

         
        $usuariosd=\DB::select("SELECT u.idu,u.usuario,u.contrasena,u.correo,u.deleted_at,t.tipo AS tip
        FROM usuarios AS u
        INNER JOIN tipos AS t ON t.idt =  u.idt");

        $datosd = datos::withTrashed()->orderBy('idd','asc')->get();

        $pacientesd=\DB::select(" SELECT p.idpaciente,p.fechapaciente,
          CONCAT(d.nombre,' ',d.ap,' ',d.am)AS 'nombre',m.nombre AS medicamento,
          CONCAT(a.menu,' ',a.consumo)AS alimentacion,
          CONCAT(s.ta,' ',s.`fc`,' ',s.`fr`,' ',s.`temp`,' ',s.`spo2`,' ',s.`glucosa`,s.`protesis`)AS signos,
          g.valorg,v.act1
          FROM pacientes AS p
          INNER JOIN datos AS d  ON d.idd = p.idd
          INNER JOIN medicamentos AS m ON m.idmedicamento=p.idmedicamento
          INNER JOIN alimentaciones AS a ON a.idalimentacion=p.idalimentacion
          INNER JOIN signos AS s ON s.ids=p.ids
          INNER JOIN geriatricos AS g ON g.idgeriatricos=p.idgeriatricos
          INNER JOIN actividades AS v ON v.idactividades=p.idactividades");

        $npacientes=\DB::select("SELECT	p.`idnp`,u.`usuario` AS paciente,p.`actividad1`,p.`hora1`,p.`actividad2`,p.`hora2`,p.`actividad3`,p.`hora3`,
        p.`menu`,p.`consumo`,p.`observaciones`,p.`horacomida`,p.`tipocomida`,p.`tgeriatrico1`,p.`tgeriatrico2`,p.`tgeriatrico3`,
        p.`ta`,p.`fc`,p.`fr`,p.`temp`,p.`spo2`,p.`glucosa`,p.`protesis`,p.`cuidadornombre`,p.`fechacuidador`,a.`nmedica`,
        p.`amindicacion`,p.`ampresen`,p.`deleted_at`
        FROM npacientes AS p
        INNER JOIN usuarios AS u ON u.`idu`=p.`idu`
        INNER JOIN amedicamentos AS a ON a.`idamedicamento`=p.`idamedicamento`");

        $mispa=\DB::select("SELECT p.`idpaciente`,p.`pacientes`,p.`fechapaciente`,a.`act1`,a.`hora1`,a.`act2`,a.`hora2`,a.`act3`,a.`hora3`,al.`menu`,al.`consumo`,al.`observaciones`
        FROM pacientes AS p
        INNER JOIN actividades AS a ON a.`idactividades`=p.`idactividades`
        INNER JOIN alimentaciones AS al ON al.`idalimentacion`=p.`idalimentacion`");

        $medicam = amedicamentos::withTrashed()->orderBy('idamedicamento','asc')->get();
            
     
            return view ('vitalicia.home')
            ->with('usuariosd',$usuariosd)
            ->with('datosd',$datosd)
            ->with('medicam',$medicam)
            ->with('npacientes',$npacientes)
            ->with('mispa',$mispa)
            ->with('pacientesd',$pacientesd);
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 
    
    //INICIO
       public function inicio()
    {
                return view ('vitalicia.inicio');
         
    } 
    
    
     //Galeria
     public function galeria()
     {
                 return view ('vitalicia.galeria');
          
     }
       public function registropacientes()
    {   
        if( Session::get('sesionidu')!="")
        {   
        $amedicamentos = amedicamentos::withTrashed()->orderBy('nmedica','asc')
                        
                          ->get();
            
           $pausu = usuarios::where('idt','=','4')
                                    ->orderBy('usuario','asc')
                                    ->get();
                    
        
                return view ('vitalicia.datpacientes')
                        ->with('pausu',$pausu)
                        ->with('amedicamentos',$amedicamentos);
                }
                else
                         {
                                 Session::flash('error', 'Favor de loguearse antes de 
                        continuar');
                         return redirect()->route('login');
                         }
            }
    
    
    ///////////////////////////////////////////////////////////////////////////
    
    public function guardanpaciente(Request $request)
    {   
        if( Session::get('sesionidu')!="")
        {
                $request->all(); //Procesa los datos del formulario
            
                $this->validate($request,[
                        'cuidadornombre' => 'required',
                        'actividad1' => 'required',
                        'actividad2' => 'required',
                        'actividad3' => 'required',
                        'menu' => 'required',
                        'consumo' => 'required',
                        'observaciones' => 'required',
                        'horacomida' => 'required',
                        'tipocomida' => 'required',
                        'tgeriatrico1' => 'required',
                        'tgeriatrico2' => 'required',
                        'tgeriatrico3' => 'required',
                        'ta' => 'integer',
                        'fc' => 'integer',
                        'fr' => 'integer',
                        'temp' => ['regex:/^[0-9]+[.][0-9]{2}$/'],
                        'spo2' => 'required',
                        'glucosa' => 'required'
                 ]);
                    
                $npac = new npacientes;
                $npac->idnp = $request->idnp;
                $npac->idamedicamento = $request->medicam;
                $npac->idu = $request->idu;
                $npac->actividad1 = $request->actividad1;    
                $npac->hora1 = $request->hora1;
                $npac->actividad2 = $request->actividad2;
                $npac->hora2 = $request->hora2;
                $npac->actividad3 = $request->actividad3;
                $npac->hora3 = $request->hora3;
                $npac->menu = $request->menu;
                $npac->consumo = $request->consumo;
                $npac->observaciones = $request->observaciones;
                $npac->horacomida = $request->horacomida;
                $npac->tipocomida = $request->tipocomida;
                $npac->tgeriatrico1 = $request->tgeriatrico1;
                $npac->tgeriatrico2 = $request->tgeriatrico2;
                $npac->tgeriatrico3 = $request->tgeriatrico3;
                $npac->ta = $request->ta;
                $npac->fc = $request->fc;
                $npac->fr = $request->fr;
                $npac->temp = $request->temp;
                $npac->spo2 = $request->spo2;
                $npac->glucosa = $request->glucosa;
                $npac->protesis = $request->protesis;
                $npac->cuidadornombre = $request->cuidadornombre;
                $npac->fechacuidador = $request->fechacuidador;
                $npac->amindicacion = $request->amindicacion;
                $npac->ampresen = $request->ampresen;
                $npac->save();


                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 
    
    
    /////////////////////////
    
    
        //INICIO
       public function confirmacion()
    {
            if( Session::get('sesionidu')!="")
		 {
                return view ('vitalicia.confirmacion');
         }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }
    
    
    //INICIO
       public function spaciente()
    {
           if( Session::get('sesionidu')!="")
		 {
            return view ('vitalicia.pacientes');
         }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 
    
    //USUARIOS
       public function rUsuario()
    { 
      if( Session::get('sesionidu')!="")
		 {
        //INCREMENTA EL IDD PARA MOSTRAR EN LA VISTA    
        $clavequesigue = datos::withTrashed()->orderBy('idd','desc')
                                            ->take(1)
                                            ->get();
            if (count($clavequesigue)==0)
            {
                    $idds = 1;
            }
            else
            {
            $idds= $clavequesigue[0]->idd+1;
            }
        
        
        $rdusu = usuarios::withTrashed()->where('idt','!=','4')
                        
                          ->get();
        
            

            
        //return $carreras;
        return view ('vitalicia.rUsuario')
                    ->with('idds',$idds)
                    ->with('usuarios',$rdusu);
      }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 
    
           public function usuario()
    {
        if( Session::get('sesionidu')!="")
		 {
                //EN LA VISTA DE USUARIO NOS MUESTRA EL SELECT DE LOS TIPOS DE USUARIOS
            $claveusu = usuarios::withTrashed()->orderBy('idu','desc')
                                            ->take(1)
                                            ->get();
                        

            if (count($claveusu)==0)
            {
                    $idus = 1;
            }
            else
            {
            $idus= $claveusu[0]->idu+1;
            }
               
               
            $tipos = tipos::where('activo','=','SI')
                                    ->orderBy('tipo','asc')
                                    ->get();
            return view ('vitalicia.usuario')
                ->with('tipos',$tipos)
                ->with('idus',$idus);
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }       
    } 

       public function bUsuario()
    {
         if( Session::get('sesionidu')!="")
		 {
             return view ('vitalicia.bUsuario');
         }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 

       public function mUsuario()
    {
            if( Session::get('sesionidu')!="")
		 {
                return view ('vitalicia.mUsuario');
         }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }
    
    //PACIENTES

       public function cPaciente()
    {
           if( Session::get('sesionidu')!="")
		 {
            return view ('vitalicia.cPaciente');
         }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 

       public function rPaciente()
    {
         if( Session::get('sesionidu')!="")
		 {
             return view ('vitalicia.rPaciente');
         }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 

    //
    
           public function guardausuario(formValidation $request)
    {   
        if( Session::get('sesionidu')!="")
        {
                $request->all(); //Procesa los datos del formulario
            
                    
            $file = $request->file('archivo');
            if($file!="")
            {
            $ldate = date('Ymd_His_');
            $img = $file->getClientOriginalName();
            $img2 = $ldate.$img;
            \Storage::disk('local')->put($img2, \File::get($file));
            }
            else
            {
                $img2='sinfoto.png';
            }
                $dat = new datos;
                $dat->idd = $request->idd;
                $dat->nombre = $request->nombre;
                $dat->ap = $request->ap;
                $dat->am = $request->am;    
                $dat->edad = $request->edad;
                $dat->telefono = $request->telefono;
                $dat->calle = $request->calle;
                $dat->numero = $request->numero;
                $dat->calle1 = $request->calle1;
                $dat->calle2 = $request->calle2;
                $dat->colonia = $request->colonia;
                $dat->municipio = $request->municipio;
                $dat->ciudad = $request->ciudad;
                $dat->cp = $request->cp;
                $dat->referencia = $request->referencia;
                $dat->archivo = $img2;
                $dat->idu = $request->idu;
                $dat->save();


                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 
    
      public function gusuario(Request $request)
    {   
       if( Session::get('sesionidu')!="")
		 {
           $request->all(); //Procesa los datos del formulario
            
        $this->validate($request,[
                'usuario' => 'required',
                'contrasena' => 'required',
                'correo' => 'required|email'
         ]);
                $usu = new usuarios;
                $usu->idu = $request->idu;
                $usu->usuario = $request->usuario;
                $usu->contrasena = $request->contrasena;
                $usu->correo = $request->correo;
                $usu->idt = $request->idt;
                $usu->save();


                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }     

    public function rmedicamento()
    {
        if( Session::get('sesionidu')!="")
		 {
            //INCREMENTA EL IDD PARA MOSTRAR EN LA VISTA    
        $clavequesiguem =medicamentos::withTrashed()->orderBy('idmedicamento','desc')
                                            ->take(1)
                                            ->get();

                                            if (count($clavequesiguem)==0)
                                            {
                                                    $iddm = 1;
                                            }
                                            else
                                            {
                                       $iddm = $clavequesiguem[0]->idmedicamento+1;
                                        }
    

        $horarios = horarios::withTrashed()->orderBy('tipohorario','asc')
                        
                          ->get();
        
        $amedicamentos = amedicamentos::withTrashed()->orderBy('nmedica','asc')
                        
                          ->get();
        
         $rdusu = usuarios::withTrashed()->where('idt','=',4)
                        
                          ->get();
        

            
        
        return view ('vitalicia.rMedicamentos')
                    ->with('iddm',$iddm)
                    ->with('horarios',$horarios)
                    ->with('usuarios',$rdusu)
                    ->with('amedicamentos',$amedicamentos);
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 

    public function guardamedicamento(Request $request)
    {   
        if( Session::get('sesionidu')!="")
		 {
            $request->all(); //Procesa los datos del formulario


                $med = new medicamentos;
                $med->indicacion = $request->indicacion;
                $med->presen = $request->presen;
                $med->terminotx = $request->terminotx;
                $med->idh = $request->idh;
                $med->idamedicamento = $request->medicam;
                $med->save();


              
                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 

    public function ralimentacion()
    {
        if( Session::get('sesionidu')!="")
		 {
            //INCREMENTA EL IDD PARA MOSTRAR EN LA VISTA    
        $claveali =alimentaciones::withTrashed()->orderBy('idalimentacion','desc')
                                            ->take(1)
                                            ->get();
                                            if (count($claveali)==0)
                                            {
                                                    $idal = 1;
                                            }
                                            else
                                            {
                                       $idal = $claveali[0]->idalimentacion+1;
                                        }
                                                                   
      

        $alimentos = alimentos::withTrashed()->orderBy('idalimentos','asc')
                     
                          ->get();
            
        //return $carreras;
        return view ('vitalicia.rAlimentacion')
                    ->with('idal',$idal)
                    ->with('alimentos',$alimentos);
       }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 

    public function guardalimento(Request $request)
    {   
      if( Session::get('sesionidu')!="")
		 {
          // $request->all(); //Procesa los datos del formulario

        $hora =  $request->hora;
        $menu = $request->menu;
        $consumo= $request->consumo;
        $idalimentacion = $request->idalimentacion;
        $observaciones= $request->observaciones;
               
           $this->validate($request,[
                'nombre'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'terminotx'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'indicacion'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'presen'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'horario'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/']
         ]);
                $ali = new alimentaciones;
                $ali->idalimentacion = $request->idalimentacion;
                $ali->hora = $request->hora;
                $ali->menu = $request->menu;
                $ali->consumo = $request->consumo;
                $ali->observaciones = $request->observaciones;    
                $ali->idalimentos= $request->idalimentos;
                $ali->save();


              
                return redirect()->route('confirmacion');
      }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }  
    }
        
        
    public function getdatos()

    {
        if( Session::get('sesionidu')!="")
		 {
               $datosd = datos::withTrashed()->orderBy('idd','asc')->get();
               return view ('vitalicia.cdatos')
               ->with('datosd',$datosd);
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
   }

   public function modificadat($idd)
	{
       if( Session::get('sesionidu')!="")
		 {
            $datosm = datos::where('idd','=',$idd)
		                     ->get();
	             //return $datosm;
                return view ('vitalicia.moddatos')
                ->with('datosm',$datosm[0]);
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }            
    }

  public function guardamodificadat(Request $request)
    {
       if( Session::get('sesionidu')!="")
		 {
                $idd =  $request->idd;
                $nombre = $request->nombre;
                $ap = $request->ap;
                $am = $request->am;
                $edad = $request->edad;
                $telefono = $request->telefono;
                $calle = $request->calle;
                $numero = $request->numero;
                $calle1 = $request->calle1;
                $calle2 = $request->calle2;
                $colonia = $request->colonia;
                $municipio = $request->municipio;
                $ciudad = $request->ciudad;
                $cp = $request->cp;
                $referencia = $request->referencia;



                //HAY QUE REVISAR LAS VALIDACIONES
                /* $this->validate($request,[
                        'idd'=>'required|numeric',
                        'idu'=>'required|numeric',
                        'nombre' => ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                        'ap' => ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                        'am' => ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                        'edad' => 'required|integer',
                        'telefono' => ['regex:/^[0-9]{10}$/'], 
                        'calle' => 'required',
                        'numero' => 'required|integer',
                        'calle1' => 'required',
                        'calle2' => 'required',
                        'colonia' => 'required',
                        'municipio' => 'required',
                        'ciudad' => 'required',
                        'cp' => ['regex:/^[0-9]{5}$/'],
                        'referencia' => 'required',
                        'archivo'=>'image|mimes:jpeg,png,gif,jpg'
                     ]);*/

                     $file = $request->file('archivo');
                     if($file!="")
                     {	 
                     $ldate = date('Ymd_His_');
                     $img = $file->getClientOriginalName();
                     $img2 = $ldate.$img;
                     \Storage::disk('local')->put($img2, \File::get($file)); 
                     }

                    $dato = datos::find($idd);
                        $dato->idd = $request->idd;
                        if($file!="")
                    {	
                    $dato->archivo = $img2;
                    }
                $dato->nombre = $request->nombre;
                $dato->ap =$request->ap;
                $dato->am= $request->am;
                        $dato->edad=$request->edad;
                        $dato->telefono=$request->telefono;
                        $dato->calle=$request->calle;
                        $dato->numero=$request->numero;
                        $dato->calle1=$request->calle1;
                        $dato->calle2=$request->calle2;
                        $dato->colonia=$request->colonia;
                        $dato->municipio=$request->municipio;
                        $dato->ciudad=$request->ciudad;
                        $dato->cp=$request->cp;
                        $dato->referencia=$request->referencia;
                        $dato->save();
                        return redirect()->route('confirmacion');
       }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
        
}

   public function eliminam($idd)
	{
       if( Session::get('sesionidu')!="")
		 {
            datos::find($idd)->delete();
		  
			return redirect()->route('confirmacion');
         }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }
        
    
        public function restauram($idd)
	{
        if( Session::get('sesionidu')!="")
		 {    
                datos::withTrashed()->where('idd',$idd)->restore();
                    return redirect()->route('confirmacion');
            
         }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }    
    }
        
     public function efisicam($idd)
	
    {
	   if( Session::get('sesionidu')!="")
        {
           datos::withTrashed()->where('idd',$idd)->forceDelete();
           return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }
    

   public function rgeriatrico()
    {
        if( Session::get('sesionidu')!="")
		 {
            //INCREMENTA EL IDD PARA MOSTRAR EN LA VISTA    
            $claveger =geriatricos::withTrashed()->orderBy('idgeriatricos','desc')
                                            ->take(1)
                                            ->get();

                                            if (count($claveger)==0)
                                            {
                                                    $idger = 1;
                                            }
                                            else
                                            {
                                       $idger = $claveger[0]->idgeriatricos+1;
                                        }

 

        $gvalores = gvalores::withTrashed()->orderBy('idvg','asc')
                     
                      ->get();
            
     
        return view ('vitalicia.rGeriatricos')
                    ->with('idger',$idger)
                    ->with('gvalores',$gvalores);
         }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 

    public function guardageriatrico(Request $request)
    {   
         if( Session::get('sesionidu')!="")
		 {

        $idgeriatricos = $request->idgeriatricos;
        $valorg =  $request->valorg;
        $valorg1 = $request->valorg1;
        $valorg2= $request->valorg2;
      
       
               
           
                $ger = new geriatricos;
                $ger->idgeriatricos = $request->idgeriatricos;
                $ger->valorg = $request->valorg;
                $ger->valorg1 = $request->valorg1;
                $ger->valorg2 = $request->valorg2;  
                $ger->idvg= $request->idvg;
                $ger->save();


                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 

    public function rcuidador()
    {
        if( Session::get('sesionidu')!="")
		 {
            //INCREMENTA EL IDD PARA MOSTRAR EN LA VISTA    
            $clavecui =cuidadores::withTrashed()->orderBy('idcuidador','desc')
                                            ->take(1)
                                            ->get();
                                            if (count($clavecui)==0)
                                            {
                                                    $idcu = 1;
                                            }
                                            else
                                            {
                                       $idcu = $clavecui[0]->idcuidador+1;
                                        }
                                                                   
      

        $datoss =datos::withTrashed()->orderBy('idd','asc')
                     
                          ->get();
            
        //return $carreras;
        return view ('vitalicia.rCuidador')
                    ->with('idcu',$idcu)
                    ->with('datoss',$datoss);
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 

      public function guardacuidador(Request $request)
    {   
      if( Session::get('sesionidu')!="")
		 {       // $request->all(); //Procesa los datos del formulario

        $horaentrada =  $request->horaentrada;
        $horasalida = $request->horasalida;
      
        $idcuidador = $request->idcuidaor;
        $observaciones= $request->observaciones;
               
           $this->validate($request,[
                'nombre'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'terminotx'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'indicacion'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'presen'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'horario'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/']
         ]);
                $cui = new cuidadores;
                $cui->idcuidador = $request->idcuidador;
                $cui->horaentrada = $request->horaentrada;
                $cui->horasalida = $request->horasalida;
                $cui->idd= $request->idd;
                $cui->save();


              
                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 

    public function rsignos()
    {
        if( Session::get('sesionidu')!="")
		 {
            //INCREMENTA EL IDD PARA MOSTRAR EN LA VISTA    
        $clavesig =signos::withTrashed()->orderBy('ids','desc')
                                            ->take(1)
                                            ->get();
                                            if (count($clavesig)==0)
                                            {
                                                    $idsi = 1;
                                            }
                                            else
                                            {
                                       $idsi = $clavesig[0]->ids+1;
                                        }
                                                                   
      

        $turnos =turnos::withTrashed()->orderBy('idturno','asc')
                     
                          ->get();
            
        //return $carreras;
        return view ('vitalicia.rSignos')
                    ->with('idsi',$idsi)
                    ->with('turnos',$turnos);
      }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 

      public function guardasignos(Request $request)
    {   
       if( Session::get('sesionidu')!="")
		 {
           // $request->all(); //Procesa los datos del formulario

        $ta =  $request->ta;
        $fc = $request->fc;
        $ids = $request->ids;
        $fr= $request->fr;
        $temp= $request->temp;
        $spo2= $request->spo2;
        $glucosa= $request->glucosa;
        $protesis= $request->protresis;
               
           $this->validate($request,[
                'nombre'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'terminotx'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'indicacion'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'presen'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'horario'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/']
         ]);
                $sig = new signos;
                $sig->ids = $request->ids;
                $sig->ta = $request->ta;
                $sig->fc = $request->fc;
                $sig->fr = $request->fr;
                $sig->temp = $request->temp;
                $sig->spo2 = $request->spo2;
                $sig->glucosa = $request->glucosa;
                $sig->protesis = $request->protesis;
                $sig->idturno= $request->idturno;
                $sig->save();


              
                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 
   
    

   public function getusuarios()

   {
     if( Session::get('sesionidu')!="")
		 {
   
       
        $usuariosd=\DB::select("SELECT u.idu,u.usuario,u.contrasena,u.correo,u.deleted_at,t.tipo as tip
            FROM usuarios AS u
            INNER JOIN tipos AS t ON t.idt =  u.idt");
            return view ('vitalicia.cusuarios')
            ->with('usuariosd',$usuariosd);
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
   
   }
    
    
  
            
    
    
      //Catalogo alta de medicamentos
       public function cmedicamentos()
    {
       if( Session::get('sesionidu')!="")
		 {
           //INCREMENTA EL IDD PARA MOSTRAR EN LA VISTA    
            $cmedicalta =amedicamentos::withTrashed()->orderBy('idamedicamento','desc')
                                            ->take(1)
                                            ->get();

                                            if (count($cmedicalta)==0)
                                            {
                                                    $idamedica = 1;
                                            }
                                            else
                                            {
                                       $idamedica = $cmedicalta[0]->idamedicamento+1;
                                        }
    

             return view ('vitalicia.amedicamentos')
                    ->with('idamedica',$idamedica);
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 
    
    public function gmedicamento(Request $request)
    {   
       if( Session::get('sesionidu')!="")
		 {
           // $request->all(); //Procesa los datos del formulario

        $idamedicamento = $request->idamedicamento;
        $nmedica =  $request->nmedica;
        $mpresen= $request->mpresen;
        $mindicacion= $request->mindicacion;
        
        $this->validate($request,[
                'nmedica'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'mindicacion'=> 'required',
                'mpresen' => ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/']
             ]);
               

                $amed = new amedicamentos;
                $amed->idamedicamento = $request->idamedicamento;
                $amed->nmedica = $request->nmedica;
                $amed->mpresen = $request->mpresen;
                $amed->mindicacion = $request->mindicacion;
                $amed->save();


              
                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    } 
    
    
    public function modificausua($idu)
    {
        if( Session::get('sesionidu')!="")
		 {
           $usuario = usuarios::where('idu','=',$idu)
                                 ->get();
            $idt = $usuario[0]->idt;
            
            $tipousu = tipos::where('idt','=',$idt)->get();

            $otrostipos = tipos::where('idt','!=',$idt)->get();
            
            return view ('vitalicia.modusuarios')
            ->with('usuario',$usuario[0])
            ->with('idt',$idt)
            ->with('tipousu',$tipousu[0]->tipo)
            ->with('otrostipos',$otrostipos);
      }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }
    
    public function guardamodificausua(Request $request)
    {
      if( Session::get('sesionidu')!="")
		 {  
            $idu =  $request->idu;
            $usuario = $request->usuario;
            $contrasena= $request->contrasena;
            $correo= $request->correo;
            $idt = $request->idt;
    
  
    

            $usu = usuarios::find($idu);
            $usu->idu = $request->idu;
            
            $usu->usuario = $request->usuario;
            $usu->contrasena =$request->contrasena;
            $usu->correo= $request->correo;
            $usu->idt= $request->idt;
            $usu->save();
            return redirect()->route('confirmacion');
       }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    
}

public function eliminausu($idu)
	{
		if( Session::get('sesionidu')!="")
		 {
            usuarios::find($idu)->delete();
			return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }
        
        public function restaurusu($idu)
	{
        if( Session::get('sesionidu')!="")
		 {
            usuarios::withTrashed()->where('idu',$idu)->restore();
            return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }
        
     public function efisicausu($idu)
	{
      if( Session::get('sesionidu')!="")
		 {
          
           usuarios::withTrashed()->where('idu',$idu)->forceDelete();
           return redirect()->route('confirmacion');
      
         }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 } 
    }

    public function getpacientes()

   {

        if( Session::get('sesionidu')!="")
		 {

          $pacientesd=\DB::select(" SELECT p.idpaciente,p.fechapaciente,
          CONCAT(d.nombre,' ',d.ap,' ',d.am)AS 'nombre',m.nombre AS medicamento,
          CONCAT(a.menu,' ',a.consumo)AS alimentacion,
          CONCAT(s.ta,' ',s.`fc`,' ',s.`fr`,' ',s.`temp`,' ',s.`spo2`,' ',s.`glucosa`,s.`protesis`)AS signos,
          g.valorg,v.act1
          FROM pacientes AS p
          INNER JOIN datos AS d  ON d.idd = p.idd
          INNER JOIN medicamentos AS m ON m.idmedicamento=p.idmedicamento
          INNER JOIN alimentaciones AS a ON a.idalimentacion=p.idalimentacion
          INNER JOIN signos AS s ON s.ids=p.ids
          INNER JOIN geriatricos AS g ON g.idgeriatricos=p.idgeriatricos
          INNER JOIN actividades AS v ON v.idactividades=p.idactividades");
                return view ('vitalicia.cpacientes')
                ->with('pacientesd',$pacientesd);
               
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
   
   
   }

   public function cmedicamento()

   {
      
        if( Session::get('sesionidu')!="")
		 {
   
       
          $medicamentosm=\DB::select("SELECT m.`idmedicamento`,m.`nombre`,m.`indicacion`,m.`presen`,m.`terminotx`,h.`tipohorario`,am.`nmedica`
          FROM medicamentos AS m
          INNER JOIN horarios AS h ON h.idh=m.`idh`
          INNER JOIN amedicamentos AS am ON am.idamedicamento=m.`idamedicamento`");
                return view ('vitalicia.cmedicamentos')
                ->with('medicamentosm',$medicamentosm);


        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
   
   }

   public function eliminamedi($idamedicamento)
	{
       
        if( Session::get('sesionidu')!="")
		 {
                amedicamentos::find($idamedicamento)->delete();
                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }
        
        public function restauramedi($idamedicamento)
	{
         if( Session::get('sesionidu')!="")
		 {
                amedicamentos::withTrashed()->where('idamedicamento',$idamedicamento)->restore();
                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }
        
     public function efisicamedi($idamedicamento)
	{
		 if( Session::get('sesionidu')!="")
		 {
                amedicamentos::withTrashed()->where('idamedicamento',$idamedicamento)->forceDelete();
                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }

    
  //jhsjfhj

  public function modifinpacientes($idnp)
  {
  if( Session::get('sesionidu')!="")
		 {
           
                       
                        $mnpacientes = npacientes::where('idnp','=',$idnp) ->get();
		                     
                        $idu = $mnpacientes[0]->idu;
		
                        $otrousario = usuarios::where('idu','=',$idu)->get(); 
                        
                        $ursu = usuarios::where('idu','!=',$idu)->get(); 

                        $idamedicamento = $mnpacientes[0]->idamedicamento;

                        $medi = amedicamentos::where('idamedicamento','=',$idamedicamento)->get(); 

                        $otromedic = amedicamentos::where('idamedicamento','!=',$idamedicamento)->get(); 
                                 
                   

		
		        return view ('vitalicia.modnpacientes')
		        ->with('mnpacientes',$mnpacientes[0])
                        ->with('idu',$idu)
                        ->with('otrousario',$otrousario[0]->usuario)
                        ->with('ursu',$ursu)
                        ->with('idamedicamento',$idamedicamento)
                        ->with('medi',$medi[0]->nmedica)
                        ->with('otromedic',$otromedic);

                      
                        

            

            
      }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }
 // aqui man  no te pases jeje 
           public function guardamodifinpacientes(Request $request)
{
 if( Session::get('sesionidu')!="")
           {
        
         

                $idnp                     = $request->idnp;
                $idu                      = $request->idu;
                $actividad1               = $request->actividad1;
                $hora1                    = $request->hora1;
                $actividad2               = $request->actividad2;
                $hora2                    = $request->hora2;
                $actividad3               = $request->actividad3;
                $hora3                    = $request->hora3;
                $menu                    = $request->menu;
                $consumo                    = $request->consumo;
                $observaciones                    = $request->observaciones;
                $horacomida                    = $request->horacomida;
                $tipocomida                    = $request->tipocomida;
                $tgeriatrico1                    = $request->tgeriatrico1;
                $tgeriatrico2                    = $request->tgeriatrico2;
                $tgeriatrico2                    = $request->tgeriatrico3;
                $ta                    = $request->ta;
                $fc                    = $request->fc;
                $fr                    = $request->fr;
                $temp                    = $request->temp;
                $spo2                    = $request->spo2;
                $glucosa                    = $request->glucosa;
                $protesis                    = $request->protesis;
                $cuidadornombre                    = $request->cuidadornombre;
                $fechacuidador                    = $request->fechacuidador;
                $idamedicamento                    = $request->idamedicamento;
                $amindicacion                    = $request->amindicacion;
                $ampresen                   = $request->ampresen;
            
            
             //Elimine la validacion, tenemos que charcarla bien           
            

                  $npacm = npacientes::find($idnp);

                  $npacm->idnp            = $request->idnp;
                  $npacm->idu             = $request->idu;
                  $npacm->actividad1      = $request->actividad1;
                  $npacm->hora1           = $request->hora1;
                  $npacm->actividad2      = $request->actividad2;
                  $npacm->hora2           = $request->hora2;
                  $npacm->actividad3      = $request->actividad3;
                  $npacm->hora3           = $request->hora3;


                  $npacm->menu                    = $request->menu;
                  $npacm->consumo                    = $request->consumo;
                  $npacm->observaciones                    = $request->observaciones;
                  $npacm->horacomida                    = $request->horacomida;
                  $npacm->tipocomida                    = $request->tipocomida;
                  $npacm->tgeriatrico1                    = $request->tgeriatrico1;
                  $npacm->tgeriatrico2                    = $request->tgeriatrico2;
                  $npacm->tgeriatrico2                    = $request->tgeriatrico3;
                  $npacm->ta                    = $request->ta;
                  $npacm->fc                    = $request->fc;
                  $npacm->fr                    = $request->fr;
                  $npacm->temp                    = $request->temp;
                  $npacm->spo2                    = $request->spo2;
                  $npacm->glucosa                    = $request->glucosa;
                  $npacm->protesis                    = $request->protesis;
                  $npacm->cuidadornombre                    = $request->cuidadornombre;
                  $npacm->fechacuidador                    = $request->fechacuidador;
                  $npacm->idamedicamento                    = $request->idamedicamento;
                  $npacm->amindicacion                    = $request->amindicacion;
                  $npacm->ampresen                    = $request->ampresen;
              
                  $npacm->save();      
                  return redirect()->route('confirmacion');
  
 }
  else
           {
                   Session::flash('error', 'Favor de loguearse antes de 
          continuar');
           return redirect()->route('login');
           }
  
}
public function modime($idamedicamento)
{
if( Session::get('sesionidu')!="")
         {
    $amedi = amedicamentos::where('idamedicamento','=',$idamedicamento)
                             ->get();
        $idamedicamento = $amedi[0]->idamedicamento;

        $idame = amedicamentos::where('idamedicamento','=',$idamedicamento)->get();

        $otromedi = amedicamentos::where('idamedicamento','!=',$idamedicamento)->get();
            
                             //return $datosm;
        return view ('vitalicia.modmedicamentos')
        ->with('amedi',$amedi[0])
        ->with('idamedicamento',$idamedicamento)
        ->with('idame',$idame[0]->mpresen)
        ->with('otromedi',$otromedi);
}
else
         {
                 Session::flash('error', 'Favor de loguearse antes de 
        continuar');
         return redirect()->route('login');
         }            
}

public function guardamodime(Request $request)
{
if( Session::get('sesionidu')!="")
         {


        $idamedicamento =  $request->idamedicamento;
        $nmedica = $request->nmedica;
        $mindicacion = $request->mindicacion;
        $mpresen = $request->mpresen;
       

        $this->validate($request,[
                'nmedica'=> ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'mindicacion'=> 'required',
                'mpresen' => ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/']
             ]);
            
            $mame = amedicamentos::find($idamedicamento);
            $mame->idamedicamento = $request->idamedicamento;
                
        $mame->nmedica = $request->nmedica;
        $mame->mindicacion =$request->mindicacion;
        $mame->mpresen= $request->mpresen;
                
                $mame->save();
                return redirect()->route('confirmacion');
}
else
         {
                 Session::flash('error', 'Favor de loguearse antes de 
        continuar');
         return redirect()->route('login');
         }

}
public function efisicapasi($idnp)
	{
       
        if( Session::get('sesionidu')!="")
		 {
                npacientes::find($idnp)->delete();
                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }
        
        public function restapaci($idnp)
	{
         if( Session::get('sesionidu')!="")
		 {
                npacientes::withTrashed()->where('idnp',$idnp)->restore();
                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }
        
     public function eliminpaci($idnp)
	{
		 if( Session::get('sesionidu')!="")
		 {
                        npacientes::withTrashed()->where('idnp',$idnp)->forceDelete();
                return redirect()->route('confirmacion');
        }
        else
		 {
			 Session::flash('error', 'Favor de loguearse antes de 
		continuar');
		 return redirect()->route('login');
		 }
    }

  
}