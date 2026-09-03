<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>{{ $title ?? 'Surat Izin Orang Tua' }}</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 0;
        }

        /* Wrapper halaman */
        .page-wrapper {
            margin: 0 35px;
        }

        /* Kop Surat */
        .header {
            text-align: center;
            position: relative;
        }
        .header h3 {
            margin: 0;
            font-size: 12pt;
            text-transform: uppercase;
            font-weight: normal;
        }
        .header h2 {
            margin: 0;
            font-size: 16pt;
            text-transform: uppercase;
            font-weight: bold;
        }
        .header p {
            margin: 0;
            font-size: 10pt;
            font-style: normal; 
        }

        .line-container {
            margin-top: 10px;
            margin-bottom: 20px;
            border-bottom: 5px double black;
        }

        /* Judul */
        .title-container {
            text-align: center;
            margin-bottom: 25px;
        }
        .title-container u {
            font-weight: bold;
            font-size: 14pt; /* Sedikit lebih besar sesuai contoh */
            text-transform: uppercase;
        }
        
        /* Konten */
        .content {
            text-align: justify;
            margin: 0 10px;
        }

        /* Tabel Data */
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }
        .table-data td {
            vertical-align: top;
            padding: 2px 0;
        }
        .label {
            width: 180px;
        }
        .colon {
            width: 20px;
            text-align: center;
        }

        /* Tanda Tangan */
        .signature-container {
            margin-top: 50px;
            width: 100%;
            display: table;
        }
        .signature-box {
            display: table-cell;
            width: 40%;
        }
        .signature-right {
            display: table-cell;
            width: 60%; /* Lebar area tanda tangan kanan */
            text-align: center;
            vertical-align: top;
            padding-left: 50px;
        }
        .signature-name {
            margin-top: 75px;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
        }
        
        /* Logo */
        .logo-container {
            position: absolute;
            left: 0;
            top: 0;
        }
        .logo-container img {
            width: 80px;
            height: auto;
        }
    </style>
</head>
<body>

<div class="page-wrapper">

    {{-- KOP SURAT --}}
    <div class="header">
        <div class="logo-container">
            <img src="{{ public_path('logosurat.png') }}" alt="Logo Desa">
        </div>

        <h3><b>PEMERINTAH KABUPATEN GARUT</b></h3>
        <h3><b>KECAMATAN BAYONGBONG</b></h3>
        <h2>DESA BANJARSARI</h2>
        <p><b><i>Alamat: Jln. Ciloa No. 09 Banjarsari Bayongbong Garut 44162</i></b></p>
    </div>

    <div class="line-container"></div>

    {{-- JUDUL SURAT --}}
    <div class="title-container">
        <u>SURAT IZIN ORANG TUA</u>
    </div>

    {{-- ISI SURAT --}}
    <div class="content">
        <p>Yang bertanda tangan dibawah ini saya :</p>

        {{-- DATA ORANG TUA --}}
        <table class="table-data">
            <tr>
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['nama'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Tempat, Tgl Lahir</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['ttl_ortu'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['pekerjaan_ortu'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">
                    {{ $pengajuan->data['alamat_ortu'] ?? '-' }}
                </td>
            </tr>
        </table>

        <p>Selaku orang tua dari :</p>

        {{-- DATA ANAK --}}
        <table class="table-data">
            <tr>
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['nama_anak'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Tempat, Tgl Lahir</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['ttl_anak'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['pekerjaan_anak'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">
                    {{ $pengajuan->data['alamat_anak'] ?? '-' }}
                </td>
            </tr>
        </table>

        {{-- PERNYATAAN --}}
        <p>
            Selanjutnya dengan ini, saya mengijinkan anak saya untuk {{ $pengajuan->data['keperluan'] ?? 'bekerja' }}.
        </p>

        <p>
            Demikian surat pernyataan ini saya buat dengan sebenarnya. Untuk dipergunakan sebagaimana mestinya.
        </p>
    </div>

    {{-- TANDA TANGAN --}}
    <div class="signature-container">
        <div class="signature-box">
            {{-- Kosong --}}
        </div>
        <div class="signature-right">
            <div>Garut, {{ date('d F Y') }}</div>
            <div style="margin-bottom: 5px;">Yang Membuat Pernyataan</div>
            
            <div class="signature-name">
                {{ $pengajuan->data['nama'] ?? '......................' }}
            </div>
        </div>
    </div>

</div>

</body>
</html>