<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Filter Alamat Pegawai</title>
    <style>
        /* Gaya umum */
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

        /* Gaya khusus untuk hasil filter */
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

        .mt-3 {
            margin-top: 15px;
        }

        .excel-button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .excel-button:hover {
            background-color: #218838;
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Hasil Filter Alamat Pegawai</h1>

        @if (isset($results))
            <div class="result show">
                <h2>Hasil Filter: {{ ucfirst($filter) }}</h2>
                <table>
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Divisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($results) > 0)
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $result->NIP }}</td>
                                    <td>{{ $result->Nama }}</td>
                                    <td>{{ $result->Alamat }}</td>
                                    <td>{{ $result->Tanggal_lahir }}</td>
                                    <td>{{ $result->divisi->Nama_divisi }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" style="color: red">Data Tidak Ditemukan Atau Kosong.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        @endif
        <div class="mt-3">
            <form action="{{ route('ExportAlamatPegawai') }}" method="GET">
                <button type="submit" class="excel-button">Export to Excel</button>
                <a href="/pegawai/filter" class="btn btn-primary">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>
