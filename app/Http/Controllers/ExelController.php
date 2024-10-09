<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DosensExport;


use Illuminate\Http\Request;

class ExelController extends Controller
{
    public function exportExcel()
{
    return Excel::download(new DosensExport, 'data-dosen.xlsx');
}

}
