<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Panduan Pengguna - SimpelBS</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
        </style>
    </head>
    <body class="bg-gray-50 text-gray-700 antialiased">
        <nav class="bg-white/90 backdrop-blur-md border-b border-gray-100 sticky top-0 z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-700 hover:text-green-700 transition">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Beranda
                </a>
                <div class="flex items-center gap-2 text-sm font-semibold text-green-700">
                    <i class="fas fa-book-open"></i>
                    Panduan Pengguna
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="rounded-[32px] border border-gray-200 bg-white shadow-[0_20px_60px_rgba(0,0,0,0.08)] overflow-hidden">
                <section class="bg-gradient-to-r from-green-700 via-green-600 to-emerald-500 px-8 py-12 text-white">
                    <div class="max-w-3xl">
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/15 px-4 py-2 text-sm font-semibold mb-4">
                            <i class="fas fa-circle-info"></i>
                            Panduan untuk warga
                        </div>
                        <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight">Buku panduan dan video tutorial untuk membantu warga menggunakan SimpelBS</h1>
                        <p class="mt-4 text-green-50 text-lg leading-relaxed">
                            Halaman ini dirancang untuk menampilkan panduan PDF dan video tutorial secara langsung di website, sehingga warga bisa mengikuti langkah-langkah dengan lebih mudah.
                        </p>
                    </div>
                </section>

                <section class="grid gap-8 p-5 sm:p-8">
                    <div class="order-2 mx-auto w-full max-w-5xl rounded-2xl border border-gray-200 bg-gray-50 p-5 sm:p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 rounded-xl bg-green-100 text-green-700 flex items-center justify-center text-xl">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Buku Panduan PDF</h2>
                                <p class="text-sm text-gray-500">Tampilan dokumen panduan dalam format PDF</p>
                            </div>
                        </div>

                        @php
                            $pdfPath = public_path('panduan/panduan-pengguna.pdf');
                            $pdfExists = file_exists($pdfPath);
                        @endphp

                        @if($pdfExists)
                            <a href="{{ asset('panduan/panduan-pengguna.pdf') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-lg bg-green-700 px-4 py-2 text-sm font-semibold text-white hover:bg-green-800 transition mb-4">
                                <i class="fas fa-download"></i>
                                Buka / Unduh PDF
                            </a>
                            <iframe src="{{ asset('panduan/panduan-pengguna.pdf') }}" class="h-[480px] w-full rounded-xl border border-gray-200 bg-white sm:h-[600px] lg:h-[720px]"></iframe>
                        @else
                            <div class="rounded-xl border border-dashed border-yellow-300 bg-yellow-50 p-4 text-sm text-yellow-800">
                                <p class="font-semibold mb-2">File PDF belum tersedia.</p>
                                <p>Silakan unggah file PDF ke folder <span class="font-mono">public/panduan/panduan-pengguna.pdf</span> agar dokumen bisa tampil langsung di halaman ini.</p>
                            </div>
                        @endif
                    </div>

                    <div class="order-1 mx-auto w-full max-w-5xl rounded-2xl border border-gray-200 bg-gray-50 p-5 sm:p-6">
                        <div>
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center text-xl">
                                    <i class="fas fa-video"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-900">Video Tutorial</h2>
                                    <p class="text-sm text-gray-500">Tampilan video tutorial untuk warga</p>
                                </div>
                            </div>

                            @php
                                $videoUrl = 'https://www.youtube.com/embed/aNrmvvMNqpo';
                            @endphp

                            @if($videoUrl)
                                <div class="aspect-video overflow-hidden rounded-2xl border border-gray-200 bg-slate-950 shadow-xl shadow-slate-900/20">
                                    <iframe class="h-full w-full" src="{{ $videoUrl }}" title="Video tutorial SimpelBS" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            @else
                                <div class="rounded-xl border border-dashed border-blue-300 bg-blue-50 p-4 text-sm text-blue-800">
                                    <p class="font-semibold mb-2">Video belum terhubung.</p>
                                    <p>Silakan ganti bagian <span class="font-mono">PASTE_VIDEO_ID_DISINI</span> dengan ID video YouTube Anda. Contohnya: <span class="font-mono">https://www.youtube.com/embed/dQw4w9WgXcQ</span>.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </body>
</html>
