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
    <div style="text-align: center; margin-bottom: 20px;">
        <p style="margin:0; font-size: 14pt;"><u><b>SURAT IZIN ORANG TUA</b></u></p>
    </div>

    <br />

    {{-- ISI SURAT --}}
    <p style="text-align: justify; margin-bottom: 10px;">Yang bertanda tangan dibawah ini saya :</p>

    {{-- DATA ORANG TUA --}}
    <table border="0" style="border-color: #FFFFFF;">
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Nama</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['nama'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Tempat, Tgl Lahir</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['ttl_ortu'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Pekerjaan</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['pekerjaan_ortu'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Alamat</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['alamat_ortu'] ?? '-') }}</td>
        </tr>
    </table>

    <p style="text-align: justify; margin-top: 10px; margin-bottom: 5px;">Selaku orang tua dari :</p>

    {{-- DATA ANAK --}}
    <table border="0" style="border-color: #FFFFFF;">
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Nama</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['nama_anak'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Tempat, Tgl Lahir</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['ttl_anak'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Pekerjaan</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['pekerjaan_anak'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Alamat</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['alamat_anak'] ?? '-') }}</td>
        </tr>
    </table>

    {{-- PERNYATAAN --}}
    <p style="text-align: justify; margin-top: 10px; margin-bottom: 10px;">Selanjutnya dengan ini, saya mengijinkan anak saya untuk {{ $pengajuan->data['keperluan'] ?? 'bekerja' }}.
    </p>

    <p style="text-align: justify; margin-bottom: 15px;">Demikian surat pernyataan ini saya buat dengan sebenarnya. Untuk dipergunakan sebagaimana mestinya.
    </p>

    <br />

    {{-- TANDA TANGAN --}}
    <table border="0" style="width: 100%; border-color: #FFFFFF;">
        <tr>
            <td width="250"></td>
            <td width="250" style="text-align: center;">
                <p style="margin:0;">Garut, {{ date('d F Y') }}</p>
                <p style="margin:0;">Yang Membuat Pernyataan</p>

                <br /><br /><br />
                <p style="margin:0;"><u><b>{{ strtoupper($pengajuan->data['nama'] ?? '......................') }}</b></u></p>
            </td>
        </tr>
    </table>

</div>
