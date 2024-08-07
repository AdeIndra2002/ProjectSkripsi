<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Surat Pengadaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/logokalsel.png') }}">

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="{{ asset('/dist/js/normalize.min.css') }}">
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="{{ asset('/assets/css/paper.css') }}">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0mm;
            /* this affects the margin in the printer settings */
        }

    </style>
    <style>
        body {
            font-family: Calibri, sans-serif;
        }

        .sheet {
            padding: 15mm;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 18px;
            text-decoration: underline;
            margin-top: 20px;
        }

        .table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            font: normal 13px Arial, sans-serif;
            width: 100%;
            margin-top: 20px;
        }

        .table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 10px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
        }

        .table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
            text-shadow: 1px 1px 1px #fff;
        }

        .no-data {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #FF0000;
        }

    </style>
</head>

<body class="A4 portrait">
    <section class="sheet">
        <!-- Header/Kop Surat -->
        <div class="header">
            <!-- Logo -->
            <img src="{{ asset('images/logo-bawaslu.png') }}" alt="Logo" style="width: 90px; height: auto; float: left; margin-right: 30px;">
            <!-- Informasi Organisasi -->
            <div style="float: left;">
                <h2 style="margin: 0; font-size: 18px;"><b>Badan Pengawas Pemilihan Umum Provinsi Kalimantan Selatan</b></h2>
                <p style="margin: 5px 0;">Jl. RE Martadinata No.3, Kertak Baru Ilir, Kec. Banjarmasin Tengah,</p>
                <p style="margin: 5px 0;">Kota Banjarmasin, Kalimantan Selatan 70231</p>
                <p style="margin: 5px 0;">Telepon: (0511) 6726 437 | Email: set.kalsel@gmail.go.id</p>
            </div>
            <!-- Clearfix untuk mengatasi float -->
            <div style="clear: both;"></div>
            <br>
            <hr style="border-top: 3px solid black; margin-top: 10px; margin-bottom: 10px;">
        </div>

        <h1 style="text-align: center;">LAPORAN PENGADAAN DIVISI</h1>
        @if ($view_pengajuan->isEmpty())
        <div class="no-data">
            <p>Data pengadaan tidak tersedia.</p>
        </div>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Kode Pengadaan</th>
                    <th class="text-center align-middle">Nama Pengadaan</th>
                    <th class="text-center align-middle">Tanggal Pengadaan</th>
                    <th class="text-center align-middle">Nama & Jumlah Barang</th>
                    <th class="text-center align-middle">Divisi Pengadaan</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($view_pengajuan as $pengajuan)
                <tr>
                    <td class="text-center align-middle">{{ $no }}</td>
                    <td class="text-center align-middle">KP-{{ str_pad($pengajuan->id, 4, '0', STR_PAD_LEFT) }}</td>
                    <td class="text-center align-middle">{{ $pengajuan->namaPengajuan }}</td>
                    <td class="text-center align-middle">{{ $pengajuan->tanggalPengajuan }}</td>

                    <td class="px-4 py-3">
                        @foreach ($pengajuan->barangs as $barang)
                        {{ $barang->barang }} - {{ $barang->pivot->jumlah }}
                        @if (!$loop->last)
                        <br>
                        @endif
                        @endforeach
                    </td>

                    <td class="text-center align-middle">{{ $pengajuan->divisi->divisi }} - {{ $pengajuan->divisi->kepalaDivisi }}</td>
                </tr>
                @php $no++; @endphp
                @endforeach
            </tbody>
        </table>
        @endif

        <div style="margin-top: 20px;">
            <div style="float: right; width: 40%;">
                <p>
                    Banjarmasin,
                    @php
                    // Array mapping English month names to Indonesian
                    $monthNames = [
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember',
                    ];
                    // Get current date and time
                    $currentDate = date('d F Y');
                    // Translate day and month names to Indonesian
                    foreach ($monthNames as $english => $indonesian) {
                    $currentDate = str_replace($english, $indonesian, $currentDate);
                    }
                    echo $currentDate;
                    @endphp
                    <br>Mengetahui
                </p>
                <br>
                <br>
                <p>
                    <b><u>Aries Mardiono, M.Sos</u></b>
                </p>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        window.print();

    </script>
</body>

</html>
