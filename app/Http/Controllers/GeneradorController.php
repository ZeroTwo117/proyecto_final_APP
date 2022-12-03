<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Ventas;
use App\Models\Productos;
use App\Models\Usuarios;
use PDF;
use App\Exports\ProductsExport;
use App\Exports\ServicesExport;
use App\Exports\ExcelExport;
use Maatwebsite\Excel\Facades\Excel;

class GeneradorController extends Controller
{
    public function imprimir(){
        $today = Carbon::now()->format('d/m/Y');
        $pdf = \PDF::loadView('pdf', compact('today')); 
        return $pdf->download('pdf.pdf');
      }
    public function pdf(){
       $id = session('session_id');
        $usu1 = Usuarios::find($id);
        
        if( is_null($usu1)){
            abort(404);
        } 
   
        $prod = Productos::all();
        $today = Carbon::now()->format('d/m/Y');
         
        $pdf = \PDF::loadView('tablas/tabla01', compact('prod','usu1','today'));
        return $pdf->download('Productos.pdf');
      }

    public function exportar(){
        return Excel::download(new ExcelExport, 'Productos.xlsx');
    }

//--------- pruebas ----------
    public function excel(){
      $prod = Productos::all();
      return view('excel')
      ->with(['prod'=>$prod]); 
    }
}
