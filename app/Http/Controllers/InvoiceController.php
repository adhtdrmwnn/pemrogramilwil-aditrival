<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function downloadPDF()
    {

        ini_set('max_execution_time',120);
        $dosens = Dosen::all();
        // $data = [
        //     'title' => 'Russ & Co',
        //     'date' => date('m/d/y'),
        //     'orders' => $orders 
        // ];

        $pdf = PDF::loadView('dosens.pdf', compact('dosens')); // Memuat view PDF
        return $pdf->download('invoice.pdf'); // Mengunduh file PDF
    }
}
