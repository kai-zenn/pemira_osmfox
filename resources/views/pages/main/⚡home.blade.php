<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

new #[Layout('layouts.main')] #[Title('VOX46 — Beranda')]class extends Component
{
    /*
    |--------------------------------------------------------------------------
    | DATA STATIS — Ganti satu per satu dengan query Eloquent saat fitur siap.
    | Setiap blok diberi komentar model/method yang akan digunakan nanti.
    |--------------------------------------------------------------------------
    */

    /**
     * Slides hero carousel.
     * FUTURE: MediaLibrary::where('collection', 'hero-slides')->get()
     *         atau storage path dari tabel `election_media`
     */
    public array $slides = [
        ['src' => null, 'caption' => 'Momen orasi paslon di lapangan sekolah'],
        ['src' => null, 'caption' => 'Kampanye kreatif OSIS 2025/2026'],
        ['src' => null, 'caption' => 'Antusias siswa menyaksikan debat terbuka'],
    ];

    /**
     * Data polling quick count.
     * FUTURE: Vote::selectRaw('candidate_id, count(*) as votes')
     *           ->groupBy('candidate_id')
     *           ->with('candidate')
     *           ->where('election_period_id', $activePeriod->id)
     *           ->get()
     * Atau jadikan Livewire #[Computed] dengan poll(3) untuk realtime.
     */
    public array $pollData = [
        ['no' => '01', 'ketua' => 'Nama Ketua',  'wakil' => 'Nama Wakil',  'votes' => 412, 'pct' => 42, 'color' => '#2D336B'],
        ['no' => '02', 'ketua' => 'Nama Ketua',  'wakil' => 'Nama Wakil',  'votes' => 343, 'pct' => 35, 'color' => '#7886C7'],
        ['no' => '03', 'ketua' => 'Nama Ketua',  'wakil' => 'Nama Wakil',  'votes' => 225, 'pct' => 23, 'color' => '#A9B5DF'],
    ];

    /** FUTURE: Vote::where('election_period_id', $active->id)->count() */
    public int $totalVotes = 723;

    /**
     * Data paslon untuk section kandidat.
     * FUTURE: Candidate::with('photo', 'electionPeriod')
     *           ->where('election_period_id', $activePeriod->id)
     *           ->get()
     * Pisahkan ke Livewire component <livewire:voter.candidate-cards> saat siap.
     */
    public array $candidates = [
        ['no' => '01', 'ketua' => 'Nama Ketua', 'wakil' => 'Nama Wakil', 'vision' => '"Bersama wujudkan sekolah yang inklusif, berprestasi, dan berkarakter."', 'color' => '#2D336B'],
        ['no' => '02', 'ketua' => 'Nama Ketua', 'wakil' => 'Nama Wakil', 'vision' => '"Inovasi dan kolaborasi adalah kunci kemajuan OSIS kita ke depan."',         'color' => '#7886C7'],
        ['no' => '03', 'ketua' => 'Nama Ketua', 'wakil' => 'Nama Wakil', 'vision' => '"Aspirasi seluruh siswa adalah landasan setiap langkah kami."',              'color' => '#A9B5DF'],
    ];

    /**
     * Data artikel/feed.
     * FUTURE: Article::latest()->take(4)->get()
     * Pisahkan ke <livewire:voter.article-feed :limit="4"> saat siap.
     */
    public array $articles = [
        ['category' => 'Pengumuman', 'title' => 'Jadwal Pemilihan Ketua OSIS Periode 2025/2026 Resmi Dibuka',          'excerpt' => 'Panitia pemilihan mengumumkan proses pemungutan suara berlangsung 7 hari. Seluruh siswa terdaftar wajib menggunakan hak suaranya.', 'date' => '5 Mar 2026', 'featured' => true],
        ['category' => 'Profil',     'title' => 'Mengenal Lebih Dekat Tiga Pasangan Calon Ketua & Wakil OSIS',         'excerpt' => 'Simak visi dan misi masing-masing pasangan calon.',                                                                                  'date' => '3 Mar 2026', 'featured' => false],
        ['category' => 'Panduan',    'title' => 'Cara Login dan Memberikan Suara di Sistem VOX46',                      'excerpt' => 'Panduan lengkap bagi seluruh siswa untuk menggunakan sistem pemilihan digital.',                                                      'date' => '1 Mar 2026', 'featured' => false],
        ['category' => 'Agenda',     'title' => 'Debat Terbuka Paslon Digelar di Aula Utama Besok',                    'excerpt' => 'Saksikan debat terbuka antara ketiga paslon secara langsung di aula sekolah.',                                                          'date' => '28 Feb 2026','featured' => false],
    ];
};
?>

