<div style="font-family: 'Times New Roman', serif; font-size: 12pt; line-height: 1.15;">

    {{-- KOP SURAT --}}
    <table border="0" style="width: 100%; border-color: #FFFFFF;">
        <tr>
            <td width="100" style="text-align: center; vertical-align: middle;">
                <img src="{{ public_path('logosurat.png') }}" width="80" height="95" />
            </td>
            <td width="400" style="text-align: center; vertical-align: middle;">
                <p style="margin:0; font-size: 12pt;"><b>PEMERINTAH KABUPATEN GARUT</b></p>
                <p style="margin:0; font-size: 12pt;"><b>KECAMATAN BAYONGBONG</b></p>
                <p style="margin:0; font-size: 15pt;"><b>DESA BANJARSARI</b></p>
                <p style="margin:0; font-size: 9pt; font-style: italic;"><b>Alamat: Jln. Ciloa No. 09 Banjarsari Bayongbong Garut 44162</b></p>
            </td>
        </tr>
    </table>

    <hr style="height: 3px; color: #000000; margin-bottom: 15px;" />

    {{-- JUDUL SURAT --}}
    <div style="text-align: center; margin-bottom: 15px;">
        <p style="margin:0;"><u><b>SURAT KETERANGAN TELAH MENIKAH</b></u></p>
        <p style="margin:0; font-size: 11pt; text-transform: uppercase;">NOMOR : {{ $pengajuan->nomor_surat ?? '474.2/......./II/DS-'.date('Y') }}</p>
    </div>

    <br />

    {{-- ISI SURAT --}}
    <p style="text-align: justify; margin-bottom: 10px;">Yang bertanda tangan di bawah ini Kepala Desa Banjarsari Kecamatan Bayongbong Kabupaten Garut, dengan ini menerangkan bahwa :</p>

    {{-- DATA SUAMI --}}
    <table border="0" style="border-color: #FFFFFF;">
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">1. Nama</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['nama'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">&nbsp;&nbsp;&nbsp; Tempat/Tanggal Lahir</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['ttl_suami'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">&nbsp;&nbsp;&nbsp; Jenis Kelamin</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">LAKI-LAKI</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">&nbsp;&nbsp;&nbsp; Agama</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['agama_suami'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">&nbsp;&nbsp;&nbsp; Kewarganegaraan</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['kewarganegaraan_suami'] ?? 'INDONESIA') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">&nbsp;&nbsp;&nbsp; Alamat</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['alamat_suami'] ?? '-') }}</td>
        </tr>
    </table>

    {{-- DATA ISTRI --}}
    <table border="0" style="border-color: #FFFFFF; margin-top: 10px;">
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">2. Nama</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['nama_istri'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">&nbsp;&nbsp;&nbsp; Tempat/Tanggal Lahir</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['ttl_istri'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">&nbsp;&nbsp;&nbsp; Jenis Kelamin</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">PEREMPUAN</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">&nbsp;&nbsp;&nbsp; Agama</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['agama_istri'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">&nbsp;&nbsp;&nbsp; Kewarganegaraan</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['kewarganegaraan_istri'] ?? 'INDONESIA') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">&nbsp;&nbsp;&nbsp; Alamat</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['alamat_istri'] ?? '-') }}</td>
        </tr>
    </table>

    <p style="text-align: justify; margin-top: 10px; margin-bottom: 10px;">Yang tersebut diatas berdasarkan keterangan dari petugas pencatat pernikahan dan menurut data yang ada pada kami, adalah benar-benar <b><i>TELAH MENIKAH Pada TAHUN {{ $pengajuan->data['tahun_nikah'] ?? '....' }}</i></b> di {{ strtoupper($pengajuan->data['tempat_nikah'] ?? '.......') }}.
    </p>

    <p style="text-align: justify; margin-top: 10px; margin-bottom: 15px;">Demikian surat keterangan ini dibuat, agar yang berkepentingan mengetahui dan memakluminya.
    </p>

    <br />

    {{-- TANDA TANGAN --}}
    <table border="0" style="width: 100%; border-color: #FFFFFF;">
        <tr>
            <td width="250"></td>
            <td width="250" style="text-align: center;">
                @if(isset($jabatan_penandatangan) && $jabatan_penandatangan != 'Kepala Desa')
                    <p style="margin:0;">A.n.</p>
                    <p style="margin:0;">Banjarsari, {{ date('d F Y') }}</p>
                    <p style="margin:0;">Kepala Desa Banjarsari</p>
                    <p style="margin:0;">{{ $jabatan_penandatangan }}</p>
                @else
                    <p style="margin:0;">Banjarsari, {{ date('d F Y') }}</p>
                    <p style="margin:0;">Kepala Desa Banjarsari</p>
                @endif

                <br /><br /><br />
                <p style="margin:0;"><u><b>{{ $penandatangan ?? 'EDI SOPIANDI' }}</b></u></p>
            </td>
        </tr>
    </table>

</div>
