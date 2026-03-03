<?php

use Livewire\Component;


new #[Layout('layouts::app')] #[Title('VOX46 — Pemilihan OSIS SMK Negeri 46 Jakarta')] class extends Component
{
    /**
     * Static artikel data — akan diganti dengan Eloquent query
     * saat fitur artikel dikembangkan.
     */
    public array $articles = [
        [
            'category' => 'Pengumuman',
            'title'    => 'Jadwal Pemilihan Ketua OSIS Periode 2025/2026 Resmi Dibuka',
            'excerpt'  => 'Panitia pemilihan mengumumkan bahwa proses pemungutan suara akan berlangsung selama 7 hari mulai tanggal 10 Maret 2026.',
            'date'     => '5 Maret 2026',
            'image'    => null,
        ],
        [
            'category' => 'Profil Paslon',
            'title'    => 'Mengenal Lebih Dekat Tiga Pasangan Calon Ketua & Wakil OSIS',
            'excerpt'  => 'Simak visi, misi, dan program kerja dari masing-masing pasangan calon yang akan berkompetisi dalam pemilihan tahun ini.',
            'date'     => '3 Maret 2026',
            'image'    => null,
        ],
        [
            'category' => 'Panduan',
            'title'    => 'Cara Login dan Memberikan Suara di Sistem VOX46',
            'excerpt'  => 'Panduan lengkap bagi seluruh siswa SMK Negeri 46 Jakarta untuk menggunakan sistem pemilihan digital VOX46.',
            'date'     => '1 Maret 2026',
            'image'    => null,
        ],
    ];

    /**
     * Candidate preview data — akan diambil dari DB via Computed property.
     * nanti klo udah dikembangin fiturnya
     */
    public array $candidates = [
        ['no' => '01', 'name' => 'Pasangan Calon 1', 'votes' => 42],
        ['no' => '02', 'name' => 'Pasangan Calon 2', 'votes' => 35],
        ['no' => '03', 'name' => 'Pasangan Calon 3', 'votes' => 23],
    ];
};
?>

