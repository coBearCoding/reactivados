<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\CarnetVacunacion;
use Illuminate\Support\Facades\Mail;

class InicioController extends Controller
{



    public function index(){
        return view('reactivacion.index');
    }

    public function registro(){
        return view('reactivacion.registro');
    }

    //AJAX DATA METHODS

    public function login(Request $request){
        $ced_alum = $request->ced_alum;

        if($ced_alum == null){
            return response('', 403);
        }

        $reactivados = DB::select('EXEC SP_WEB_REACTIVADOS_CONSULTA ?', [
            $ced_alum
        ]);

        if($reactivados[0]->APLICA == 0){
            $porcentaje = $reactivados[0]->PORCENTAJE;

            return response()
            ->json(array('porcentaje'=>$porcentaje))
            ->setStatusCode(402);
            
        }else if($reactivados[0]->APLICA == 1){
            $request->session()->put('ced_alum', $ced_alum);
            return response('', 200);
        }else if($reactivados[0]->APLICA == 2){
            return response('', 403);
        }else{
            return response('', 400);
        }
    }

    public function thirtyPercent(Request $request){
        $ced_alum = $request->session()->get('ced_alum');

        $alumnos = DB::connection('sqlsrv_ACADE')
        ->table('alumnos')
        ->where('ced_alum', $ced_alum)
        ->get();

        $cod_alum = $alumnos[0]->cod_alum;
        $email = $alumnos[0]->e_mail;
        $nombre = $alumnos[0]->nom_alum;


        $reactivados_insert = DB::select('SET NOCOUNT ON; EXEC FINAN..SP_WEB_REACTIVADOS_GUARDAR ?,?', [
                $ced_alum,
                30
            ]);


        if($reactivados_insert[0]->RESPUESTA == 1){

            $nota_credito = $reactivados_insert[0]->NOTA_CREDITO;
            $modalidad = $reactivados_insert[0]->MENSAJE;
            $porcentaje = 30;
                
            /* CORREO ENVIADO ESTUDIANTE*/
            Mail::to($email)
            ->send(new CarnetVacunacion($nombre, $porcentaje, $cod_alum, $nota_credito, $modalidad));
            return response('', 201);
        }else{
            return response('', 400);
        }
    }

    public function saveCarnet(Request $request){
        $ced_alum = $request->session()->get('ced_alum');
        $carnetVacuna = $request->file('carnetVacunacion');


        $alumnos = DB::connection('sqlsrv_ACADE')
        ->table('alumnos')
        ->where('ced_alum', $ced_alum)
        ->get();

        $cod_alum = $alumnos[0]->cod_alum;
        $email = $alumnos[0]->e_mail;
        $nombre = $alumnos[0]->nom_alum;

        $url_origen = $carnetVacuna->path();
        $extension = $carnetVacuna->getClientOriginalExtension();

        $abrevia_doc = 'VACU';

        $archivo_copia_destino = env("ROUTE_SAVE_FILE");
        $nombre_doc = $abrevia_doc.'_'.$ced_alum.'.'.$extension;
        $guardarDoc = move_uploaded_file($url_origen, $archivo_copia_destino.'/'.$nombre_doc);

        if($guardarDoc){
            $documento_insert = DB::select('SET NOCOUNT ON; EXEC ACADE..sp_web_alum_docu_reg ?,?,?,?', [
                $cod_alum,
                $abrevia_doc,
                $nombre_doc,
                'web_user'
            ]);
            
            $reactivados_insert = DB::select('SET NOCOUNT ON; EXEC FINAN..SP_WEB_REACTIVADOS_GUARDAR ?,?', [
                $ced_alum,
                60
            ]);

            if($reactivados_insert[0]->RESPUESTA == 1){

                $nota_credito = $reactivados_insert[0]->NOTA_CREDITO;
                $modalidad = $reactivados_insert[0]->MENSAJE;
                $porcentaje = 60;
                
                /* CORREO ENVIADO ESTUDIANTE*/
                Mail::to($email)
                ->send(new CarnetVacunacion($nombre, $porcentaje, $cod_alum, $nota_credito, $modalidad));
                return response('', 201);
            }else{
                return response('', 400);
            }

        }else{
            return response('', 400);
        }
    }
}
