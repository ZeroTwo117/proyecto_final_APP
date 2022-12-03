<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $table = "tb_productos" ;
    //protected $primarykey = "id";
  protected $fillable = [
      'foto',
      'foto2',
      'foto3',
      'foto4',
      'nombre',
      'precio',
      'descripcion',
      'id_tabla'
     
  ];

  public function scopeBuscar($query, $buscar){
    if(trim($buscar) != ""){
        $query->where(\DB::raw('nombre'), "LIKE", "%".$buscar."%");
    }
}

public function scopeNombre($query, $nombre){
    if(trim($nombre) != ''){
        //$query->where('nombre',$nombre);
       // $query->where(\DB::raw("CONCAT(nombre, '', app, '', app)"), $nombre);
        $query->where(\DB::raw('nombre'), "LIKE", "%$nombre%");
    }
}

public function scopeTipo($query, $tipo){
    if($tipo != ''){
        $query->where('id_tabla', $tipo);
       // $query->where(\DB::raw("CONCAT(nombre, '', app)"), $nombre);
       // $query->where('nombre',$nombre);
    }
}
}
