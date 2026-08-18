<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>{{ $title ?? 'Surat Keterangan Telah Menikah' }}</title>
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
            margin-bottom: 20px;
        }
        .title-container u {
            font-weight: bold;
            font-size: 12pt;
            text-transform: uppercase;
        }
        .nomor-surat {
            margin-top: 2px;
            text-transform: uppercase;
        }

        /* Konten */
        .content {
            text-align: justify;
            margin: 0 20px;
        }

        /* Tabel Biodata */
        .table-data {
            margin-left: 40px; 
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .table-data td {
            vertical-align: top;
            padding: 2px 0;
        }
        .label {
            width: 200px; /* Sedikit lebih lebar untuk penomoran 1. Nama */
        }
        .colon {
            width: 20px;
            text-align: center;
        }

        /* Tanda Tangan */
        .signature-container {
            margin-top: 30px;
            width: 100%;
            display: table;
        }
        .signature-box {
            display: table-cell;
            width: 50%;
        }
        .signature-right {
            display: table-cell;
            width: 50%;
            text-align: center;
            vertical-align: top;
        }
        .signature-name {
            margin-top: 70px;
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
        <u>SURAT KETERANGAN TELAH MENIKAH</u>
        <div class="nomor-surat">NOMOR : {{ $pengajuan->nomor_surat ?? '474.2/......./II/DS-'.date('Y') }}</div>
    </div>

    {{-- ISI SURAT --}}
    <div class="content">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Banjarsari Kecamatan Bayongbong Kabupaten Garut, dengan ini menerangkan bahwa :</p>

        {{-- DATA SUAMI --}}
        <table class="table-data">
            <tr>
                <td class="label">1. Nama</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['nama'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">&nbsp;&nbsp;&nbsp; Tempat/Tanggal Lahir</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['ttl_suami'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">&nbsp;&nbsp;&nbsp; Jenis Kelamin</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">LAKI-LAKI</td>
            </tr>
            <tr>
                <td class="label">&nbsp;&nbsp;&nbsp; Agama</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['agama_suami'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">&nbsp;&nbsp;&nbsp; Kewarganegaraan</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['kewarganegaraan_suami'] ?? 'INDONESIA' }}</td>
            </tr>
            <tr>
                <td class="label">&nbsp;&nbsp;&nbsp; Alamat</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">
                    {{ $pengajuan->data['alamat_suami'] ?? '-' }}
                </td>
            </tr>
        </table>

        {{-- DATA ISTRI --}}
        <table class="table-data" style="margin-top: 10px;">
            <tr>
                <td class="label">2. Nama</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['nama_istri'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">&nbsp;&nbsp;&nbsp; Tempat/Tanggal Lahir</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['ttl_istri'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">&nbsp;&nbsp;&nbsp; Jenis Kelamin</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">PEREMPUAN</td>
            </tr>
            <tr>
                <td class="label">&nbsp;&nbsp;&nbsp; Agama</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['agama_istri'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">&nbsp;&nbsp;&nbsp; Kewarganegaraan</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['kewarganegaraan_istri'] ?? 'INDONESIA' }}</td>
            </tr>
            <tr>
                <td class="label">&nbsp;&nbsp;&nbsp; Alamat</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">
                    {{ $pengajuan->data['alamat_istri'] ?? '-' }}
                </td>
            </tr>
        </table>

        <p>
            Yang tersebut diatas berdasarkan keterangan dari petugas pencatat pernikahan dan menurut data yang ada pada kami, adalah benar-benar <b><i>TELAH MENIKAH Pada TAHUN {{ $pengajuan->data['tahun_nikah'] ?? '....' }}</i></b> di {{ strtoupper($pengajuan->data['tempat_nikah'] ?? '.......') }}.
        </p>

        <p>
            Demikian surat keterangan ini dibuat, agar yang berkepentingan mengetahui dan memakluminya.
        </p>
    </div>

    {{-- TANDA TANGAN --}}
    <div class="signature-container">
        <div class="signature-box">
            {{-- Space kosong --}}
        </div>
        <div class="signature-right">
            {{-- Contoh format A.n (Atas Nama) seperti di gambar --}}
            @if(isset($jabatan_penandatangan) && $jabatan_penandatangan != 'Kepala Desa')
                <div>A.n.</div>
                <div>Banjarsari, {{ date('d F Y') }}</div>
                <div style="margin-bottom: 2px;">Kepala Desa Banjarsari</div>
                <div style="margin-bottom: 5px;">{{ $jabatan_penandatangan }}</div> {{-- Misal: KaPem / Kasi Pemerintahan --}}
            @else
                <div>Banjarsari, {{ date('d F Y') }}</div>
                <div style="margin-bottom: 5px;">Kepala Desa Banjarsari</div>
            @endif
            
            <div class="signature-name">
                {{ $penandatangan ?? 'EDI SOPANDI' }}
            </div>
        </div>
    </div>

</div>

</body>
</html>