<div>

    {{-- ══════════════════════════════════════════════════════
         NAVBAR
         ══════════════════════════════════════════════════════ --}}
    <livewire:ui.navbar />


    {{-- ══════════════════════════════════════════════════════
         SECTION 1 — HERO
         Layout ref: Zenius (teks kiri, carousel kanan)
         Bg: #2D336B
         ══════════════════════════════════════════════════════ --}}
    <section class="relative min-h-screen bg-main overflow-hidden"
             aria-label="Hero">

        {{-- Subtle diagonal line texture --}}
        <div class="absolute inset-0 pointer-events-none opacity-[0.03]"
             style="background-image:repeating-linear-gradient(-55deg,#fff 0,#fff 1px,transparent 1px,transparent 48px)">
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-10 lg:px-16
                    flex items-center min-h-screen pt-24 pb-16">
            <div class="w-full grid lg:grid-cols-2 gap-10 xl:gap-16 items-center">

                {{-- ── Kiri: copy --}}
                <div class="space-y-8 order-2 lg:order-1">

                    <div class="inline-flex items-center gap-2.5 border border-sec/40
                                px-4 py-1.5 text-xs font-semibold tracking-[0.14em] uppercase
                                text-[#A9B5DF]">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#A9B5DF] animate-pulse"></span>
                        Pemilihan OSIS · Periode 2025 / 2026
                    </div>

                    <h1 class="text-[clamp(2.8rem,6vw,5rem)] font-black leading-[1.04]
                               text-white tracking-tight"
                        style="font-family:'Playfair Display',serif;">
                        Ini Saatnya<br>
                        <em class="italic text-[#A9B5DF]">Suaramu</em><br>
                        Didengar.
                    </h1>

                    <p class="text-[#A9B5DF]/70 text-base sm:text-lg leading-relaxed max-w-md font-light">
                        Pesta demokrasi SMK Negeri 46 Jakarta telah dibuka.
                        Gunakan hak suaramu — pilih pemimpin yang akan membawa
                        sekolah kita maju bersama.
                    </p>

                    <div class="flex items-center gap-4 flex-wrap">
                        <a href="/bilik" wire:navigate
                           class="inline-flex items-center gap-3 bg-white text-main
                                  px-7 py-3.5 font-bold text-sm
                                  hover:bg-[#A9B5DF] transition-colors duration-200">
                            Pilih Sekarang
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                        <a href="#polling"
                           class="inline-flex items-center gap-2 text-sm font-medium
                                  text-white/45 hover:text-white transition-colors duration-200">
                            Lihat Quick Count
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </a>
                    </div>

                    {{-- Stats row --}}
                    <div class="flex items-center gap-8 pt-5 border-t border-white/10">
                        <div>
                            <p class="text-2xl font-black text-white">{{ number_format($totalVotes) }}</p>
                            <p class="text-xs text-sec mt-1">Suara Masuk</p>
                        </div>
                        <div class="w-px h-8 bg-white/10"></div>
                        <div>
                            <p class="text-2xl font-black text-white">{{ count($candidates) }}</p>
                            <p class="text-xs text-sec mt-1">Paslon</p>
                        </div>
                        <div class="w-px h-8 bg-white/10"></div>
                        <div>
                            <p class="text-2xl font-black text-white">7</p>
                            <p class="text-xs text-sec mt-1">Hari Tersisa</p>
                        </div>
                    </div>
                </div>

                {{-- ── Kanan: Carousel (Alpine.js) --}}
                <div class="order-1 lg:order-2"
                     x-data="{
                         cur: 0,
                         total: {{ count($slides) }},
                         captions: {{ Js::from(array_column($slides, 'caption')) }},
                         timer: null,
                         init() { this.play(); },
                         play() { this.timer = setInterval(() => this.next(), 4500); },
                         next() { this.cur = (this.cur + 1) % this.total; },
                         prev() { this.cur = (this.cur - 1 + this.total) % this.total; },
                         go(i)  { this.cur = i; clearInterval(this.timer); this.play(); }
                     }">

                    {{-- Slide wrapper --}}
                    <div class="relative aspect-4/3 bg-[#1a2060] overflow-hidden">

                        @foreach ($slides as $i => $slide)
                        <div class="carousel-slide"
                             :class="{ active: cur === {{ $i }} }">
                            @if ($slide['src'])
                                <img src="{{ $slide['src'] }}"
                                     alt="{{ $slide['caption'] }}"
                                     class="w-full h-full object-cover">
                            @else
                                {{-- Placeholder — ganti dengan <img> saat foto tersedia --}}
                                <div class="w-full h-full flex flex-col items-center justify-center gap-3">
                                    <i class="fa-regular fa-image text-5xl text-sec/20"></i>
                                    <p class="text-xs text-sec/30">{{ $slide['caption'] }}</p>
                                </div>
                            @endif
                        </div>
                        @endforeach

                        {{-- Caption --}}
                        <div class="absolute bottom-0 left-0 right-0 bg-black/55 px-5 py-2.5">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-camera text-xs text-white/45"></i>
                                <p class="text-xs text-white/65 truncate" x-text="captions[cur]"></p>
                            </div>
                        </div>

                        {{-- Controls --}}
                        <button @click="prev()" type="button" aria-label="Sebelumnya"
                                class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9
                                       bg-black/40 hover:bg-black/70 flex items-center justify-center
                                       transition-colors duration-150">
                            <i class="fa-solid fa-chevron-left text-white text-xs"></i>
                        </button>
                        <button @click="next()" type="button" aria-label="Berikutnya"
                                class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9
                                       bg-black/40 hover:bg-black/70 flex items-center justify-center
                                       transition-colors duration-150">
                            <i class="fa-solid fa-chevron-right text-white text-xs"></i>
                        </button>
                    </div>

                    {{-- Dot indicators --}}
                    <div class="flex justify-center gap-2 mt-4">
                        @foreach ($slides as $i => $_)
                        <button @click="go({{ $i }})" type="button"
                                :class="cur === {{ $i }}
                                    ? 'w-6 h-2 bg-white'
                                    : 'w-2 h-2 bg-white/30 hover:bg-white/60'"
                                class="transition-all duration-300">
                        </button>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════════════════
         SECTION 2 — QUICK COUNT / POLLING
         Layout ref: img2 (bar chart) + img3 (info cards)
         Bg: white
         ──────────────────────────────────────────────────────
         FUTURE: Ganti $pollData dengan:
           - Livewire #[Computed] + #[Reactive] dari DB query
           - Atau pisah ke <livewire:voter.poll-chart> dengan
             wire:poll="3s" untuk auto-refresh
         ══════════════════════════════════════════════════════ --}}
    <section id="polling" class="py-24 px-6 sm:px-10 lg:px-16 bg-white"
             aria-label="Quick count">
        <div class="max-w-7xl mx-auto space-y-14">

            {{-- Header --}}
            <header class="grid lg:grid-cols-2 gap-6 items-start">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-black text-blk leading-tight"
                        style="font-family:'Playfair Display',serif;">
                        Quick Count
                        <em class="italic text-sec not-italic" style="font-style:italic">Sementara</em>
                    </h2>
                    <p class="text-blk/45 text-sm mt-2">
                        Data polling periode 2025/2026 · diperbarui berkala
                    </p>
                </div>
                <div class="lg:text-right">
                    <div class="inline-flex items-center gap-2 border border-main/12
                                px-3 py-1.5 text-xs text-blk/45 mb-1">
                        <i class="fa-regular fa-calendar text-xs"></i>
                        {{ now()->translatedFormat('l, d F Y') }}
                    </div>
                    <p class="text-xs text-blk/30">
                        Total suara masuk:
                        <strong class="text-main">{{ number_format($totalVotes) }}</strong>
                        dari estimasi 850 pemilih
                    </p>
                </div>
            </header>

            {{-- Poll cards — 3 kolom bar chart --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6" id="poll-cards">
                @foreach ($pollData as $paslon)
                <div class="border border-blk/8 p-6 flex flex-col items-center
                            hover:border-main/20 transition-colors duration-200"
                     data-pct="{{ $paslon['pct'] }}"
                     data-votes="{{ $paslon['votes'] }}">

                    {{-- Percentage label --}}
                    <div class="text-center mb-3">
                        <span class="count-num text-3xl font-black"
                              style="color:{{ $paslon['color'] }}"
                              data-target="{{ $paslon['pct'] }}">0</span>
                        <span class="text-xl font-black text-blk/30">%</span>
                    </div>

                    {{-- Bar visual (grows upward) --}}
                    <div class="poll-bar-wrap w-16 bg-[#f0f2f8] mb-5" style="height:140px">
                        <div class="poll-bar-fill"
                             style="--bar-h:{{ $paslon['pct'] }}%;
                                    background-color:{{ $paslon['color'] }}">
                        </div>
                    </div>

                    <div class="w-full border-t border-blk/8 mb-5"></div>

                    {{-- Photo + badge --}}
                    <div class="relative mb-4">
                        <div class="w-28 h-20 bg-[#f0f2f8] border border-blk/8
                                    flex items-center justify-center">
                            {{-- FUTURE: <img src="{{ $paslon['photo'] }}" class="w-full h-full object-cover"> --}}
                            <i class="fa-regular fa-image text-xl text-blk/20"></i>
                        </div>

                        {{-- Nomor paslon badge — scale-in on scroll --}}
                        <div class="poll-badge absolute -top-4 -left-4
                                    w-11 h-11 rounded-full border-4 border-white shadow-md
                                    flex items-center justify-center
                                    text-white text-xs font-black"
                             style="background-color:{{ $paslon['color'] }}">
                            {{ $paslon['no'] }}
                        </div>
                    </div>

                    {{-- Name --}}
                    <p class="font-bold text-sm text-blk text-center">{{ $paslon['ketua'] }}</p>
                    <p class="text-xs text-blk/40 text-center mt-0.5">{{ $paslon['wakil'] }}</p>

                    {{-- Vote count --}}
                    <div class="mt-4 px-3 py-1 text-xs font-semibold"
                         style="background-color:{{ $paslon['color'] }}15; color:{{ $paslon['color'] }}">
                        <span class="count-num" data-target="{{ $paslon['votes'] }}">0</span> suara
                    </div>
                </div>
                @endforeach
            </div>

            <p class="text-center text-xs text-blk/25">
                * Data bersifat sementara dan tidak final.
                Hasil resmi diumumkan oleh panitia pemilihan.
            </p>
        </div>
    </section>


    {{-- ══════════════════════════════════════════════════════
         SECTION 3 — KANDIDAT
         Layout ref: img5 (Ontic cards with letter/symbol circle)
         Bg: #f7f8fc
         ──────────────────────────────────────────────────────
         FUTURE: Pisah ke <livewire:voter.candidate-cards :periodId="$activePeriod->id">
         Saat ini data statis dari $candidates.
         ══════════════════════════════════════════════════════ --}}
    <section class="py-24 px-6 sm:px-10 lg:px-16 bg-[#f7f8fc]"
             aria-label="Profil pasangan calon">
        <div class="max-w-7xl mx-auto space-y-14">

            <header class="text-center space-y-3 max-w-xl mx-auto">
                <p class="text-[10px] font-bold tracking-[0.18em] uppercase text-sec">
                    Pasangan Calon
                </p>
                <h2 class="text-3xl sm:text-4xl font-black text-blk"
                    style="font-family:'Playfair Display',serif;">
                    Kenali Pemimpin
                    <em class="italic text-main">Pilihanmu</em>
                </h2>
                <p class="text-blk/45 text-sm leading-relaxed">
                    Pelajari visi dan misi setiap paslon sebelum menggunakan hak suaramu.
                </p>
            </header>

            <div class="grid sm:grid-cols-3 gap-6">
                @foreach ($candidates as $c)
                <a href="/kandidat" wire:navigate
                   class="group flex flex-col bg-white border border-blk/8
                          hover:border-main/25 hover:shadow-md
                          transition-all duration-300">

                    {{-- Top: nomor ball --}}
                    <div class="p-8 flex flex-col items-center text-center
                                border-b border-blk/8">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center
                                    text-white text-2xl font-black mb-5
                                    group-hover:scale-105 transition-transform duration-300"
                             style="background-color:{{ $c['color'] }}">
                            {{ $c['no'] }}
                        </div>
                        <p class="font-bold text-sm text-blk">{{ $c['ketua'] }}</p>
                        <p class="text-xs text-blk/40 mt-0.5">& {{ $c['wakil'] }}</p>
                    </div>

                    {{-- Bottom: visi + link --}}
                    <div class="p-6 flex flex-col flex-1 space-y-4">
                        <blockquote class="text-sm text-blk/55 leading-relaxed
                                           italic flex-1">
                            {{ $c['vision'] }}
                        </blockquote>
                        <span class="inline-flex items-center gap-2 text-xs font-bold
                                     text-main group-hover:text-sec
                                     transition-colors duration-200">
                            Lihat profil lengkap
                            <i class="fa-solid fa-arrow-right text-[10px]
                                      group-hover:translate-x-1 transition-transform duration-200"></i>
                        </span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════════════════
         SECTION 4 — YAPPING
         Diisi oleh developer — placeholder komentar saja
         ══════════════════════════════════════════════════════ --}}
    {{--
    <section class="py-24 px-6 sm:px-10 lg:px-16 bg-white" aria-label="Tentang pemilihan">
        <div class="max-w-7xl mx-auto">
            TODO: Isi dengan konten positif tentang pemilu / website
        </div>
    </section>
    --}}


    {{-- ══════════════════════════════════════════════════════
         SECTION 5 — FEED / ARTIKEL
         Layout ref: img6 (featured besar kiri, list kanan)
         Bg: white
         ──────────────────────────────────────────────────────
         FUTURE: Pisah ke <livewire:voter.article-feed :limit="4">
         dengan lazy loading dan pagination.
         ══════════════════════════════════════════════════════ --}}
    <section class="py-24 px-6 sm:px-10 lg:px-16 bg-white"
             aria-label="Berita terkini">
        <div class="max-w-7xl mx-auto space-y-10">

            <header class="flex items-start justify-between gap-4">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-black text-blk"
                        style="font-family:'Playfair Display',serif;">
                        Berita Terkini
                    </h2>
                    <p class="text-sm text-blk/45 mt-1">
                        Informasi, panduan, dan pengumuman seputar pemilihan OSIS.
                    </p>
                </div>
                <a href="/feed" wire:navigate
                   class="shrink-0 inline-flex items-center gap-2 bg-main text-white
                          px-5 py-2.5 text-sm font-bold
                          hover:bg-sec transition-colors duration-200">
                    Lihat Semua
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </header>

            <div class="grid lg:grid-cols-[1fr_400px] gap-8">

                {{-- Featured --}}
                @php $featured = collect($articles)->firstWhere('featured', true); @endphp
                @if ($featured)
                <article class="group cursor-pointer flex flex-col">
                    <div class="aspect-[16/10] bg-[#f0f2f8] border border-blk/8
                                flex items-center justify-center overflow-hidden">
                        {{-- FUTURE: <img src="{{ $featured['image'] }}" class="w-full h-full object-cover"> --}}
                        <i class="fa-regular fa-image text-3xl text-blk/20"></i>
                    </div>
                    <div class="pt-5 space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="text-[10px] font-bold tracking-widest uppercase
                                         bg-main text-white px-2.5 py-1">
                                {{ $featured['category'] }}
                            </span>
                            <time class="text-xs text-blk/35">{{ $featured['date'] }}</time>
                        </div>
                        <h3 class="font-black text-xl text-blk leading-snug
                                   group-hover:text-main transition-colors duration-200">
                            {{ $featured['title'] }}
                        </h3>
                        <p class="text-sm text-blk/50 leading-relaxed">
                            {{ $featured['excerpt'] }}
                        </p>
                        <span class="inline-flex items-center gap-2 text-sm font-bold
                                     text-main group-hover:text-sec
                                     transition-colors duration-200">
                            Baca Selengkapnya
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </span>
                    </div>
                </article>
                @endif

                {{-- Article list --}}
                <div class="divide-y divide-blk/8">
                    @foreach (collect($articles)->where('featured', false) as $a)
                    <article class="group flex gap-4 py-5 cursor-pointer">
                        <div class="shrink-0 w-20 h-16 bg-[#f0f2f8] border border-blk/8
                                    flex items-center justify-center">
                            <i class="fa-regular fa-image text-sm text-blk/20"></i>
                        </div>
                        <div class="flex-1 min-w-0 space-y-1.5">
                            <div class="flex items-center gap-2">
                                <span class="text-[9px] font-bold tracking-widest uppercase
                                             bg-main/8 text-main px-2 py-0.5">
                                    {{ $a['category'] }}
                                </span>
                                <time class="text-[10px] text-blk/30">{{ $a['date'] }}</time>
                            </div>
                            <h3 class="text-sm font-bold text-blk leading-snug
                                       group-hover:text-main transition-colors duration-200
                                       line-clamp-2">
                                {{ $a['title'] }}
                            </h3>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════════════════
         SECTION 6 — CTA
         Layout ref: img8 (centered box, big text, single button)
         Bg: #f7f8fc, kotak overlay bg-main
         ══════════════════════════════════════════════════════ --}}
    <section class="py-20 px-6 sm:px-10 lg:px-16 bg-[#f7f8fc]"
             aria-label="Call to action">
        <div class="max-w-7xl mx-auto">
            <div class="relative overflow-hidden bg-main px-8 py-24 text-center">

                {{-- bg foto sekolah (uncomment saat tersedia) --}}
                {{-- <img src="/images/sekolah.jpg"
                     class="absolute inset-0 w-full h-full object-cover opacity-10"
                     alt=""> --}}

                <div class="absolute inset-0 opacity-[0.035]"
                     style="background-image:repeating-linear-gradient(-55deg,#fff 0,#fff 1px,transparent 1px,transparent 48px)">
                </div>

                <div class="relative z-10 space-y-6 max-w-lg mx-auto">
                    <p class="text-[10px] font-bold tracking-[0.2em] uppercase text-[#A9B5DF]/70">
                        Jangan Lewatkan
                    </p>
                    <h2 class="text-3xl sm:text-5xl font-black text-white leading-tight"
                        style="font-family:'Playfair Display',serif;">
                        Suaramu Menentukan<br>
                        <em class="italic text-[#A9B5DF]">Pemimpin Kita.</em>
                    </h2>
                    <p class="text-white/45 text-sm leading-relaxed">
                        Gunakan hak suaramu sebelum periode pemilihan berakhir.
                        Setiap suara punya bobot yang sama — termasuk suaramu.
                    </p>
                    <a href="/bilik" wire:navigate
                       class="inline-flex items-center gap-3 bg-white text-main
                              px-10 py-4 font-bold text-sm
                              hover:bg-[#A9B5DF] transition-colors duration-200">
                        Pilih Sekarang
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════════════════
         FOOTER
         Layout ref: img7 (card besar atas + quick links bawah)
         Bg: #2D336B
         ══════════════════════════════════════════════════════ --}}
    <footer class="bg-main" aria-label="Footer">

        {{-- Main card --}}
        <div class="px-6 sm:px-10 lg:px-16 pt-16">
            <div class="max-w-7xl mx-auto">
                <div class="bg-[#1e2456] border border-white/8 grid lg:grid-cols-2 overflow-hidden">

                    {{-- Kiri: brand --}}
                    <div class="p-10 border-b lg:border-b-0 lg:border-r border-white/8 flex flex-col justify-between gap-10">
                        <div class="space-y-4">
                            {{-- Logo sekolah — ganti div ini dengan <img src="..."> --}}
                            <div class="w-16 h-16 flex items-center justify-center">
                                <img img src="{{ asset('log46.png')}}" alt="Logo" />
                            </div>
                            <div>
                                <p class="text-white font-black text-lg">VOX46</p>
                                <p class="text-sec text-xs mt-0.5">SMK Negeri 46 Jakarta</p>
                            </div>
                            <p class="text-white/35 text-sm leading-relaxed max-w-xs">
                                Sistem pemilihan OSIS digital yang transparan, adil,
                                dan demokratis.
                            </p>
                        </div>
                        <p class="text-white/20 text-xs">&copy; {{ date('Y') }} SMK Negeri 46 Jakarta</p>
                    </div>

                    {{-- Kanan: form aspirasi --}}
                    {{--
                        FUTURE: Jadikan Livewire component <livewire:voter.aspiration-form>
                        dengan validasi, rate-limiting, dan store ke tabel `aspirations`.
                    --}}
                    <div class="p-10">
                        <div class="space-y-5">
                            <div>
                                <h3 class="text-white font-bold text-base">Sampaikan Aspirasimu</h3>
                                <p class="text-white/35 text-xs mt-1">
                                    Punya masukan soal pemilihan atau website ini?
                                </p>
                            </div>
                            <form class="space-y-3">
                                <input type="text" placeholder="Nama kamu"
                                       class="w-full bg-white/5 border border-white/10
                                              px-4 py-2.5 text-sm text-white placeholder-white/25
                                              focus:outline-none focus:border-[#7886C7]/50">
                                <textarea rows="3" placeholder="Tulis aspirasimu di sini..."
                                          class="w-full bg-white/5 border border-white/10
                                                 px-4 py-2.5 text-sm text-white placeholder-white/25
                                                 focus:outline-none focus:border-[#7886C7]/50
                                                 resize-none"></textarea>
                                <button type="submit"
                                        class="w-full bg-white text-main py-2.5
                                               text-sm font-bold
                                               hover:bg-[#A9B5DF] transition-colors duration-200">
                                    Kirim Aspirasi
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick links --}}

        <div class="px-6 sm:px-10 lg:px-16 py-10 mt-8 border-t border-white/8">
            <div class="max-w-7xl mx-auto grid grid-cols-2 sm:grid-cols-4 gap-8">
                <div>
                    <p class="text-white font-bold text-sm mb-4">Quick Links</p>
                    <ul class="space-y-2.5">
                        @foreach ([['Beranda','/home'],['Bilik Suara','/bilik'],['Kandidat','/kandidat'],['Berita','/feed']] as [$label,$href])
                        <li>
                            <a href="{{ $href }}" wire:navigate
                               class="text-xs text-white/40 hover:text-white transition-colors duration-150">
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <p class="text-white font-bold text-sm mb-4">Informasi</p>
                    <ul class="space-y-2.5">
                        @foreach ([['Tentang VOX46','#'],['Panduan Memilih','#'],['FAQ','#']] as [$label,$href])
                        <li>
                            <a href="{{ $href }}"
                               class="text-xs text-white/40 hover:text-white transition-colors duration-150">
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script>
    (function() {
        function runPollingAnimation() {
            document.querySelectorAll('.poll-bar-fill').forEach(bar => {
                requestAnimationFrame(() => requestAnimationFrame(() => {
                    bar.classList.add('animated');
                }));
            });

            document.querySelectorAll('.poll-badge').forEach(badge => {
                requestAnimationFrame(() => requestAnimationFrame(() => {
                    badge.classList.add('animated');
                }));
            });

            document.querySelectorAll('.count-num[data-target]').forEach(el => {
                const target = parseInt(el.dataset.target, 10);
                const dur    = 1400;
                const fps    = 60;
                const frames = Math.round(dur / (1000 / fps));
                let frame    = 0;

                const tick = setInterval(() => {
                    frame++;
                    const ease = 1 - Math.pow(1 - frame / frames, 3);
                    el.textContent = Math.round(ease * target).toLocaleString('id-ID');
                    if (frame >= frames) {
                        el.textContent = target.toLocaleString('id-ID');
                        clearInterval(tick);
                    }
                }, 1000 / fps);
            });
        }

        function initPollAnimations() {
            const container = document.getElementById('poll-cards');
            if (!container) return;

            const rect = container.getBoundingClientRect();
            if (rect.top < window.innerHeight) {
                runPollingAnimation();
                return;
            }

            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) return;
                    obs.disconnect();
                    runPollingAnimation();
                });
            }, { threshold: 0.05 });

            observer.observe(container);
        }

        // Livewire re-renders component lewat AJAX,
        // jadi script ini re-run setiap kali component di-mount
        initPollAnimations();

        // Fallback untuk SPA navigate
        document.addEventListener('livewire:navigated', initPollAnimations);
    })();
    </script>
