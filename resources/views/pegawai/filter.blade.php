<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Pegawai</title>
    <style>
        /* Add your styles here */
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

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        select {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
        }

        button {
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
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

        .result p {
            margin: 8px 0;
            color: #333;
        }

        .result table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .result table,
        .result th,
        .result td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .result th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="color: #007bff;">Filter Pegawai</h1>

        <!-- Filter for Presensi -->
        <form action="/pegawai/filter/presensi" method="GET">
            <label for="month">Bulan:</label>
            <select id="month" name="month">
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <label for="year">Tahun:</label>
            <select id="year" name="year">
                @for ($i = date('Y'); $i >= 2015; $i--)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <button type="submit">Filter Presensi</button>
        </form>

        <!-- Filter for Divisi -->
        <form action="/pegawai/filter/divisi" method="GET">
            <button type="submit">Tampilkan Jumlah Pegawai per Divisi</button>
        </form>

        <!-- Filter for Alamat -->
        <form action="/pegawai/filter/alamat" method="GET">
            <button type="submit">Tampilkan Pegawai yang Beralamat di Bogor</button>
        </form>

        <!-- Display Results -->
        @if (isset($results))
            <div class="result show">
                <h2>Hasil Filter: {{ ucfirst($filter) }}</h2>
                @if ($filter == 'presensi')
                    <table>
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Jumlah Presensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $result->NIP }}</td>
                                    <td>{{ $result->presences }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif ($filter == 'divisi')
                    <table>
                        <thead>
                            <tr>
                                <th>Kode Divisi</th>
                                <th>Jumlah Pegawai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $result->Kode_Divisi }}</td>
                                    <td>{{ $result->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif ($filter == 'alamat')
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
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $result->NIP }}</td>
                                    <td>{{ $result->Nama }}</td>
                                    <td>{{ $result->Alamat }}</td>
                                    <td>{{ $result->Tanggal_lahir }}</td>
                                    <td>{{ $result->divisi->Nama_divisi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        @endif
    </div>
</body>

</html>
