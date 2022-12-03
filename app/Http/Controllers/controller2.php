<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ESolution\DBEncryption\Traits\EncryptedAttribute;
use App\Models\Usuarios;
use Illuminate\Support\Facades\DB;
use Auth;

class controller2 extends Controller
{
    public function validar(Request $request){
        
        $email = $request->input('email');
        $password = $request->input('password');
 

        $consulta = Usuarios::where('email', '=', $email)
        ->whereEncrypted('password', '=', $password)
        ->get();
            
       
            if(count($consulta)==0){ 
             $status = 'Los datos introducidos son incorrectos !!';
             return redirect()->route('login')->with(compact('status'));
             
         }    
         else{
             //----------------- Crea la session ------------------------
             $request-> session()->put('session_id', $consulta[0]->id);
             $request-> session()->put('session_name', $consulta[0]->nombre);
             $request-> session()->put('session_tipo', $consulta[0]->tipo);
             $session_id =$request->session()->get('session_id');
             $session_nombre =$request->session()->get('session_name');
             $session_tipo =$request->session()->get('session_tipo');
  
             if ($session_tipo == 1){
         
                //return view('perfil_admin');
                 return redirect()->route("admin");
             }
             else{ 
                 
              
                  //return view('perfil_user');
                  $status = 'Bienvenido ';
                     return redirect()->route("perfil")->with(compact('status'));
                 }   
             
             
 
 }
    }
 public function logout(Request $request){
         //---------------Destruye la session------------
         $request-> session()->forget('session_id');
         $request-> session()->forget('session_name');
         $request-> session()->forget('session_tipo');
        
         return view('login');
 
     }
}
