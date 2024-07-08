<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    public function enviarCorreo($destinatario)
    {
        $detalles = [
            'titulo' => 'Bienvenido al Maravilloso Mundo de la Programacion',
            'cuerpo' => 'Hola este es un correo de Pruebas, para que lo agarres de ejemplo para tu proyecto desintegrador, recuerda estudiar o preguntarle al profe los terminos que no entiendas, adicional a esto recuerda que hay que investigar los conceptos que no entiendas'
        ];

        Mail::send('mail.saludo_mail', ['detalles' => $detalles], function($message) use ($destinatario) {
            $message->to($destinatario)
                    ->subject('Aqui va el asunto del Correo');
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });

        return response()->json(['status' => "Correo enviado"]);
    }
}
