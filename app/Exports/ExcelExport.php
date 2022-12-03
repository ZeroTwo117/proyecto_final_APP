<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Productos;
use Illuminate\Contracts\View\View;

class ExcelExport implements FromView, ShouldAutoSize
{

    public function view(): View
    {
        return view('tablas.tabla02', [
            'prod' => Productos::all()
        ]);
    }
}
