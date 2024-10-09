<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DosensExport;


class DosenController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $dosens = Dosen::where('nama_dosen', 'like', '%' . $search . '%')
            ->orWhere('nidn', 'like', '%' . $search . '%')
            ->paginate(10);
        return view('dosens.index', compact('dosens', 'search'));
    }

    public function create()
    {
        return view('dosens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens,nidn',
            'nama_dosen' => 'required',
            'tgl_mulai_tugas' => 'required|date',
            'jenjang_pendidikan' => 'required',
            'bidang_keilmuan' => 'required',
            'foto_dosen' => 'nullable|image',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_dosen')) {
            $fotoPath = $request->file('foto_dosen')->store('fotos', 'public');
        }

        Dosen::create([
            'nidn' => $request->nidn,
            'nama_dosen' => $request->nama_dosen,
            'tgl_mulai_tugas' => $request->tgl_mulai_tugas,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'bidang_keilmuan' => $request->bidang_keilmuan,
            'foto_dosen' => $fotoPath,
        ]);

        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil ditambahkan');
    }

    public function edit(Dosen $dosen)
    {
        return view('dosens.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
{
    // Validasi input
    $request->validate([
        'nidn' => 'required|string|max:10',
        'nama_dosen' => 'required|string|max:255',
        'tgl_mulai_tugas' => 'required|date',
        'jenjang_pendidikan' => 'required|string',
        'bidang_keilmuan' => 'required|string',
        'foto_dosen' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // File foto opsional
    ]);

    // Update data dosen
    $dosen->update($request->all());

    // Jika ada file foto yang di-upload
    if ($request->hasFile('foto_dosen')) {
        $filePath = $request->file('foto_dosen')->store('foto_dosen', 'public');
        $dosen->update(['foto_dosen' => $filePath]);
    }

    return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil diperbarui!');
}

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil dihapus');
    }

    public function show(Dosen $dosen)
{
    return view('dosens.show', compact('dosen'));
}

// public function exportExcel()
// {
//     return Excel::download(new DosensExport, 'data-dosen.xlsx');
// }

// public function exportPDF()
// {
//     $dosens = Dosen::all(); // Mengambil semua data dosen
//     $pdf = PDF::loadView('dosens.pdf', compact('dosens')); // Memuat view PDF
//     return $pdf->download('data-dosen.pdf'); // Mengunduh file PDF
// }
}
