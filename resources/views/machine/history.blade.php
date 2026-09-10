<x-app-layout>
    <div class="max-w-7xl mx-auto space-y-8 font-sans">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">History Pengajuan</h1>
                <p class="mt-1 text-gray-500">Riwayat pengajuan yang dibuat melalui mesin pelayanan mandiri.</p>
            </div>
            <a href="{{ route('machine.home') }}" class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-[#00C07F] text-white rounded-xl font-semibold hover:bg-green-700"><i class="fas fa-plus"></i> Buat Pengajuan</a>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
            <form method="GET" class="p-5 border-b border-gray-100">
                <div class="relative max-w-md"><i class="fas fa-search absolute left-3 top-3 text-gray-400"></i><input name="q" value="{{ request('q') }}" class="w-full pl-10 pr-4 py-2.5 rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500" placeholder="Cari nama atau jenis surat..."></div>
            </form>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-500"><tr><th class="px-6 py-4">Pemohon</th><th class="px-6 py-4">Jenis Surat</th><th class="px-6 py-4">Tanggal</th><th class="px-6 py-4">Status</th><th class="px-6 py-4 text-right">Unduh Ulang</th></tr></thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($surats as $surat)
                            @php($status = ['pending' => ['Diproses', 'blue'], 'verified' => ['Selesai', 'green'], 'rejected' => ['Ditolak', 'red']][$surat->status] ?? ['Tidak diketahui', 'gray'])
                            @php($pdfAvailable = view()->exists("user.layanansurat.pdf.{$surat->slug}"))
                            @php($wordAvailable = view()->exists("admin.layanansurat.word.{$surat->slug}"))
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-5 font-medium text-gray-900">{{ data_get($surat->data, 'nama', '-') }}<div class="text-xs font-normal text-gray-500 mt-1">#{{ $surat->id }}</div></td>
                                <td class="px-6 py-5 text-sm text-gray-700">{{ $surat->title }}</td>
                                <td class="px-6 py-5 text-sm text-gray-500">{{ $surat->created_at->format('d M Y H:i') }}</td>
                                <td class="px-6 py-5"><span class="px-3 py-1 rounded-full text-xs font-semibold bg-{{ $status[1] }}-50 text-{{ $status[1] }}-700">{{ $status[0] }}</span></td>
                                <td class="px-6 py-5"><div class="flex justify-end gap-2">@if($pdfAvailable)<a href="{{ route('machine.download.pdf', $surat) }}" class="px-3 py-2 rounded-lg text-sm font-semibold bg-red-50 text-red-600 hover:bg-red-100"><i class="fas fa-file-pdf"></i> PDF</a>@endif @if($wordAvailable)<a href="{{ route('machine.download.word', $surat) }}" class="px-3 py-2 rounded-lg text-sm font-semibold bg-blue-50 text-blue-600 hover:bg-blue-100"><i class="fas fa-file-word"></i> Word</a>@endif @if(!$pdfAvailable && !$wordAvailable)<span class="text-xs text-gray-400">Template belum tersedia</span>@endif</div></td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-6 py-12 text-center text-gray-500"><i class="fas fa-inbox text-3xl text-gray-300 mb-3 block"></i>Belum ada pengajuan dari mesin.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($surats->hasPages())<div class="p-5 border-t border-gray-100">{{ $surats->links() }}</div>@endif
        </div>
    </div>
</x-app-layout>
