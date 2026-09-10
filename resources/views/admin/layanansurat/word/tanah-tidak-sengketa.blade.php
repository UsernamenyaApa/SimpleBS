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
        <p style="margin:0;"><u><b>SURAT KETERANGAN TIDAK DALAM SENGKETA DAN BELUM DISERTIFIKATKAN</b></u></p>
        <p style="margin:0; font-size: 11pt;">Nomor: {{ $pengajuan->nomor_surat ?? '594/....../X/Ds.-'.date('Y') }}</p>
    </div>

    <br />

    {{-- ISI SURAT --}}
    <p style="text-align: justify; margin-bottom: 10px;">Yang bertanda tangan di bawah ini Kepala Desa Banjarsari Kecamatan Bayongbong Kabupaten Garut, dengan ini menerangkan bahwa Tanah milik dari :</p>

    {{-- TABEL DATA PEMILIK --}}
    <table border="0" style="border-color: #FFFFFF;">
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Nama Pemilik</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['nama'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Umur</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ $pengajuan->data['umur'] ?? '-' }} Tahun</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Pekerjaan</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['pekerjaan'] ?? '-') }}</td>
        </tr>
        <tr>
            <td width="200" style="padding: 1px 0 1px 20px;">Alamat</td>
            <td width="15" style="text-align: center; padding: 1px 0;">:</td>
            <td width="300" style="padding: 1px 0;">{{ strtoupper($pengajuan->data['alamat'] ?? '-') }}</td>
        </tr>
    </table>

    <p style="text-align: justify; margin-top: 10px; margin-bottom: 10px;">Tanah milik saudara {{ isset($pengajuan->data['nama']) ? strtoupper($pengajuan->data['nama']) : '......................' }} sampai saat ini tidak dalam sengketa dan belum pernah disertifikatkan.
    </p>

    <p style="text-align: justify; margin-top: 10px; margin-bottom: 15px;">Demikian surat keterangan ini kami buat, agar yang berkepentingan mengetahui dan untuk dipergunakan sebagaimana mestinya.
    </p>

    <br />

    {{-- TANDA TANGAN --}}
    <table border="0" style="width: 100%; border-color: #FFFFFF;">
        <tr>
            <td width="250"></td>
            <td width="250" style="text-align: center;">
                <p style="margin:0;">Banjarsari, {{ date('d F Y') }}</p>

                @if(isset($jabatan_penandatangan) && $jabatan_penandatangan != 'Kepala Desa')
                    <p style="margin:0;">a.n Kepala Desa Banjarsari</p>
                    <p style="margin:0;">{{ $jabatan_penandatangan }}</p>
                @else
                    <p style="margin:0;">Kepala Desa Banjarsari</p>
                @endif

                <br /><br /><br />
                <p style="margin:0;"><u><b>{{ $penandatangan ?? 'EDI SOPIANDI' }}</b></u></p>
            </td>
        </tr>
    </table>

</div>
