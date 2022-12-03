<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Usuarios;
use App\Models\Ventas;

class controller1 extends Controller
{

    public function home (Request $request){
        //mostrar los ultimos cuatro registros de la tabla galeria
        $prod = Productos::latest()
        ->take(4)
        ->get();
       
        return view('home')
        ->with(['prod' => $prod]);
    }

    public function home2 (Request $request){
        $id = session('session_id');
      
        $usu1 = Usuarios::find($id);
        
        if( is_null($usu1)){
            $status5 = 'Antes debes iniciar sesión!!';
            return redirect()->route('login')->with(compact('status5'));
        } 
        //mostrar los ultimos cuatro registros de la tabla galeria
        $prod = Productos::latest()
        ->take(4)
        ->get();
       
        return view('sesion/home2')
        ->with(['usu1' => $usu1])
        ->with(['prod' => $prod]);
    }

    public function login (){
        return view ('login');
    }

    public function admin (){
        return view ('admin');
    }

    public function productos(Request $request){
        $prod = Productos::where('id_tabla','1') //tomar solo los productos con id_tabla igual a dos
        ->orderBy('id')
        ->paginate(12);
    
    return view("productos")
    ->with(['prod'=> $prod]);
    
       }   

    public function productos2(Request $request){
        $id = session('session_id');
      
        $usu1 = Usuarios::find($id);
        
        
        if( is_null($usu1)){
            $status5 = 'Antes debes iniciar sesión!!';
            return redirect()->route('login')->with(compact('status5'));
        } 
        $prod = Productos::where('id_tabla','1') //tomar solo los productos con id_tabla igual a dos
        ->orderBy('id')
        ->paginate(12);
    
    return view("sesion/productos2")
    ->with(['usu1' => $usu1])
    ->with(['prod'=> $prod]);
    
    
       }  

    public function servicios(Request $request){
        $prod = Productos::where('id_tabla','2') //tomar solo los productos con id_tabla igual a dos
        ->orderBy('id')
        ->paginate(12);
        
    return view("servicios")
    ->with(['prod'=> $prod]);
    
       }   

    public function servicios2(Request $request){
        $id = session('session_id');
      
        $usu1 = Usuarios::find($id);
        
        if( is_null($usu1)){
            $status5 = 'Antes debes iniciar sesión!!';
            return redirect()->route('login')->with(compact('status5'));
        } 
        $prod = Productos::where('id_tabla','2') //tomar solo los productos con id_tabla igual a dos
        ->orderBy('id')
        ->paginate(12);
    
    return view("sesion/servicios2")
    ->with(['usu1' => $usu1])
    ->with(['prod'=> $prod]);
    
       }   

       public function perfil (Request $request){
        $id = session('session_id');
        $ventas = Ventas::where('id_usuario', $id)
        ->orderBy('id')
        ->paginate(12);
        $prod = Productos::Buscar($request->get('buscar'))
        ->get(); 
        
      
        $usu1 = Usuarios::find($id);
        
        if( is_null($usu1)){
            $status5 = 'Antes debes iniciar sesión!!';
            return redirect()->route('login')->with(compact('status5'));
        } 
        return view ('sesion/perfil')
        ->with(['prod' => $prod])
        ->with(['ventas' => $ventas])
        ->with(['usu1' => $usu1]);
    }
}
