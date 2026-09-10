<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 font-sans">
        <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8 sm:p-10 text-center">
            <div class="mx-auto w-20 h-20 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-4xl"><i class="fas fa-check"></i></div>
            <h1 class="mt-6 text-3xl font-bold text-gray-900">Pengajuan berhasil dibuat</h1>
            <p class="mt-3 text-gray-500">Data <strong class="text-gray-700">{{ data_get($pengajuan->data, 'nama', 'pemohon') }}</strong> sudah masuk ke antrean admin. Silakan unduh dokumen untuk dicetak.</p>
            @php($pdfAvailable = view()->exists("user.layanansurat.pdf.{$pengajuan->slug}"))
            @php($wordAvailable = view()->exists("admin.layanansurat.word.{$pengajuan->slug}"))
            @if($pdfAvailable || $wordAvailable)
                <div class="mt-7 grid sm:grid-cols-2 gap-3">
                    @if($pdfAvailable)<a href="{{ route('machine.download.pdf', $pengajuan) }}" class="py-3 px-4 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold"><i class="fas fa-file-pdf mr-2"></i>Download PDF</a>@endif
                    @if($wordAvailable)<a href="{{ route('machine.download.word', $pengajuan) }}" class="py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold"><i class="fas fa-file-word mr-2"></i>Download Word</a>@endif
                </div>
            @else
                <p class="mt-6 p-4 rounded-xl bg-yellow-50 text-sm text-yellow-800">Template PDF dan Word untuk jenis surat ini belum tersedia.</p>
            @endif
            <div class="mt-5 flex flex-col sm:flex-row gap-3 justify-center"><a href="{{ route('machine.home') }}" class="px-5 py-3 rounded-xl border border-gray-300 text-gray-700 font-semibold hover:bg-gray-50">Buat Pengajuan Baru</a><a href="{{ route('machine.history') }}" class="px-5 py-3 rounded-xl text-green-700 font-semibold hover:bg-green-50">Lihat History</a></div>
        </div>
    </div>
</x-app-layout>
