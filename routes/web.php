<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\InvoiceController;
use App\Exports\DosensExport;
use App\Http\Controllers\ExelController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Resource routes for Dosen
Route::resource('dosens', DosenController::class);

// Route::get('/dosens/export-pdf', [DosenController::class, 'exportPDF'])->name('dosens.export-pdf');
Route::get('/download-pdf', [InvoiceController::class, 'downloadPDF'])->name('download.pdf');

// Route::get('/dosens/export-excel', [ExelController::class, 'exportExcel'])->name('dosens.export-excel');
Route::get('/dosens/export-excel', function() {
    return Excel::download(new DosensExport, 'data-dosen.xlsx');
})->name('dosens.export-excel');