<div class="relative min-h-screen overflow-hidden">

    <section class="hero-section relative min-h-screen bg-main overflow-hidden" aria-label="Hero">

        {{-- Subtle diagonal line texture — tidak mencolok --}}
        <div class="absolute inset-0 pointer-events-none"
            style="background-image: repeating-linear-gradient(-55deg, rgba(255,255,255,0.03) 0px, rgba(255,255,255,0.03) 1px, transparent 1px, transparent 48px);">
        </div>

        {{-- Navbar --}}
        <livewire:ui.navbar />

        {{-- Hero Content --}}
        <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-10 lg:px-16
                    flex items-center min-h-screen pt-20 pb-16">

            <div class="w-full grid lg:grid-cols-[1fr_420px] gap-12 xl:gap-20 items-center">

                {{-- ── Kiri: Teks ── --}}
                <div class="space-y-7">

                    {{-- Periode badge --}}
                    <div class="inline-flex items-center gap-2.5 border border-sec/50
                                px-4 py-1.5 text-xs font-semibold tracking-[0.15em] uppercase
                                text-[#A9B5DF]">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#A9B5DF] animate-pulse"></span>
                        Periode 2025 / 2026
                    </div>

                    {{-- Headline --}}
                    <h1 class="text-[clamp(3rem,7vw,5.5rem)] font-black leading-[1.02] text-white tracking-tight"
                        style="font-family: 'Playfair Display', serif;">
                        Suaramu,<br>
                        <em class="text-[#A9B5DF] not-italic"
                            style="font-style: italic;">Masa Depan</em><br>
                        Kita.
                    </h1>

                    {{-- Subtitle --}}
                    <p class="text-[#A9B5DF]/80 text-base sm:text-lg leading-relaxed max-w-md font-light">
                        Pilih pemimpin OSIS yang akan membawa SMK Negeri 46 Jakarta
                        ke arah yang lebih baik. Setiap suara berarti.
                    </p>

                    {{-- CTA --}}
                    <div class="flex items-center gap-5 flex-wrap pt-1">
                        <a href="/login"
                        wire:navigate
                        class="inline-flex items-center gap-3 bg-white text-main
                                px-7 py-3.5 font-bold text-sm
                                hover:bg-[#A9B5DF] transition-colors duration-200">
                            Mulai Memilih
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                        <a href="#artikel"
                        class="inline-flex items-center gap-2 text-sm font-medium
                                text-white/50 hover:text-white transition-colors duration-200">
                            Lihat Kandidat
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </a>
                    </div>

                    {{-- Stats row --}}
                    <div class="flex items-center gap-10 pt-6 border-t border-white/10">
                        <div>
                            <p class="text-3xl font-black text-white tracking-tight">850+</p>
                            <p class="text-xs text-sec mt-1 font-medium">Pemilih Terdaftar</p>
                        </div>
                        <div class="w-px h-10 bg-white/10"></div>
                        <div>
                            <p class="text-3xl font-black text-white tracking-tight">3</p>
                            <p class="text-xs text-sec mt-1 font-medium">Paslon</p>
                        </div>
                        <div class="w-px h-10 bg-white/10"></div>
                        <div>
                            <p class="text-3xl font-black text-white tracking-tight">7 Hari</p>
                            <p class="text-xs text-sec mt-1 font-medium">Tersisa</p>
                        </div>
                    </div>
                </div>

                {{-- ── Kanan: Voting Preview Card ── --}}
                <aside class="hidden lg:block" aria-label="Preview hasil sementara">
                    <div class="bg-[#1e2456] border border-white/8 p-7 space-y-6">

                        {{-- Card header --}}
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-[10px] font-bold tracking-[0.18em] uppercase text-sec">
                                    Pemilihan Aktif
                                </p>
                                <p class="text-white/40 text-xs mt-1">Data diperbarui secara realtime</p>
                            </div>
                            <div class="text-right border-l border-white/10 pl-5 ml-5">
                                <p class="text-[10px] text-[#A9B5DF]/60 font-medium">Total Suara</p>
                                <p class="text-2xl font-black text-white mt-0.5">412</p>
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="border-t border-white/8"></div>

                        {{-- Kandidat rows --}}
                        <div class="space-y-5">
                            @foreach ($candidates as $index => $candidate)
                            <div class="flex items-center gap-4">
                                <div class="w-9 h-9 bg-main border border-sec/30
                                            flex items-center justify-center
                                            text-[10px] font-black text-[#A9B5DF] shrink-0">
                                    {{ $candidate['no'] }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm font-semibold text-white truncate">
                                            {{ $candidate['name'] }}
                                        </span>
                                        <span class="text-xs font-bold text-[#A9B5DF] ml-3 shrink-0">
                                            {{ $candidate['votes'] }}%
                                        </span>
                                    </div>
                                    <div class="h-1 w-full bg-white/8">
                                        <div class="h-full bg-sec transition-all duration-700"
                                            style="width: {{ $candidate['votes'] }}%"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        {{-- Card footer --}}
                        <div class="border-t border-white/8 pt-4">
                            <a href="/login" wire:navigate
                            class="flex items-center justify-center gap-2 w-full
                                    border border-sec/40 py-2.5 text-xs
                                    font-semibold text-[#A9B5DF] hover:bg-sec/10
                                    transition-colors duration-200">
                                <i class="fa-solid fa-lock-open text-[10px]"></i>
                                Login untuk Memberikan Suara
                            </a>
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </section>


    {{-- SECTION 2: ARTIKEL --}}
    <section id="artikel" class="bg-white py-20 px-6 sm:px-10 lg:px-16" aria-label="Artikel terbaru">
        <div class="max-w-7xl mx-auto">

            {{-- Section header --}}
            <header class="flex items-end justify-between mb-12">
                <div class="space-y-2">
                    <p class="text-[10px] font-bold tracking-[0.18em] uppercase text-sec">
                        — Artikel
                    </p>
                    <h2 class="text-3xl sm:text-4xl font-black text-blk leading-tight max-w-sm"
                        style="font-family: 'Playfair Display', serif;">
                        Informasi &amp; <br>Berita Terkini
                        <span class="inline-block w-8 h-0.5 bg-main ml-3 mb-1.5 align-middle"></span>
                    </h2>
                </div>

                {{-- Navigation arrows --}}
                <div class="hidden sm:flex items-center gap-2">
                    <button type="button"
                            class="w-10 h-10 border border-main/20 flex items-center justify-center
                                text-main/40 hover:border-main hover:text-main
                                transition-colors duration-200"
                            aria-label="Artikel sebelumnya">
                        <i class="fa-solid fa-arrow-left text-sm"></i>
                    </button>
                    <button type="button"
                            class="w-10 h-10 bg-main flex items-center justify-center
                                text-white hover:bg-sec
                                transition-colors duration-200"
                            aria-label="Artikel berikutnya">
                        <i class="fa-solid fa-arrow-right text-sm"></i>
                    </button>
                </div>
            </header>

            {{-- Article cards grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($articles as $article)
                <article class="group flex flex-col border border-blk/8
                                hover:border-main/30 transition-colors duration-200">

                    {{-- Article image placeholder --}}
                    <div class="aspect-video bg-[#f0f2f8] overflow-hidden">
                        @if ($article['image'])
                            <img src="{{ $article['image'] }}"
                                alt="{{ $article['title'] }}"
                                class="w-full h-full object-cover
                                        group-hover:scale-[1.03] transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="fa-regular fa-image text-3xl text-main/20"></i>
                            </div>
                        @endif
                    </div>

                    {{-- Article content --}}
                    <div class="flex flex-col flex-1 p-6 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-bold tracking-widest uppercase
                                        text-sec">
                                {{ $article['category'] }}
                            </span>
                            <time class="text-xs text-blk/40">{{ $article['date'] }}</time>
                        </div>

                        <h3 class="font-bold text-blk text-base leading-snug
                                group-hover:text-main transition-colors duration-200">
                            {{ $article['title'] }}
                        </h3>

                        <p class="text-sm text-main/55 leading-relaxed flex-1">
                            {{ $article['excerpt'] }}
                        </p>

                        <a href="#"
                        class="inline-flex items-center gap-2 text-xs font-bold
                                text-main hover:text-sec
                                transition-colors duration-200 mt-auto pt-2">
                            Baca Selengkapnya
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>


    {{-- SECTION 3: KEUNGGULAN (Stats / Why) --}}
    <section class="bg-blk py-20 px-6 sm:px-10 lg:px-16" aria-label="Keunggulan sistem">
        <div class="max-w-7xl mx-auto space-y-16">

            {{-- Section header: headline kiri + desc kanan (layout img5) --}}
            <header class="grid lg:grid-cols-2 gap-8 items-end">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight"
                    style="font-family: 'Playfair Display', serif;">
                    Mengapa Menggunakan
                    <span class="text-sec">VOX46?</span>
                </h2>
                <p class="text-white/45 text-base leading-relaxed max-w-md lg:ml-auto">
                    VOX46 dirancang khusus untuk pemilihan OSIS SMK Negeri 46 Jakarta —
                    transparan, aman, dan dapat digunakan berulang setiap tahun ajaran baru
                    tanpa konfigurasi ulang dari awal.
                </p>
            </header>

            {{-- Stats cards: 3 kolom, kartu tengah di-highlight (layout img5) --}}
            <div class="grid sm:grid-cols-3 gap-4">

                {{-- Card 1 --}}
                <div class="border border-white/8 p-8 space-y-6 group
                            hover:border-sec/40 transition-colors duration-200">
                    <div class="flex items-start justify-between">
                        <p class="text-4xl font-black text-white">100%</p>
                        <div class="w-8 h-8 border border-white/15 flex items-center justify-center
                                    group-hover:border-sec/50 transition-colors duration-200">
                            <i class="fa-solid fa-arrow-up-right text-xs text-white/40"></i>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm font-bold text-white">Terverifikasi</p>
                        <p class="text-sm text-white/40 leading-relaxed">
                            Setiap suara divalidasi oleh NIS siswa yang terdaftar resmi
                            di database sekolah.
                        </p>
                    </div>
                    {{-- Mini bar chart visual (dekoratif, bukan data real) --}}
                    <div class="flex items-end gap-1 h-10">
                        @foreach ([30, 50, 40, 65, 55, 80, 70, 100] as $h)
                        <div class="flex-1 bg-main" style="height: {{ $h }}%"></div>
                        @endforeach
                    </div>
                </div>

                {{-- Card 2 — HIGHLIGHTED (tengah, bg lebih terang) --}}
                <div class="bg-main p-8 space-y-6 relative">
                    <div class="flex items-start justify-between">
                        <p class="text-4xl font-black text-white">1 : 1</p>
                        <div class="w-8 h-8 border border-sec/40 flex items-center justify-center">
                            <i class="fa-solid fa-arrow-up-right text-xs text-[#A9B5DF]"></i>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm font-bold text-white">Satu Siswa, Satu Suara</p>
                        <p class="text-sm text-white/60 leading-relaxed">
                            Sistem mencegah duplikasi suara — setiap siswa hanya dapat
                            memilih satu kali per periode pemilihan aktif.
                        </p>
                    </div>
                    {{-- Icon dekoratif --}}
                    <div class="flex items-center justify-center h-10">
                        <div class="flex gap-3">
                            <div class="w-6 h-6 bg-sec flex items-center justify-center">
                                <i class="fa-solid fa-user text-[10px] text-white"></i>
                            </div>
                            <div class="w-px h-6 bg-sec/40 self-stretch"></div>
                            <div class="w-6 h-6 border border-sec/40 flex items-center justify-center">
                                <i class="fa-solid fa-check text-[10px] text-sec"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="border border-white/8 p-8 space-y-6 group
                            hover:border-sec/40 transition-colors duration-200">
                    <div class="flex items-start justify-between">
                        <p class="text-4xl font-black text-white">∞</p>
                        <div class="w-8 h-8 border border-white/15 flex items-center justify-center
                                    group-hover:border-sec/50 transition-colors duration-200">
                            <i class="fa-solid fa-arrow-up-right text-xs text-white/40"></i>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm font-bold text-white">Multi-Periode</p>
                        <p class="text-sm text-white/40 leading-relaxed">
                            Digunakan berulang setiap tahun. Siswa yang sudah naik kelas
                            dapat memilih kembali di periode berikutnya.
                        </p>
                    </div>
                    {{-- Mini visual dekoratif --}}
                    <div class="flex items-end gap-1 h-10">
                        @foreach ([100, 80, 95, 70, 90, 60, 85, 75] as $h)
                        <div class="flex-1 bg-main" style="height: {{ $h }}%"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- SECTION 4: FITUR-FITUR --}}
    <section class="bg-[#f7f8fc] py-20 px-6 sm:px-10 lg:px-16" aria-label="Fitur-fitur VOX46">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-[1fr_1.2fr] gap-12 xl:gap-20">

                {{-- ── Kiri: Heading + Accordion list ── --}}
                <div class="space-y-10">
                    <header class="space-y-4">
                        <h2 class="text-3xl sm:text-4xl font-black text-blk leading-tight"
                            style="font-family: 'Playfair Display', serif;">
                            Fitur &amp; <span class="text-main">Kemampuan</span>
                            <br>VOX46
                        </h2>
                        <p class="text-blk/50 text-sm leading-relaxed max-w-sm">
                            Platform pemilihan OSIS digital yang dirancang untuk kebutuhan
                            nyata administrasi sekolah.
                        </p>
                    </header>

                    {{-- Accordion-style feature list (layout dari img6 kiri) --}}
                    <nav class="space-y-0 border-t border-blk/8" aria-label="Daftar fitur">
                        @foreach([
                            ['icon' => 'fa-shield-halved', 'label' => 'Autentikasi NIS Siswa', 'active' => true],
                            ['icon' => 'fa-bolt',           'label' => 'Hasil Realtime',         'active' => false],
                            ['icon' => 'fa-file-arrow-up',  'label' => 'Import Data Excel',      'active' => false],
                            ['icon' => 'fa-rotate',         'label' => 'Manajemen Periode',      'active' => false],
                            ['icon' => 'fa-chart-simple',   'label' => 'Dasbor Admin',           'active' => false],
                        ] as $item)
                        <div class="flex items-center gap-4 py-4 border-b border-blk/8
                                    cursor-pointer group
                                    {{ $item['active'] ? 'text-main' : 'text-blk/40 hover:text-main' }}
                                    transition-colors duration-200">
                            <i class="fa-solid {{ $item['icon'] }} text-sm w-4 text-center
                                    {{ $item['active'] ? 'text-main' : '' }}"></i>
                            <span class="flex-1 text-sm font-{{ $item['active'] ? 'bold' : 'medium' }}">
                                {{ $item['label'] }}
                            </span>
                            <i class="fa-solid fa-arrow-right text-xs
                                    {{ $item['active'] ? 'translate-x-0' : '-translate-x-1 opacity-0 group-hover:translate-x-0 group-hover:opacity-100' }}
                                    transition-all duration-200"></i>
                        </div>
                        @endforeach
                    </nav>
                </div>

                {{-- ── Kanan: 2x2 feature cards grid ── --}}
                <div class="grid grid-cols-2 gap-4 content-start">

                    {{-- Card 1 —— Normal --}}
                    <article class="bg-white border border-blk/8 p-6 space-y-4
                                    hover:border-main/30 transition-colors duration-200 group">
                        <div class="w-9 h-9 bg-[#f0f2f8] flex items-center justify-center
                                    group-hover:bg-main/10 transition-colors duration-200">
                            <i class="fa-solid fa-shield-halved text-sm text-main"></i>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-sm font-bold text-blk">Autentikasi NIS</h3>
                            <p class="text-xs text-blk/50 leading-relaxed">
                                Login menggunakan NIS dan password. Hanya siswa terdaftar yang
                                dapat mengakses sistem pemilihan.
                            </p>
                        </div>
                        <a href="#" class="inline-flex items-center gap-1.5 text-xs font-bold
                                        text-main hover:text-sec transition-colors duration-200">
                            Pelajari <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </article>

                    {{-- Card 2 — HIGHLIGHTED (dark) --}}
                    <article class="bg-main p-6 space-y-4 group">
                        <div class="w-9 h-9 bg-white/10 flex items-center justify-center">
                            <i class="fa-solid fa-bolt text-sm text-[#A9B5DF]"></i>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-sm font-bold text-white">Hasil Realtime</h3>
                            <p class="text-xs text-white/60 leading-relaxed">
                                Setiap suara yang masuk langsung terlihat oleh semua
                                pengguna tanpa perlu refresh halaman.
                            </p>
                        </div>
                        <a href="#" class="inline-flex items-center gap-1.5 text-xs font-bold
                                        text-[#A9B5DF] hover:text-white transition-colors duration-200">
                            Pelajari <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </article>

                    {{-- Card 3 — Normal --}}
                    <article class="bg-white border border-blk/8 p-6 space-y-4
                                    hover:border-main/30 transition-colors duration-200 group">
                        <div class="w-9 h-9 bg-[#f0f2f8] flex items-center justify-center
                                    group-hover:bg-main/10 transition-colors duration-200">
                            <i class="fa-solid fa-file-arrow-up text-sm text-main"></i>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-sm font-bold text-blk">Import Excel</h3>
                            <p class="text-xs text-blk/50 leading-relaxed">
                                Admin dapat mengimpor data siswa langsung dari file Excel
                                yang diberikan oleh TU sekolah.
                            </p>
                        </div>
                        <a href="#" class="inline-flex items-center gap-1.5 text-xs font-bold
                                        text-main hover:text-sec transition-colors duration-200">
                            Pelajari <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </article>

                    {{-- Card 4 — Normal --}}
                    <article class="bg-white border border-blk/8 p-6 space-y-4
                                    hover:border-main/30 transition-colors duration-200 group">
                        <div class="w-9 h-9 bg-[#f0f2f8] flex items-center justify-center
                                    group-hover:bg-main/10 transition-colors duration-200">
                            <i class="fa-solid fa-rotate text-sm text-main"></i>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-sm font-bold text-blk">Multi-Periode</h3>
                            <p class="text-xs text-blk/50 leading-relaxed">
                                Pemilihan dapat diulang setiap tahun ajaran baru. Siswa
                                yang naik kelas mendapat hak suara baru.
                            </p>
                        </div>
                        <a href="#" class="inline-flex items-center gap-1.5 text-xs font-bold
                                        text-main hover:text-sec transition-colors duration-200">
                            Pelajari <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </article>

                </div>
            </div>
        </div>
    </section>
</div>

