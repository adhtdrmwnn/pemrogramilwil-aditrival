<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Dosen</title>
    <style>
        body {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 80px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Daftar Dosen</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIDN</th>
                <th>Nama Dosen</th>
                <th>Jenjang Pendidikan</th>
                <th>Bidang Keilmuan</th>
                <th>Tanggal Mulai Tugas</th>
                <th>Foto Dosen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dosens as $key => $dosen)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $dosen->nidn }}</td>
                <td>{{ $dosen->nama_dosen }}</td>
                <td>{{ $dosen->jenjang_pendidikan }}</td>
                <td>{{ $dosen->bidang_keilmuan }}</td>
                <td>{{ $dosen->tgl_mulai_tugas }}</td>
                <td>
                    <img src="{{ public_path('storage/' . $dosen->foto_dosen) }}" alt="Foto Dosen">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
