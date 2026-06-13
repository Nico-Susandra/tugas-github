<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Sewa Aditya Music</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nama Penyewa</th>
                <th>Nama Alat Musik</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Harga Sewa</th>
                <th>Keterangan</th>
             
            </tr>
        </thead>
        <tbody>
            @foreach($music as $item) 
            <tr>
                <td>{{ $item->nama_penyewa }}</td>
                <td>{{ $item->nama_alat_musik }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>{{ $item->harga_sewa }}</td>
                <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>