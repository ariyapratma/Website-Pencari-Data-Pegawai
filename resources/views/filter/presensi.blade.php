<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Filter Presensi Pegawai</title>
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
            margin-right: 10px;
        }

        .excel-button:hover {
            background-color: #218838;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Hasil Filter Presensi Pegawai</h1>

        <div class="result">
            <h2>Hasil Filter: {{ ucfirst($filter) }}</h2>

            <table>
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Jumlah Presensi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($results) > 0)
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $result->NIP }}</td>
                                <td>{{ $result->presences }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2" style="color: red">Data Tidak Ditemukan Atau Kosong.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            <form action="/pegawai/filter/presensi/export/excel" method="GET">
                <input type="hidden" name="month" value="{{ request('month') }}">
                <input type="hidden" name="year" value="{{ request('year') }}">
                <button type="submit" class="excel-button">Export to Excel</button>
                <a href="/pegawai/filter" class="btn-primary">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>
