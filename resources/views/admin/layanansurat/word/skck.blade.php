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
                <p style="margin:0; font-size: 9pt; font-style: italic;">Alamat: Jln. Ciloa No. 09 Banjarsari Bayongbong Garut 44162</p>
            </td>
        </tr>
    </table>

    <hr style="height: 3px; color: #000000; margin-bottom: 15px;" />

    {{-- JUDUL SURAT --}}
    <div style="text-align: center; margin-bottom: 15px;">
        <p style="margin:0;"><u><b>SURAT PENGANTAR PERMOHONAN SKCK</b></u></p>
        <p style="margin:0; font-size: 11pt;">Nomor: {{ $pengajuan->nomor_surat ?? '333.1/..../VIII/Ds.-2021' }}</p>
    </div>

    {{-- ISI SURAT --}}
    <p style="text-align: justify; margin-bottom: 10px;">Yang bertanda tangan di bawah ini Kepala Desa Banjarsari Kecamatan Bayongbong Kabupaten Garut, dengan ini menerangkan bahwa :</p>

    {{-- TABEL BIODATA --}}
    <table border="0" style="border-color: #FFFFFF;">
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Nama</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;"><b>{{ strtoupper($pengajuan->data['nama'] ?? '-') }}</b></td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Tempat/Tanggal Lahir</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['ttl'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Jenis Kelamin</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['jenis_kelamin'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Pekerjaan</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['pekerjaan'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Status</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['status'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Agama</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['agama'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">NIK</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ $pengajuan->data['nik'] ?? '-' }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Kewarganegaraan</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['kewarganegaraan'] ?? 'INDONESIA') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Alamat</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['alamat'] ?? '-') }}</td>
        </tr>
    </table>

    <p style="text-align: justify; margin-top: 10px; margin-bottom: 10px;">
        Yang tersebut di atas berdasarkan keterangan dari Ketua RT/RW setempat dan menurut data yang ada pada kami, adalah benar-benar warga kami, yang datang ke Kantor Desa kami memohon Surat Keterangan <b><i>SKCK</i></b> untuk melengkapi persyaratan :
    </p>

    <p style="text-align: center; font-weight: bold; margin: 10px 0; text-transform: uppercase;">
        <i>"{{ $pengajuan->data['keperluan'] ?? 'PEMBUATAN SKCK' }}"</i>
    </p>

    <p style="text-align: justify; margin-top: 10px; margin-bottom: 15px;">
        Demikian surat keterangan ini kami buat, agar yang berkepentingan mengetahui dan untuk dipergunakan sebagaimana mestinya.
    </p>

    <br />

    {{-- TANDA TANGAN --}}
    <table border="0" style="width: 100%; border-color: #FFFFFF;">
        <tr>
            <td width="250"></td>
            <td width="250" style="text-align: center;">
                <p style="margin:0;">Banjarsari, {{ date('d F Y') }}</p>
                <p style="margin:0;">a.n. Kepala Desa Banjarsari</p>
                <p style="margin:0;">Sekretaris Desa</p>

                <br /><br /><br />
                <p style="margin:0;"><u><b>{{ $penandatangan ?? 'RESTY FITRIANA' }}</b></u></p>
            </td>
        </tr>
    </table>

</div>
