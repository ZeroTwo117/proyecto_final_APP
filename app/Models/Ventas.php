<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    protected $table = "tb_ventas" ;
    protected $primarykey = "id";
    protected $fillable = [
        'id_producto',
        'id_usuario',
        'cantidad',
        'precio',
        'adquirido',
       
    ];
}
