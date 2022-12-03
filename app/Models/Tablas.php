<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablas extends Model
{
    use HasFactory;
    protected $table = "tb_tablas" ;
    //protected $primarykey = "id";
    protected $fillable = [
        'nombre',
        'clave',
    ];
}
