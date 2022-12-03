<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class Usuarios extends Model
{
    use HasFactory, EncryptedAttribute;
    protected $table = "tb_usuarios" ;
    protected $primarykey = "id";
    protected $fillable = [
        'nombre',
        'app',
        'fn',
        'email',
        'gen',
        'tel',
        'direccion',
        'password',
        'tipo',
        'aviso_privacidad'
      
    ];

    protected $encryptable = [
        'password'
    ];

    
}
