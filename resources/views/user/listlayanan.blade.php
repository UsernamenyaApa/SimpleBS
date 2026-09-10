<x-app-layout>
    <div class="bg-gray-100 min-h-screen font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            @if(Auth::user()->role === 'mesin')
                {{-- HERO KHUSUS MESIN PELAYANAN --}}
                <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-600 via-green-600 to-teal-700 px-6 py-8 sm:px-10 sm:py-10 text-white shadow-xl shadow-green-200">
                    <div class="absolute -right-16 -top-20 h-64 w-64 rounded-full bg-white/10"></div>
                    <div class="absolute right-24 bottom-0 h-32 w-32 rounded-full bg-yellow-300/15"></div>

                    <div class="relative grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                        <div class="max-w-2xl">
                            <div class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-3 py-1.5 text-xs font-bold tracking-wide">
                                <span class="h-2 w-2 rounded-full bg-green-200 animate-pulse"></span>
                                MESIN PELAYANAN MANDIRI
                            </div>
                            <h1 class="mt-4 text-3xl font-extrabold leading-tight sm:text-4xl">Buat surat lebih mudah, langsung dari kantor desa.</h1>
                            <p class="mt-3 text-sm leading-relaxed text-green-50 sm:text-base">Pilih layanan, isi data warga dengan teliti, lalu unduh dokumen PDF atau Word untuk dicetak. Pengajuan tetap masuk ke antrean verifikasi admin.</p>

                            <div class="mt-6 flex flex-wrap gap-3 text-sm font-medium">
                                <span class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-3 py-2"><i class="fas fa-edit"></i> Isi formulir</span>
                                <span class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-3 py-2"><i class="fas fa-download"></i> Unduh & cetak</span>
                                <span class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-3 py-2"><i class="fas fa-user-shield"></i> Diverifikasi admin</span>
                            </div>
                        </div>

                        <div class="hidden sm:flex h-36 w-36 shrink-0 items-center justify-center rounded-3xl border border-white/20 bg-white/10 text-6xl shadow-inner lg:h-40 lg:w-40">
                            <i class="fas fa-desktop"></i>
                        </div>
                    </div>
                </section>
            @endif

            {{-- HEADER --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Daftar Layanan</h1>
                    <p class="text-gray-500 mt-1">Temukan dan ajukan layanan administrasi desa yang Anda butuhkan.</p>
                </div>

                {{-- SEARCH --}}
                <div class="relative w-full md:w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" 
                           id="searchLayanan" 
                           onkeyup="filterLayanan()" 
                           class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500 sm:text-sm transition duration-150 ease-in-out shadow-sm" 
                           placeholder="Cari layanan (contoh: KTP, Domisili)...">
                </div>
            </div>

            {{-- GRID LAYANAN --}}
            <div id="layananContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                @php
                    $layananList = [
                        ['icon' => 'fa-truck-moving', 'color' => 'orange', 'title' => 'Kepindahan', 'slug' => 'kepindahan'],
                        ['icon' => 'fa-user-plus', 'color' => 'blue', 'title' => 'Kedatangan', 'slug' => 'kedatangan'],
                        ['icon' => 'fa-baby', 'color' => 'pink', 'title' => 'Akta Kelahiran', 'slug' => 'kelahiran'],
                        ['icon' => 'fa-book-dead', 'color' => 'gray', 'title' => 'Akta Kematian', 'slug' => 'kematian'],
 
                        ['icon' => 'fa-store', 'color' => 'purple', 'title' => 'Surat Keterangan Usaha', 'slug' => 'usaha'],
                        ['icon' => 'fa-hands-helping', 'color' => 'red', 'title' => 'Surat Keterangan Tidak Mampu', 'slug' => 'sktm'],
                        ['icon' => 'fa-money-bill-wave', 'color' => 'emerald', 'title' => 'Surat Keterangan Penghasilan', 'slug' => 'penghasilan'],
                        ['icon' => 'fa-id-card', 'color' => 'cyan', 'title' => 'Surat Keterangan KTP Sementara', 'slug' => 'ktp-sementara'],
                        ['icon' => 'fa-store-alt', 'color' => 'indigo', 'title' => 'Surat Keterangan Domisili Usaha', 'slug' => 'domisili-usaha'],
                        ['icon' => 'fa-file-contract', 'color' => 'yellow', 'title' => 'Pengantar Permohonan SKCK', 'slug' => 'skck'],
                        ['icon' => 'fa-user-check', 'color' => 'lime', 'title' => 'Keterangan Berkelakuan Baik', 'slug' => 'kelakuan-baik'],
                        ['icon' => 'fa-user-shield', 'color' => 'sky', 'title' => 'Surat Izin Orang Tua', 'slug' => 'izin-orang-tua'],
                        ['icon' => 'fa-child', 'color' => 'amber', 'title' => 'Surat Keterangan Yatim', 'slug' => 'yatim'],
                        ['icon' => 'fa-ring', 'color' => 'pink', 'title' => 'Surat Keterangan Telah Menikah', 'slug' => 'telah-menikah'],
                        ['icon' => 'fa-heart-broken', 'color' => 'fuchsia', 'title' => 'Keterangan Belum Menikah', 'slug' => 'belum-menikah'],
                        ['icon' => 'fa-check-double', 'color' => 'cyan', 'title' => 'Ket. Tanah Tidak Sengketa', 'slug' => 'tanah-tidak-sengketa'],
                    ];
                @endphp

                @foreach($layananList as $layanan)
                    <a href="{{ route('layanan.show', $layanan['slug']) }}"
                        class="layanan-item group bg-white rounded-2xl border border-gray-200 p-5 hover:shadow-lg hover:border-green-400 transition-all duration-300 flex flex-col justify-between h-full relative overflow-hidden">

                        {{-- BACKGROUND DECORATION --}}
                        <div class="absolute top-0 right-0 w-16 h-16 bg-{{ $layanan['color'] }}-50 rounded-bl-full -mr-8 -mt-8 transition-all group-hover:scale-150 group-hover:bg-{{ $layanan['color'] }}-100"></div>

                        <div>
                            {{-- ICON --}}
                            <div class="w-12 h-12 rounded-xl bg-{{ $layanan['color'] }}-50 text-{{ $layanan['color'] }}-600 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform shadow-sm border border-{{ $layanan['color'] }}-100">
                                <i class="fas {{ $layanan['icon'] }}"></i>
                            </div>

                            {{-- TITLE --}}
                            <h3 class="font-bold text-gray-900 group-hover:text-green-600 transition-colors line-clamp-2 text-sm md:text-base">
                                {{ $layanan['title'] }}
                            </h3>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-50 flex justify-between items-center">
                            <span class="text-xs text-gray-400 font-medium group-hover:text-green-500 transition-colors">
                                Ajukan Sekarang
                            </span>
                            <div class="w-6 h-6 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-green-500 group-hover:text-white transition-all">
                                <i class="fas fa-arrow-right text-xs"></i>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>

            {{-- NO RESULT MESSAGE --}}
            <div id="noResult" class="hidden text-center py-12">
                <div class="inline-block p-4 rounded-full bg-gray-100 text-gray-400 mb-3">
                    <i class="fas fa-search text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Layanan tidak ditemukan</h3>
                <p class="text-gray-500">Coba kata kunci lain atau hubungi admin desa.</p>
            </div>

        </div>
    </div>

    {{-- SEARCH FUNCTION --}}
    <script>
        function filterLayanan() {
            let input = document.getElementById('searchLayanan');
            let filter = input.value.toUpperCase();
            let container = document.getElementById('layananContainer');
            let items = container.getElementsByClassName('layanan-item');
            let noResult = document.getElementById('noResult');
            let visibleCount = 0;

            for (let i = 0; i < items.length; i++) {
                let title = items[i].getElementsByTagName("h3")[0];
                let txtValue = title.textContent || title.innerText;

                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    items[i].style.display = "";
                    visibleCount++;
                } else {
                    items[i].style.display = "none";
                }
            }

            noResult.classList.toggle('hidden', visibleCount !== 0);
        }
    </script>
</x-app-layout>
