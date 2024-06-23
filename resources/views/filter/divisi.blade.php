<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Filter Divisi Pegawai</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            text-align: center;
            transition: transform 0.2s ease;
        }

        .container:hover {
            transform: translateY(-5px);
        }

        .result {
            margin-top: 30px;
            text-align: left;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .result.show {
            opacity: 1;
        }

        .result table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .result th,
        .result td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .result th {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Hasil Filter Divisi Pegawai</h1>
        @if ($results->isNotEmpty())
            <div class="result show">
                <h2>Hasil Filter: {{ ucfirst($filter) }}</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Kode Divisi</th>
                            <th>Nama Divisi</th>
                            <th>Pegawai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $result->Kode_divisi }}</td>
                                <td>{{ $result->Nama_divisi }}</td>
                                <td>
                                    @foreach ($result->pegawai as $pegawai)
                                        {{ $pegawai->Nama }}<br>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="result show">
                <table>
                    <thead>
                        <tr>
                            <th>Kode Divisi</th>
                            <th>Nama Divisi</th>
                            <th>Pegawai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" style="color: red">Data Tidak Ditemukan Atau Kosong.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        <br>
        <a href="{{ route('ExportDivisiPegawai') }}" class="btn btn-success">Export to Excel</a>
        <a href="/pegawai/filter" class="btn btn-primary">Kembali</a>
    </div>
</body>

</html>
