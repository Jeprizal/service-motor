<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <style>
        /* Style untuk header */
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .header h2 {
            margin: 0;
        }
        .header p {
            margin: 5px 0;
        }

        .card {
            width: 18rem;
            margin: auto;
        }
        .card-body {
            text-align: center;
        }
        .card-body th{
            text-align: left;
            padding: 10px;
            white-space: nowrap;
        }
        .card-body td {
            text-align: justify;
            padding: 15px;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Detail Transaksi</h2>
        <p>Service Sepeda Motor</p>
        <p>Jl. Raya Pemuda No. 123, Kota Motoria, Provinsi Sentosa</p>
        <p>No. Telp: 1234567890</p>
    </div>
    <hr style="padding-top: 0;">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Nama:</th>
                        <td>{{ $transaksi->nama }}</td>
                    </tr>
                    <tr>
                        <th>Harga:</th>
                        <td>Rp. {{ $transaksi->harga }}</td>
                    </tr>
                    <tr>
                        <th>Status Pemesanan:</th>
                        <td>{{ $transaksi->status }}</td>
                    </tr>
                    <tr>
                        <th>Status Pembayaran:</th>
                        <td>{{ $transaksi->pembayaran }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Pemesanan:</th>
                        <td>{{ $transaksi->created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
