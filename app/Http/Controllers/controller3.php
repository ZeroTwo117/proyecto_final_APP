<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\Tablas;
use App\Models\Usuarios;
use App\Models\Ventas;
use Illuminate\Support\Facades\Crypt;
use Mail;
use Auth;
use App\Http\Requests\ValidaRequest;

class controller3 extends Controller
{
    public function consulta01(Request $request){
        $id = session('session_id');
      
        $usu1 = Usuarios::find($id);
        
        if( is_null($usu1)){
            $status5 = 'Antes debes iniciar sesión!!';
            return redirect()->route('login')->with(compact('status5'));
        } 
        $tablas = Tablas::all(); 

        $productos = Productos::Nombre($request->get('nombre'))
        ->Tipo($request->get('tipo'))
        ->orderBy('id')
        ->paginate(5);
        
        return view("admin")
        ->with(['tablas' => $tablas])
        ->with(['usu1' => $usu1])
        ->with(['productos' => $productos]);
    }

    public function guardar(ValidaRequest $request){
        $file = $request->file('foto'); 
        $file2 = $request->file('foto2'); 
        $file3 = $request->file('foto3'); 
        $file4 = $request->file('foto4'); 
    
        //---Obtenemos el nombre del archivo (file)
        $img = $file->getClientOriginalName();
        $img2 = $file2->getClientOriginalName();
        $img3 = $file3->getClientOriginalName();
        $img4 = $file4->getClientOriginalName();
       // $img = $request->$file('img')->getClientOriginalName();     2da opcion
    
       //-- Creamos y obtenemos fecha y hora para el nombre del Archivo (file)
       $ldate = date('Ymd_His_');
       $img2 = $ldate . $img;
       $img3 = $ldate . $img2;
       $img4 = $ldate . $img3;
       $img5 = $ldate . $img4;
    
       //----Indicamos donde queremos almacenar el archivo (file) y con que nombre----
       \Storage::disk('local')->put($img2, \File::get($file));
       \Storage::disk('local')->put($img3, \File::get($file2));
       \Storage::disk('local')->put($img4, \File::get($file3));
       \Storage::disk('local')->put($img5, \File::get($file4));
    
       $usu = Productos::create(array(
        'nombre'=>$request->input('nombre'),
        'precio'=>$request->input('precio'),
        'descripcion'=>$request->input('descripcion'),
        'id_tabla'=>$request->input('id_tabla'),
        'foto'=>$img2,
        'foto2'=>$img3,
        'foto3'=>$img4,
        'foto4'=>$img5,
    
       ));
             
            return redirect()->route('admin');
    
        }

    public function editar (Productos $id){
        $id2 = session('session_id');
      
        $usu1 = Usuarios::find($id2);
        
        
        if( is_null($usu1)){
            $status5 = 'Antes debes iniciar sesión!!';
            return redirect()->route('login')->with(compact('status5'));
        } 
            return view ('editar')
            ->with(['usu1' => $usu1])
            ->with(['pro' => $id]);  
        }

    public function guardar_edicion(Productos $id, Request $request){
            /*
    
            $id->update(
                $request->all();
                $request->only('nombre','fn','gen','matricula','direccion','email','pass','foto','id_grupo')
            );
            */
    
            //--------------- foto/archivo -------------
            if($request->file('foto') != ''){
                $file = $request->file('foto');
                $foto = $file->getClientOriginalName();
                $date = date('Ymd_His_');
                $foto22 = $date . $foto;
                \Storage::disk('local')->put($foto22, \File::get($file));
            }
            else{
                $foto22 =  $request->foto22;
            }
            if($request->file('foto2') != ''){
                $file2 = $request->file('foto2');
                $foto2 = $file2->getClientOriginalName();
                $date = date('Ymd_His_');
                $foto23 = $date . $foto2;
                \Storage::disk('local')->put($foto23, \File::get($file2));
            }
            else{
                $foto23 =  $request->foto23;
            }
            if($request->file('foto3') != ''){
                $file3 = $request->file('foto3');
                $foto3 = $file3->getClientOriginalName();
                $date = date('Ymd_His_');
                $foto24 = $date . $foto3;
                \Storage::disk('local')->put($foto24, \File::get($file3));
            }
            else{
                $foto24 =  $request->foto24;
            }
            if($request->file('foto4') != ''){
                $file4 = $request->file('foto4');
                $foto4 = $file4->getClientOriginalName();
                $date = date('Ymd_His_');
                $foto25 = $date . $foto4;
                \Storage::disk('local')->put($foto25, \File::get($file4));
            }
            else{
                $foto25 =  $request->foto25;
            }
            $query = Productos::find($id->id);
    
            $query->nombre = $request->nombre;
            $query->descripcion = $request->descripcion;
            $query->precio = $request->precio;
            $query->id_tabla = $request->id_tabla;
            $query->foto = $foto22;
            $query->foto2 = $foto23;
            $query->foto3 = $foto24;
            $query->foto4 = $foto25;
    
            $query -> save();
    
            return redirect()->route("admin", ['id' => $id->id]);
        }
    
