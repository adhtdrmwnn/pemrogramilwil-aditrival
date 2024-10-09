<?php

namespace App\Exports;

use App\Models\Dosen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DosensExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Ambil koleksi data dosen dari database
     */
    public function collection()
    {
        return Dosen::all(); // Mengambil semua data dosen
    }

    /**
     * Tentukan kolom yang akan diekspor
     */
    public function map($dosen): array
    {
        return [
            $dosen->id,
            $dosen->nidn,
            $dosen->nama_dosen,
            $dosen->tgl_mulai_tugas,
            $dosen->jenjang_pendidikan,
            $dosen->bidang_keilmuan,
        ];
    }

    /**
     * Tentukan header untuk setiap kolom di file Excel
     */
    public function headings(): array
    {
        return [
            'No',
            'NIDN',
            'Nama Dosen',
            'Tanggal Mulai Tugas',
            'Jenjang Pendidikan',
            'Bidang Keilmuan',
        ];
    }
}
