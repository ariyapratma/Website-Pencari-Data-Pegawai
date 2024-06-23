<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Pegawai</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            max-width: 400px;
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

        button,
        .back-button {
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover,
        .back-button:hover {
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

        .result a {
            display: inline-block;
            margin-right: 10px;
            margin-top: 10px;
            padding: 10px;
            text-decoration: none;
            color: white;
            border-radius: 6px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .excel-button {
            background-color: #28a745;
        }

        .excel-button:hover {
            background-color: #218838;
        }

        .pdf-button {
            background-color: #dc3545;
        }

        .pdf-button:hover {
            background-color: #c82333;
        }

        .result h2 {
            margin-bottom: 15px;
        }

        .hidden {
            display: none;
        }

        .back-button {
            margin-bottom: 20px;
        }

        .filter-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .filter-button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function showBackButton() {
            document.getElementById('backButton').classList.remove('hidden');
        }
    </script>
</head>

<body>
    <div class="container">
        <!-- Alert -->
        @if (session('status'))
            <div class="alert alert-{{ session('status_type') }} alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="/pegawai/search" method="GET" onsubmit="showBackButton()">
            <label for="nip">Masukkan NIP</label>
            <input type="text" id="nip" name="nip" value="{{ old('nip') }}" required>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>

        <a href="/pegawai/filter" class="filter-button btn btn-primary">Filter Data</a>

        <a id="backButton" href="/pegawai/search" class="back-button btn btn-primary hidden">Kembali</a>

        @if (isset($pegawai))
            <div class="result show">
                <h2>Hasil Pencarian Data Pegawai</h2>
                <p>NIP: {{ $pegawai->NIP }}</p>
                <p>Nama: {{ $pegawai->Nama }}</p>
                <p>Alamat: {{ $pegawai->Alamat }}</p>
                <p>Tanggal Lahir: {{ $pegawai->Tanggal_lahir }}</p>
                <p>Divisi: {{ $pegawai->divisi->Nama_divisi }}</p>
                <p>Kode Divisi: {{ $pegawai->divisi->Kode_divisi }}</p>
                <a href="/pegawai/export/excel/{{ $pegawai->NIP }}" class="excel-button btn btn-success">Export to
                    Excel</a>
                <a href="/pegawai/export/pdf/{{ $pegawai->NIP }}" class="pdf-button btn btn-danger">Export to PDF</a>
            </div>
        @endif
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
