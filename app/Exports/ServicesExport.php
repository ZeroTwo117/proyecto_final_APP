<?php

namespace App\Exports;

use App\User;
use App\Productos;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServicesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Nombre',
            'Foto',
            'Descripción',
            'Precio',
            'Fecha Agregación',
            'Fecha Modificación',
        ];
    }
    public function collection()
    {
         $serv = DB::table('tb_productos')->select('id','nombre','foto','descripcion','precio','created_at', 'updated_at')->where('id_tabla',2)->get();
         return $serv;

    }
}