        public function borrar($id){
            $id = Productos::find($id);
                $id->delete();
            return redirect()->route('admin');
    }

    //------------------ Guardar Registro de Usuario ---------------

public function save(Request $request){

$email = $request->input('email');

$consulta = Usuarios::where('email', '=', $email)
->get();

   if(count($consulta)!=0){
    $alerta = 'El correo ' . $email . ' ya existe';
    return redirect()->route('login')->with(compact('alerta'));
   }
   else{

   $usu = Usuarios::create(array(
    'nombre'=>$request->input('nombre'),
    'fn'=>$request->input('fn'),
    'app'=>$request->input('app'),
    'direccion'=>$request->input('direccion'),
    'gen'=>$request->input('gen'), 
    'email'=>$request->input('email'),
    'password' =>$request->input('password'),
    'tipo'=>$request->input('tipo'),
    'tel'=>$request->input('tel'),
    'aviso_privacidad'=>$request->input('aviso_privacidad'),
   ));

   

   $data = array(
    'ejemplo' => 'Reactor ADS',
    'nombre' => $request->get('nombre'), 
    'app' => $request->get('app'), 
    'email' => $request->get('email'),
    'asunto' => 'Registro Exitoso', 
);

Mail::send('mail3', $data, function($message) use($data){
    $message->from('adair_coron@hotmail.com','Reactor ADS');
    $message->to($data['email']);
    $message->subject($data['asunto']);  

    
});
        $status3 = 'Registro Exitoso !! Ahora puedes iniciar sesión';
        return redirect()->route('login')->with(compact('status3'));

    }
}
    //------------------Adquirir Producto ---------------

public function adquirir(Request $request){

    $prod = Ventas::create(array(
    $precio = $request->input('preciooriginal') * $request->input('cantidad'),
     'id_usuario'=>$request->input('id_usuario'),
     'id_producto'=>$request->input('id_producto'),
     'cantidad'=>$request->input('cantidad'),
     'precio'=>$precio,
    ));
          
    $status = 'Se ha agregado a tus productos !!';
    return redirect()->route('productos2')->with(compact('status'));;
 
     }

       //------------------Adquirir Servicio ---------------

public function adquirir2(Request $request){

    $prod = Ventas::create(array(
    $precio = $request->input('preciooriginal') * $request->input('cantidad'),
     'id_usuario'=>$request->input('id_usuario'),
     'id_producto'=>$request->input('id_producto'),
     'cantidad'=>$request->input('cantidad'),
     'precio'=>$precio,
    ));

    $status = 'Se ha agregado a tus productos !!';
    return redirect()->route('servicios2')->with(compact('status'));;
 
     }
    
//--------------------- Borrar Producto Usuario ------------

     public function borrar2($id){
        $id = Ventas::find($id);
            $id->delete();
        return redirect()->route('perfil');
}

//------------------------ Eliminar Cuenta de Usuario ----------------------

public function eliminarcuenta(Request $request, $id){
    //------ Enviar Correo de cuenta eliminada a usuario --------
    $data = array(
        'ejemplo' => 'Reactor ADS',
        'email' => $request->get('email'),
        'asunto' => 'Cuenta Eliminada', 

    );

    Mail::send('mail4', $data, function($message) use($data){
           $message->from('adair_coron@hotmail.com','Reactor ADS');
           $message->to($data['email']);
           $message->subject($data['asunto']); 
           
    });
    //------- Borrar Cuenta ---------
    $id = Usuarios::find($id);
    $id->delete();

    return redirect()->route("login");
}

//---------- pruebas de css, forrmato de correos --------------
public function mail3(){
$ejemplo = 'Reactor ADS';
$nombre = 'adair';
$email = 'adair@gmail.com';
$app = 'Corona';
    return view('mail3')
    ->with(['ejemplo'=>$ejemplo])
    ->with(['nombre'=>$nombre])
    ->with(['email'=>$email])
    ->with(['app'=>$app]);
}

public function mail4(){
    $ejemplo = 'Reactor ADS';
   
    $email = 'adair@gmail.com';
  
        return view('mail4')
        ->with(['ejemplo'=>$ejemplo])
        
        ->with(['email'=>$email]);
        
    }

    public function mail(){
        $ejemplo = 'Reactor ADS';
        $nombre = 'adair';
        $correo = 'adair@gmail.com';
        $a_paterno = 'Corona';
        $a_materno = 'Domingo';
        $mensaje = 'hola';
        $asunto = 'hola';
            return view('mail')
            ->with(['ejemplo'=>$ejemplo])
            ->with(['nombre'=>$nombre])
            ->with(['correo'=>$correo])
            ->with(['a_paterno'=>$a_paterno])
            ->with(['a_materno'=>$a_materno])
            ->with(['asunto'=>$asunto])
            ->with(['mensaje'=>$mensaje]);

        }




}
