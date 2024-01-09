<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmailWeb(Request $request){

        $objOverskull = new \stdClass();

        $objOverskull->nombres = $request->nombres;

        $objOverskull->apellidos = $request->apellidos;

        $objOverskull->numerotelefono = $request->numerotelefono;

        $objOverskull->email = $request->email;

        $objOverskull->mensaje = $request->mensaje;

        $subject = "REGISTRO DE LA WEB";

        $view = "email.registraweb";
        
        try{

            $mailnew = Mail::to($request->email)->send(new TestMail($objOverskull, $subject, $view));

            return response()->json(["valor"=>true,"msn"=>"Mensaje Enviado Correctamente","data"=>$mailnew],200);

        }catch(Exception $e){

            return response()->json(["valor"=>false,"msn"=>"Ocurrió un error inesperado. Intente nuevamente","data"=>$e],200);
        }

    }
}
