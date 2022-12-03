<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\DB;
use Auth;
use Mail;

class PasswordController extends Controller
{
    public function password (){
        return view ('login');
    }
    public function newpassword ($id){
        $usu1 = Usuarios::find($id);
        return view ('newpassword')
        ->with(['usu1' => $usu1]);
    }

       public function validar2(Request $request){
        
        $email = $request->input('email');

        $consulta = Usuarios::where('email', '=', $email)
        ->get();
            
       
            if(count($consulta)==0){ 
             $status = 'El correo no existe !!';
             return redirect()->route('password')->with(compact('status'));
             
         }    
         else{
             //----------------- Crea la session ------------------------
             $request-> session()->put('session_id', $consulta[0]->id);
             $request-> session()->put('session_name', $consulta[0]->nombre);
             $request-> session()->put('session_tipo', $consulta[0]->tipo);
             $session_id =$request->session()->get('session_id');
             $session_nombre =$request->session()->get('session_name');
             $session_tipo =$request->session()->get('session_tipo');
  
             if ($session_tipo == 2){
         
                $id = session('session_id');
      
                $usu1 = Usuarios::find($id);
                 
                    $data = array(
                        'ejemplo' => 'Reactor ADS',
                        'email' => $request->get('email'),
                        'asunto' => 'Cambio de Contraseña', 
                        'usu1' => $usu1,
                
                    );
            
                    Mail::send('mail2', $data, function($message) use($data){
                           $message->from('adair_coron@hotmail.com','Reactor ADS');
                           $message->to($data['email']);
                           $message->subject($data['asunto']); 
                           
                    });
                    if(Mail::failures()){
                        //return response()->fail('Error!! Intente más tarde')
                        //return view("error");
                        $status2 = 'Ha ocurrido un error al enviar el mensaje !!';
                        return redirect()->route('password')->with(compact('status2'));
                    }
                    else{
                        //return response()->json('Si, se a enviado el mensaje')
                
                
                        $status3 = 'Se te ha enviado un correo para tu cambio de contraseña !!';
                        return redirect()->route("password")->with(compact('status3'));
                       
                        
                    }
               
             }
             else{ 
                 
                $id = session('session_id');
      
                $usu1 = Usuarios::find($id);
                 
                    $data = array(
                        'ejemplo' => 'Reactor ADS',
                        'email' => $request->get('email'),
                        'asunto' => 'Cambio de Contraseña', 
                        'usu1' => $usu1,
                
                    );
            
                    Mail::send('mail2', $data, function($message) use($data){
                           $message->from('adair_coron@hotmail.com','Reactor ADS');
                           $message->to($data['email']);
                           $message->subject($data['asunto']); 
                           
                    });
                    if(Mail::failures()){
                        //return response()->fail('Error!! Intente más tarde')
                        //return view("error");
                        $status2 = 'Ha ocurrido un error al enviar el mensaje !!';
                        return redirect()->route('password')->with(compact('status2'));
                    }
                    else{
                        //return response()->json('Si, se a enviado el mensaje')
                
                
                        $status3 = 'Se te ha enviado un correo para tu cambio de contraseña !!';
                        return redirect()->route("password")->with(compact('status3'));
                       
                        
                    }
                 }   
             
             
 
 }
    }

    public function reset(Usuarios $id, Request $request){
       
        $query = Usuarios::find($id->id);

        $query->password = $request->password;

        $query -> save();
        $status3 = 'Tu contraseña se ha reestablecido';
        return redirect()->route("login")->with(compact('status3'));
    }
}
