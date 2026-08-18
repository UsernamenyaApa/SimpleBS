<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>{{ $title ?? 'Surat Keterangan Yatim' }}</title>
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
            margin-top: 10px;
            margin-bottom: 10px;
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
        .signature-space {
            height: 0px;
        }
        .signature-box {
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
        <u>SURAT KETERANGAN YATIM</u>
        <div class="nomor-surat">NOMOR : {{ $pengajuan->nomor_surat ?? '474.2/....../ VII /DS-'.date('Y') }}</div>
    </div>

    {{-- ISI SURAT --}}
    <div class="content">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Banjarsari Kecamatan Bayongbong Kabupaten Garut, dengan ini menerangkan bahwa :</p>

        <table class="table-data">
            <tr>
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['nama'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Tempat/Tanggal Lahir</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['ttl'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['jenis_kelamin'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['pekerjaan'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Status</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['status'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Agama</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['agama'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td>{{ $pengajuan->data['nik'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Kewarganegaraan</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['kewarganegaraan'] ?? 'INDONESIA' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">
                    {{ $pengajuan->data['alamat'] ?? '-' }}
                </td>
            </tr>
        </table>

        <p>
            Yang tersebut diatas berdasarkan keterangan dari RT/RW setempat dan menurut data yang ada pada kantor kami, adalah benar-benar warga kami.
        </p>
    </div>

    {{-- TANDA TANGAN --}}
    <div class="signature-container">
        <!-- Tanda Tangan Kiri (Pemohon) -->
        <div class="signature-box">
            <div style="margin-bottom: 30px;">Pemohon</div>
            <div class="signature-space"></div>
            <div class="signature-name">
                {{-- Mengambil nama pemohon dari akun user yang login / mengajukan --}}
                {{ isset($pengajuan->user->name) ? strtoupper($pengajuan->user->name) : '.........................' }}
            </div>
        </div>

        {{-- margin-top: 70px;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase; --}}
        <!-- Tanda Tangan Kanan (Kades) -->
        <div class="signature-box">
            <div>Banjarsari, {{ date('d F Y') }}</div>
            
            @if(isset($jabatan_penandatangan) && $jabatan_penandatangan != 'Kepala Desa')
                <div style="margin-bottom: 2px;">a.n Kepala Desa Banjarsari</div>
                <div style="margin-bottom: 5px;">{{ $jabatan_penandatangan }}</div>
            @else
                <div style="margin-bottom: 5px;">Kepala Desa Banjarsari</div>
            @endif
            <div class="signature-space"></div>
            <div class="signature-name">
                {{ $penandatangan ?? 'EDI SOPANDI' }}
            </div>
        </div>
    </div>

</div>

</body>
</html>