</div>


{{-- ══════════════════════════════════════════════════════
     JAVASCRIPT — IntersectionObserver + count-up
     ══════════════════════════════════════════════════════ --}}
@push('scripts')
<script>
function runPollingAnimation() {
    document.querySelectorAll('.poll-bar-fill').forEach(bar => {
        requestAnimationFrame(() => requestAnimationFrame(() => {
            bar.classList.add('animated');
        }));
    });

    document.querySelectorAll('.poll-badge').forEach(badge => {
        requestAnimationFrame(() => requestAnimationFrame(() => {
            badge.classList.add('animated');
        }));
    });

    document.querySelectorAll('.count-num[data-target]').forEach(el => {
        const target = parseInt(el.dataset.target, 10);
        const dur    = 1400;
        const fps    = 60;
        const frames = Math.round(dur / (1000 / fps));
        let frame    = 0;

        const tick = setInterval(() => {
            frame++;
            const ease = 1 - Math.pow(1 - frame / frames, 3);
            el.textContent = Math.round(ease * target).toLocaleString('id-ID');
            if (frame >= frames) {
                el.textContent = target.toLocaleString('id-ID');
                clearInterval(tick);
            }
        }, 1000 / fps);
    });
}

function initPollAnimations() {
    const container = document.getElementById('poll-cards');
    if (!container) return;

    // Reset supaya bisa re-observe setelah navigate
    container.removeAttribute('data-observed');

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            obs.disconnect();
            runPollingAnimation();
        });
    }, { threshold: 0.05 }); // ← turunkan jadi 0.05

    observer.observe(container);
}

// Semua kemungkinan entry point
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initPollAnimations);
} else {
    // DOM sudah ready (script diload setelah DOMContentLoaded)
    initPollAnimations();
}

// Untuk Livewire SPA navigate

document.addEventListener('livewire:navigated', initPollAnimations);
</script>
@endpush
