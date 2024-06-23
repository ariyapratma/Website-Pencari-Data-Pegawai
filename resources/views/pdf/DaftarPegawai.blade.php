<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            padding: 0;
        }

        .table-borderless>tbody>tr>td,
        .table-borderless>tbody>tr>th,
        .table-borderless>tfoot>tr>td,
        .table-borderless>tfoot>tr>th,
        .table-borderless>thead>tr>td,
        .table-borderless>thead>tr>th {
            border: none;
        }

        @page {
            margin-left: 1.5cm;
            margin-right: 1.5cm;
            margin-bottom: 0.2cm;
        }

        /* Styling for the tables */
        table {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: none;
            /* Menghilangkan border selain bottom border */
            border-bottom: 1px solid #ddd;
            /* Border bottom */
        }

        th {
            background-color: #0056b3;
            color: white;
        }

        /* Additional styles for header and footer */
        .header {
            text-align: right;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
            margin-bottom: -20px;
            /* Adjust margin-bottom to your liking */
        }

        .address {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11pt;
        }

        .title {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16pt;
            margin-bottom: -10px;
            /* Adjust margin-bottom to your liking */
        }

        .footer {
            text-align: center;
            margin-top: -20px;
            /* Adjust margin-top to your liking */
        }
    </style>
</head>

<body>
    <table>
        <tbody>
            <tr>
                <td colspan="3" class="header">
                    <b> FRM/DPD/UJN/002 </b>
                </td>
            </tr>
            <tr>
                <td width="15%"></td>
                <td width="70%" class="address">
                    <b> DATA PEGAWAI </b><br>
                    <b> INSTITUT PERTANIAN BOGOR </b><br>
                    <b> SEKOLAH VOKASI </b><br>
                    <b> Kampus IPB Cilibende, Jl. Kumbang No.14 Bogor 16151 </b><br>
                    <b> Telp. (0251) 8329101, 8329051, Fax. (0251) 8348007 </b>
                </td>
                <td width="15%"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <hr>
                    <p class="title">
                        <b>DATA PEGAWAI</b>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <th width="20%">NIP</th>
                <td>{{ $pegawai->NIP }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $pegawai->Nama }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $pegawai->Alamat }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $pegawai->Tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Divisi</th>
                <td>{{ $pegawai->Kode_Divisi }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <hr>
    </div>
</body>

</html>
