<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class controller4 extends Controller
{
    public function contactanos(Request $request){
           
        $data = array(
            'ejemplo' => 'Reactor ADS',
            'nombre' => $request->get('nombre'), 
            'a_paterno' => $request->get('a_paterno'), 
            'a_materno' => $request->get('a_materno'), 
            'correo' => $request->get('correo'),
            'asunto' => $request->get('asunto'), 
            'mensaje' => $request->get('mensaje'),
        );

        Mail::send('mail', $data, function($message) use($data){
               $message->from('adair_coron@hotmail.com','Reactor ADS');
               $message->to('adair_coron@hotmail.com');
               $message->subject($data['asunto']);  

               
        });
        Mail::send('mail5', $data, function($message) use($data){
            $message->from('adair_coron@hotmail.com','Reactor ADS');
            $message->to($data['correo']);
            $message->subject($data['asunto']);  

            
     });
        if(Mail::failures()){
            //return response()->fail('Error!! Intente más tarde')
            //return view("error");
            $status2 = 'Ha ocurrido un error al enviar el mensaje !!';
            return redirect()->route('home2')->with(compact('status2'));
        }
        else{
            //return response()->json('Si, se a enviado el mensaje')
            $status = 'Tu mensaje se ha enviado de manera exitosa !!';
            return redirect()->route("home2")->with(compact('status'));
           
            
        }
    }
}
