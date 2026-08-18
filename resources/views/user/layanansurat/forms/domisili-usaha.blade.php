<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 font-sans">
        
        <!-- Tombol Kembali (Atas) -->
        <div class="mb-6">
            <a href="{{ route('user.listlayanan') }}" class="inline-flex items-center text-gray-500 hover:text-green-600 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span class="font-medium">Kembali ke Daftar Layanan</span>
            </a>
        </div>

        <!-- FORM CARD SECTION -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
            
            <!-- Card Header -->
            <div class="flex items-start gap-4 mb-8 border-b border-gray-100 pb-6">
                <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center flex-shrink-0 border border-indigo-100">
                    <i class="fas fa-store text-indigo-600 text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">Formulir Keterangan Domisili Usaha</h1>
                    <p class="text-sm text-gray-500 mt-1">Isi data diri dan data usaha untuk penerbitan surat keterangan domisili usaha.</p>
                </div>
            </div>

            <form action="{{ route('layanan.store', 'domisili-usaha') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- SECTION 1: IDENTITAS PEMOHON -->
                <div class="mb-8">
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 border-l-4 border-indigo-500 pl-3">Data Diri Pemohon</h3>
                    
                    <div class="grid grid-cols-1 gap-6">
                        <!-- NIK -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                NIK (Nomor Induk Kependudukan) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="nik" required 
                                   class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3 transition-shadow" 
                                   value="{{ old('nik', Auth::user()->nik ?? '') }}" placeholder="16 digit NIK">
                            <div class="mt-2 flex items-center gap-1 text-xs text-gray-500">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                NIK terdiri dari 16 digit angka
                            </div>
                        </div>

                        <!-- Nama Lengkap -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama" required 
                                   class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3 transition-shadow" 
                                   value="{{ old('nama', Auth::user()->name ?? '') }}" placeholder="Nama Sesuai KTP">
                            <div class="mt-2 flex items-center gap-1 text-xs text-gray-500">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Nama harus sesuai dengan yang tertera di KTP
                            </div>
                        </div>
                    </div>

                    <!-- Grid TTL & JK -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tempat/Tanggal Lahir <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="ttl" required 
                                   class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3" 
                                   value="{{ old('ttl') }}" placeholder="GARUT, 25-04-1995">
                                <div class="mt-2 flex items-center gap-1 text-xs text-gray-500">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Format: KOTA, DD-MM-YYYY
                                </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Jenis Kelamin <span class="text-red-500">*</span>
                            </label>
                            <select name="jenis_kelamin" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3">
                                <option value="LAKI-LAKI" {{ old('jenis_kelamin') == 'LAKI-LAKI' ? 'selected' : '' }}>LAKI-LAKI</option>
                                <option value="PEREMPUAN" {{ old('jenis_kelamin') == 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
                            </select>
                        </div>
                    </div>

                    <!-- Grid Pekerjaan, Status, Agama, Kewarganegaraan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan <span class="text-red-500">*</span></label>
                            <input type="text" name="pekerjaan" required 
                                   class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3" 
                                   value="{{ old('pekerjaan') }}" placeholder="Wiraswasta">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status Perkawinan <span class="text-red-500">*</span></label>
                            <select name="status" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3">
                                <option value="KAWIN">KAWIN</option>
                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                <option value="CERAI HIDUP">CERAI HIDUP</option>
                                <option value="CERAI MATI">CERAI MATI</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Agama <span class="text-red-500">*</span></label>
                            <select name="agama" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3">
                                <option value="ISLAM">ISLAM</option>
                                <option value="KRISTEN">KRISTEN</option>
                                <option value="KATOLIK">KATOLIK</option>
                                <option value="HINDU">HINDU</option>
                                <option value="BUDDHA">BUDDHA</option>
                                <option value="KONGHUCU">KONGHUCU</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kewarganegaraan <span class="text-red-500">*</span></label>
                            <input type="text" name="kewarganegaraan" required 
                                   class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3" 
                                   value="INDONESIA">
                        </div>
                    </div>

                    <!-- Alamat Pemohon -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Alamat Tempat Tinggal <span class="text-red-500">*</span>
                        </label>
                        <textarea name="alamat" rows="2" required 
                                  class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3"
                                  placeholder="Alamat lengkap sesuai KTP">{{ old('alamat') }}</textarea>
                    </div>
                </div>

                <!-- SECTION 2: DATA USAHA -->
                <div class="mb-8">
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 border-l-4 border-indigo-500 pl-3">Data Usaha</h3>
                    
                    <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-5 mb-6">
                        <div class="grid grid-cols-1 gap-6">
                            
                            <!-- Nama Pemilik Usaha -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Pemilik Usaha <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="pemilik" required 
                                       class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3" 
                                       value="{{ old('pemilik', Auth::user()->name ?? '') }}" 
                                       placeholder="Nama pemilik usaha (biasanya sama dengan pemohon)">
                            </div>

                            <!-- Jenis Usaha -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Jenis / Bidang Usaha <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="jenis_usaha" required 
                                       class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3" 
                                       value="{{ old('jenis_usaha') }}" 
                                       placeholder="Contoh: Warung Sembako, Bengkel Motor, Toko Pakaian">
                            </div>

                            <!-- Alamat Usaha -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Alamat Lokasi Usaha <span class="text-red-500">*</span>
                                </label>
                                <textarea name="alamat_usaha" rows="3" required 
                                          class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3"
                                          placeholder="Alamat lengkap tempat usaha beroperasi">{{ old('alamat_usaha') }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- SECTION 3: LAMPIRAN -->
                <div class="mb-8">
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 border-l-4 border-indigo-500 pl-3">Berkas Pendukung</h3>
                    
                    <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 mb-4 flex items-start gap-3">
                        <i class="fas fa-info-circle text-blue-500 mt-0.5"></i>
                        <p class="text-sm text-blue-700">Silakan upload Scan/Foto <strong>KTP</strong> dan <strong>Surat Pengantar RT/RW</strong> (jika ada) sebagai syarat pengajuan.</p>
                    </div>

                    <!-- Preview daftar file -->
                    <div id="file-preview" class="mb-3 space-y-2"></div>

                    <div class="flex items-center justify-center w-full">
                        <label for="file-input"
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">

                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500">
                                    <span class="font-semibold text-indigo-600">Klik untuk upload</span> atau drag and drop
                                </p>
                                <p class="text-xs text-gray-400">PDF, JPG, PNG (Maks. 2MB)</p>
                            </div>

                            <!-- Input File Multiple -->
                            <input id="file-input" type="file" name="files[]" multiple class="hidden">
                        </label>
                    </div>
                </div>

                <!-- BUTTONS -->
                <div class="flex flex-col sm:flex-row sm:justify-between gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('user.listlayanan') }}" class="w-full sm:w-auto px-6 py-3 bg-gray-100 text-gray-700 rounded-xl font-medium text-center hover:bg-gray-200 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-indigo-600 text-white rounded-xl font-medium text-center hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all flex items-center justify-center gap-2">
                        <span>Kirim Pengajuan</span>
                        <i class="fas fa-paper-plane text-sm"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- MODAL SUCCESS POPUP -->
    @if(session('success') || request('success'))
    <div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-60 backdrop-blur-sm transition-opacity duration-300">
        <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-md w-full mx-4 relative shadow-2xl transform scale-100 transition-transform duration-300">
            
            <!-- Tombol Close (X) -->
            <button onclick="document.getElementById('successModal').remove()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
    
            <!-- Icon Sukses Besar -->
            <div class="mx-auto w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mb-6 shadow-inner animate-bounce-short">
                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
    
            <!-- Judul & Deskripsi Utama -->
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-3">Pengajuan Berhasil!</h2>
            <p class="text-center text-gray-600 mb-6 leading-relaxed">
                Warga harap menunggu proses pengajuan yang akan berlangsung selama <span class="font-semibold text-gray-800">1-3 hari kerja</span>.
            </p>
    
            <!-- Box Hijau: Info Status -->
            <div class="bg-green-50 border border-green-100 rounded-2xl p-4 mb-4 flex items-start gap-3">
                <div class="text-green-600 mt-0.5 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 text-sm mb-1">Informasi Status</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Jika pengajuan sudah disetujui, status pada halaman riwayat pengajuan akan berubah menjadi <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Approved</span>.
                    </p>
                </div>
            </div>
            
            <!-- Box Kuning: Info Tambahan (Sesuaikan Saja) -->
            <div class="bg-yellow-50 border border-yellow-100 rounded-2xl p-4 mb-8 flex items-start gap-3">
                <div class="text-yellow-600 mt-0.5 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <p class="text-xs text-yellow-800 leading-relaxed">
                    Pastikan nomor kontak yang Anda masukkan aktif agar kami dapat menghubungi Anda jika diperlukan verifikasi tambahan.
                </p>
            </div>
    
            <!-- Tombol Aksi -->
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('user.listlayanan') }}" class="w-full sm:w-1/2 py-3 px-4 border border-gray-300 rounded-xl text-gray-700 font-medium text-center hover:bg-gray-50 focus:ring-4 focus:ring-gray-100 transition-all">
                    Nanti
                </a>
                <!-- Arahkan href ke route yang sesuai, misal dashboard atau history -->
                <a href="{{ route('user.riwayat') }}" class="w-full sm:w-1/2 py-3 px-4 bg-green-600 text-white rounded-xl font-medium text-center hover:bg-green-700 focus:ring-4 focus:ring-green-200 shadow-lg shadow-green-200 transition-all">
                    Lihat Status
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- SCRIPT PREVIEW FILE -->
    <script>
        const input = document.getElementById("file-input");
        const preview = document.getElementById("file-preview");
        let allFiles = []; 

        input.addEventListener("change", function (event) {
            const newFiles = Array.from(event.target.files);
            allFiles = [...allFiles, ...newFiles];
            updatePreview();
            updateInputFiles();
        });

        function updatePreview() {
            preview.innerHTML = "";
            allFiles.forEach((file, index) => {
                const item = document.createElement("div");
                item.className = "text-sm text-gray-700 flex justify-between items-center bg-gray-50 border border-gray-200 px-4 py-3 rounded-lg";
                item.innerHTML = `
                    <div class="flex items-center gap-3">
                        <i class="fas fa-file-alt text-gray-400"></i>
                        <span class="truncate max-w-[200px]">${file.name}</span>
                    </div>
                    <button type="button" onclick="removeFile(${index})" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                preview.appendChild(item);
            });
        }

        function removeFile(index) {
            allFiles.splice(index, 1);
            updatePreview();
            updateInputFiles();
        }

        function updateInputFiles() {
            const dataTransfer = new DataTransfer();
            allFiles.forEach(f => dataTransfer.items.add(f));
            input.files = dataTransfer.files;
        }
    </script>

</x-app-layout>