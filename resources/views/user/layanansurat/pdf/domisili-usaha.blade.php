<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>{{ $title ?? 'Surat Keterangan Domisili Usaha' }}</title>
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
        <u>SURAT KETERANGAN DOMISILI USAHA</u>
        <div class="nomor-surat">Nomor: {{ $pengajuan->nomor_surat ?? '400.10.2.2/....../Ds.Banjarsari' }}</div>
    </div>

    {{-- ISI SURAT --}}
    <div class="content">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Banjarsari Kecamatan Bayongbong Kabupaten Garut, dengan ini menerangkan bahwa :</p>

        {{-- TABEL DATA DIRI --}}
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

        <p>Pada saat ini benar mempunyai usaha sebagaimana berikut ini :</p>

        {{-- TABEL DATA USAHA --}}
        <table class="table-data">
            <tr>
                <td class="label">Jenis Usaha</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['jenis_usaha'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Pemilik</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">{{ $pengajuan->data['pemilik'] ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat Usaha</td>
                <td class="colon">:</td>
                <td style="text-transform: uppercase;">
                    {{ $pengajuan->data['alamat_usaha'] ?? '-' }}
                </td>
            </tr>
        </table>

        <p>
            Demikian surat keterangan ini kami buat, agar yang berkepentingan mengetahui dan untuk dipergunakan sebagaimana mestinya.
        </p>
    </div>

    {{-- TANDA TANGAN --}}
    <div class="signature-container">
        <div class="signature-box">
            {{-- Space kosong --}}
        </div>
        <div class="signature-right">
            <div>Banjarsari, {{ date('d F Y') }}</div>
            
            {{-- Logika a.n jika penandatangan bukan Kades langsung --}}
            @if(isset($jabatan_penandatangan) && $jabatan_penandatangan != 'Kepala Desa')
                <div style="margin-bottom: 2px;">a.n Kepala Desa Banjarsari</div>
                <div style="margin-bottom: 5px;">{{ $jabatan_penandatangan }}</div>
            @else
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