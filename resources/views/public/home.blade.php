@extends('layouts.app')
@section('title', 'Beranda — Isuzu Karabha')

@section('content')
    @php
        // bikin koleksi slide, tiap slide berisi 2 promo
        $promoSlides = $promos->chunk(2);
    @endphp

    {{-- ===== HERO FULL-BLEED ===== --}}
    <div class="relative w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]">
        <section id="beranda"
            class="relative isolate flex flex-col items-center text-center gap-4
                  bg-no-repeat bg-cover bg-center
                  min-h-[640px] md:min-h-[720px] lg:min-h-[860px] xl:min-h-[969px]"
            style="background-image:url('{{ asset('images/isuzu-image.jpg') }}')"
            aria-label="Isuzu Jakarta dealer showcase with vehicles">

            {{-- konten --}}
            <div
                class="relative z-[1] w-full max-w-[1462px] mx-auto
                px-4 sm:px-6 lg:px-8
                pt-24 md:pt-32 lg:pt-40 xl:pt-[393px]
                pb-16 md:pb-24 lg:pb-28 xl:pb-[393px]">

                <div class="mx-auto max-w-[820px] font-poppins" data-animate>
                    <p class="text-[11px] md:text-xs tracking-[0.18em] text-[#DB3831] font-semibold">
                        SELAMAT DATANG DI DEALER RESMI ISUZU INDONESIA
                    </p>

                    <h1
                        class="mt-2 font-bebas text-[#C53A31] leading-none
                   text-[44px] md:text-[56px] lg:text-[64px] xl:text-[72px]">
                        ISUZU JAKARTA
                    </h1>

                    <p class="mt-2 text-neutral-700 text-[14px] md:text-[16px]">Real Partner, Real Journey</p>

                    <div class="mt-4 flex flex-wrap items-center justify-center gap-3">
                        {{-- smooth scroll ke section profil --}}
                        <a href="#profil" data-scroll-to="profil" class="btn-outline px-8 py-2.5">Profil Kami</a>
                        {{-- route ke halaman kontak --}}
                        <a href="{{ route('contact.show') }}" class="btn-solid px-8 py-2.5">Kontak Kami</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- ===== PROFIL (target scroll) ===== --}}
    {{-- ===== TENTANG KAMI / PROFIL ===== --}}
    <section id="profil" class="py-20 relative">
        <div class="max-w-6xl mx-auto px-4">

            {{-- heading + kartu video --}}
            <div class="flex flex-col lg:flex-row gap-10 lg:gap-14 items-start">
                {{-- judul kiri --}}
                <div class="flex flex-col gap-3 shrink-0 font-poppins" data-animate>
                    <p class="text-[#BB0000] text-sm md:text-base font-semibold tracking-[0.12em]">
                        TENTANG KAMI
                    </p>
                    <p class="text-3xl md:text-4xl lg:text-5xl font-black leading-tight">
                        <span class="text-[#DB3831]">Dari Jepang </span>
                    </p>
                    <p class="text-3xl md:text-4xl lg:text-5xl font-black leading-tight">
                        <span class="text-black">Untuk Dunia</span>
                    </p>
                </div>

                {{-- kartu video kanan --}}
                <div class="relative flex-1 group" data-animate>
                    <div
                        class="relative bg-neutral-50 rounded-tl-[100px] rounded-br-[100px]
                 shadow-lg overflow-hidden border-[4px] border-[#BE1D1D]">
                        <img src="{{ asset('images/isuzu-banner.jpg') }}" alt="Video profil Isuzu ELF"
                            class="w-full h-[260px] md:h-[360px] lg:h-[440px] object-cover
                   transition-transform duration-300 group-hover:scale-105" />

                        {{-- overlay + tombol play --}}
                        <button type="button" data-open-video
                            class="absolute inset-0 flex items-center justify-center bg-black/10
                         opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span
                                class="bg-[#D01313] rounded-full p-5 md:p-6 border-4 border-white shadow-xl
                     transition-transform hover:scale-110 active:scale-90">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-8 h-8 md:w-10 md:h-10 text-white fill-white" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- paragraf penjelasan --}}
            <div class="mt-10 md:mt-14 font-poppins text-sm md:text-base text-black
             leading-relaxed space-y-4 max-w-8xl"
                data-animate>
                <p>
                    Isuzu dikembangkan pertama kali dengan memproduksi mesin diesel berpendingin pertama di Jepang
                    pada tahun 1937. Mesin ini menorehkan sejarah pengembangan mesin diesel di Negeri Sakura.
                </p>
                <p>
                    Sudah lebih dari 80 tahun Isuzu memproduksi kendaraan komersial tingkat dunia dan menjadi nomor
                    1 di 34 negara. Itu semua membuktikan bahwa Isuzu unggul dalam inovasi dan menjadi terdepan di
                    industri otomotif abad 21.
                </p>
                <p>
                    Tidak hanya sebagai produsen kendaraan komersial, Isuzu juga dikenal sebagai produsen mesin
                    diesel terkemuka di dunia. Banyak perusahaan di seluruh dunia memilih mesin diesel Isuzu sebagai
                    mitra mereka, karena mereka percaya mesin diesel Isuzu merupakan kombinasi dari kekuatan,
                    kinerja, dan keandalan.
                </p>
            </div>
        </div>
        {{-- ===== MODAL VIDEO YOUTUBE ===== --}}
        <div id="video-modal" class="absolute inset-0 z-50 hidden items-center justify-center bg-black/60">
            <div class="relative w-full max-w-3xl mx-4 aspect-video bg-black rounded-xl overflow-hidden">
                <button type="button" class="absolute -top-10 right-0 text-white text-2xl" data-close-video>
                    &times;
                </button>
                <iframe id="video-iframe" src="" class="w-full h-full" title="Video Profil Isuzu" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    {{-- ===== SECTION: ISUZU JAKARTA + TRUCK FULL-BLEED ===== --}}
    <div class="relative w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]">
        {{-- blok merah --}}
        <section id="service" class="bg-[#DD2A2A] text-white">
            <div
                class="max-w-6xl mx-auto px-6
             pt-14 pb-20 md:pt-16 md:pb-24
             flex flex-col items-center">
                {{-- Judul & deskripsi (di-convert dari versi React) --}}
                <div class="text-center text-white mb-10 md:mb-12 font-poppins" data-animate>
                    <h2 class="font-bebas text-4xl md:text-5xl mb-3 tracking-[0.12em]">
                        ISUZU JAKARTA
                    </h2>
                    <p class="text-sm md:text-base lg:text-lg max-w-8xl mx-auto mb-2">
                        Selamat datang di PT. Karaba Isuzu Jakarta, Dealer Resmi Isuzu Jakarta
                        yang berlokasi di Jl. Perintis Kemerdekaan No.39, Pulo Gadung, Jakarta Timur.
                    </p>
                    <p class="text-sm md:text-base lg:text-lg max-w-8xl mx-auto mb-2">
                        Kami hadir untuk memberikan solusi terbaik bagi kebutuhan kendaraan Isuzu Anda dari mobil niaga
                        tangguh hingga kendaraan pribadi yang efisien dan nyaman.
                    </p>
                    <p class="text-sm md:text-base lg:text-lg">
                        Dan Mengapa Anda Harus Memilih Kami?
                    </p>
                </div>

                {{-- 3 kartu service --}}
                <div class="grid md:grid-cols-3 gap-8 max-w-6xl w-full mx-auto mb-4">
                    {{-- Card 1: BEST SERVICE --}}
                    <div data-animate
                        class="bg-white rounded-2xl p-8 text-center
                 shadow-md hover:shadow-2xl
                 transition-all hover:-translate-y-2 cursor-pointer">
                        <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center">
                            <span
                                class="inline-flex items-center justify-center w-11 h-11 rounded-full border-2 border-[#C10000]">
                                <svg class="w-5 h-5 text-[#C10000]" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <h3 class="font-poppins font-semibold text-lg md:text-xl text-gray-900 mb-3">
                            BEST SERVICE
                        </h3>
                        <p class="font-poppins text-xs md:text-sm text-black leading-relaxed">
                            Kepuasan Anda adalah prioritas utama kami. Dengan pengalaman dan dedikasi tinggi,
                            tim kami selalu berusaha memberikan pelayanan terbaik.
                        </p>
                    </div>

                    {{-- Card 2: EXPERIENCED SALES --}}
                    <div data-animate
                        class="bg-white rounded-2xl p-8 text-center
                 shadow-md hover:shadow-2xl
                 transition-all hover:-translate-y-2 cursor-pointer"
                        style="animation-delay:0.1s">
                        <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center">
                            <span
                                class="inline-flex items-center justify-center w-11 h-11 rounded-full border-2 border-[#C10000]">
                                <svg class="w-5 h-5 text-[#C10000]" viewBox="0 0 24 24" fill="none">
                                    <rect x="4" y="7" width="16" height="10" stroke="currentColor"
                                        stroke-width="2" />
                                    <path d="M8 11h4" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </span>
                        </div>
                        <h3 class="font-poppins font-semibold text-lg md:text-xl text-gray-900 mb-3">
                            EXPERIENCED SALES
                        </h3>
                        <p class="font-poppins text-xs md:text-sm text-black leading-relaxed">
                            Kami percaya, memilih tidak cukup hanya melihat harga. Karenanya, kami siap
                            mendampingi Anda menjelajahi setiap detail produk Isuzu dengan jelas.
                        </p>
                    </div>

                    {{-- Card 3: 24/7 CONSULTATION --}}
                    <div data-animate
                        class="bg-white rounded-2xl p-8 text-center
                 shadow-md hover:shadow-2xl
                 transition-all hover:-translate-y-2 cursor-pointer"
                        style="animation-delay:0.2s">
                        <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center">
                            <span
                                class="inline-flex items-center justify-center w-11 h-11 rounded-full border-2 border-[#C10000]">
                                <svg class="w-5 h-5 text-[#C10000]" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                                    <path d="M12 7v5l3 3" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <h3 class="font-poppins font-semibold text-lg md:text-xl text-gray-900 mb-3">
                            24/7 CONSULTATION
                        </h3>
                        <p class="font-poppins text-xs md:text-sm text-black leading-relaxed">
                            Kami siap menjadi konsultan otomotif pribadi Anda. Tim profesional kami
                            siap membantu kapan pun Anda butuh saran maupun solusi setiap waktu.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- gambar truk nempel full-lebar di bawah blok merah --}}
        <div class="-mt-10 md:-mt-16 lg:-mt-20 bg-white">
            <img src="{{ asset('images/isuzu-all.png') }}" alt="Lini kendaraan Isuzu"
                class="w-full h-auto object-cover" />
        </div>
    </div>


    {{-- ===== PROMO SECTION (2 promo per slide) ===== --}}
    <section id="promo" class="py-20 bg-white">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-12">

            {{-- Heading --}}
            <div class="text-center mb-12" data-animate>
                <h2 class="font-poppins font-black text-4xl md:text-4xl mb-4">
                    <span class="text-[#DB3831]">PROMO </span>
                    <span class="text-black">TERBARU </span>
                    <span class="text-[#DB3831]">DARI </span>
                    <span class="text-black">ISUZU </span>
                    <span class="text-[#D01313]">INDONESIA</span>
                </h2>

                <p class="font-poppins text-lg md:text-xl text-black max-w-6xl mx-auto">
                    Dapatkan penawaran spesial bulan ini! Nikmati diskon, bonus menarik,
                    dan promo pembelian ringan untuk berbagai tipe Isuzu favorit Anda.
                </p>
            </div>

            {{-- WRAPPER UTAMA (card putih gede, seperti Figma) --}}
            <div class="relative max-w-6xl mx-auto" data-animate>
                <div class="overflow-hidden">
                    {{-- TRACK yang digerakkan JS --}}
                    <div id="promo-carousel"
                        class="flex transition-transform duration-500 ease-in-out select-none cursor-grab active:cursor-grabbing">

                        {{-- SETIAP SLIDE = 2 gambar promo --}}
                        @foreach ($promoSlides as $slide)
                            <div data-promo-slide class="min-w-full flex items-center justify-center gap-6 px-10 py-8">

                                @foreach ($slide as $p)
                                    <div class="w-1/2 max-w-8xl aspect-square rounded-2xl overflow-hidden shadow-md">
                                        <img src="{{ $p['thumbnail'] ? asset('storage/' . $p['thumbnail']) : asset('images/placeholder-1x1.png') }}"
                                            alt="Promo: {{ $p['title'] }}" class="w-full h-full object-cover" />
                                    </div>
                                @endforeach

                                {{-- kalau jumlah promo ganjil, isi slot kedua transparan supaya layout tetap --}}
                                @if ($slide->count() === 1)
                                    <div class="w-1/2 max-w-[430px] aspect-square rounded-2xl"></div>
                                @endif
                            </div>
                        @endforeach

                    </div>
                </div>

                {{-- DOT INDICATOR: jumlahnya = jumlah slide --}}
                <div class="flex justify-center gap-2 mt-6">
                    @foreach ($promoSlides as $i => $slide)
                        <button data-indicator
                            class="h-3 rounded-full transition-all duration-300
                         {{ $i === 0 ? 'w-8 bg-[#dd2a2a]' : 'w-3 bg-[#b2b2b2] hover:bg-[#dd2a2a]/50' }}">
                        </button>
                    @endforeach
                </div>

                {{-- CTA BUTTON --}}
                <div class="text-center mt-10">
                    <a href="{{ route('promos.index') }}"
                        class="inline-flex items-center justify-center
                  bg-[#DD2A2A] text-white px-8 py-4 rounded-full font-semibold
                  font-poppins text-sm shadow-lg
                  hover:bg-[#C01111] transition-all hover:scale-105 active:scale-95">
                        Ketuk Untuk Promo Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== PRODUK ===== --}}
    <section id="produk" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            {{-- Heading --}}
            <div class="text-center mb-12" data-animate>
                <h2 class=" font-extrabold font-poppins font-black text-4xl md:text-4xl mb-4">
                    <span class="text-[#DB3831]">PRODUK </span>
                    <span class="text-black">KAMI</span>
                </h2>
                <p class="font-poppins text-sm md:text-lg text-black max-w-8xl mx-auto">
                    Temukan beragam pilihan kendaraan Isuzu dengan performa tangguh dan kualitas terbaik
                    untuk kebutuhan bisnis maupun pribadi Anda.
                </p>
            </div>

            {{-- Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach ($products as $i => $pr)
                    @php
                        // delay animasi kecil2 biar berasa stagger kaya di React
                        $delay = $i * 0.05;
                    @endphp
                    <div data-animate style="animation-delay: {{ $delay }}s"
                        class="bg-white rounded-3xl overflow-hidden shadow-lg
                 hover:shadow-2xl transition-all hover:-translate-y-2
                 cursor-pointer group">
                        <div class="relative overflow-hidden h-64">
                            <img src="{{ asset('storage/' . $pr->image) }}" alt="{{ $pr->name }}"
                                class="w-full h-full object-cover
                     transition-transform duration-300 group-hover:scale-110" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent
                     opacity-0 group-hover:opacity-100
                     transition-opacity duration-300">
                            </div>
                        </div>

                        <div class="p-6 text-center">
                            <h3 class="font-poppins font-semibold text-xl text-gray-900 mb-2">
                                {{ $pr->name }}
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Button bawah (jarak seimbang dari atas–bawah) --}}
            <div class="text-center mt-12" data-animate>
                <a href="{{ route('products.index') }}" {{-- kalau belum ada route ini, sementara ganti '#' --}}
                    class="inline-flex items-center justify-center
               bg-[#DD2A2A] text-white px-8 md:px-10 py-3.5 md:py-4
               rounded-full font-poppins font-semibold text-xs md:text-base
               shadow-lg hover:bg-[#C01111]
               transition-all hover:scale-105 active:scale-95">
                    Ketuk Untuk Informasi Produk Lainnya
                </a>
            </div>
        </div>
    </section>



   {{-- Artikel --}}
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        {{-- Heading --}}
        <div class="text-center mb-12" data-animate>
            <p class="font-poppins font-semibold text-[#dd2a2a] mb-2">ARTIKEL</p>
            <h2 class="font-poppins font-bold text-4xl text-gray-900 mb-4">Berita & Artikel Terbaru</h2>
        </div>

        {{-- GRID --}}
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($articles as $i => $a)
            <div 
                data-animate 
                style="animation-delay: {{ $i * 0.1 }}s"
                class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2 cursor-pointer"
            >
                <img src="{{ asset('storage/'.$a->thumbnail) }}" alt="{{ $a->title }}" class="w-full h-48 object-cover">

                <div class="p-6">
                    <p class="font-poppins text-xs md:text-sm text-gray-500 mb-2 text-right">
                        {{ $a->created_at?->format('d M Y') }}
                    </p>

                    <h3 class="font-poppins font-semibold text-lg text-gray-900 mb-3">
                        {{ $a->title }}
                    </h3>

                    <p class="font-poppins text-sm text-gray-600 mb-4 line-clamp-2">
                        {{ $a->excerpt }}
                    </p>

                    <a href="{{ route('articles.show', $a->slug) }}"
                       class="text-[#dd2a2a] font-poppins font-semibold text-sm hover:text-[#c01111] transition-colors text-right block">
                       Baca Selengkapnya →
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- CTA BUTTON: Lihat Semua Artikel --}}
        <div class="text-center mt-12" data-animate>
            <a href="{{ route('articles.index') }}"
               class="inline-flex items-center justify-center
                      bg-[#dd2a2a] text-white px-12 py-4 rounded-full
                      font-poppins font-semibold text-sm shadow-lg
                      hover:bg-[#c01111] transition-all hover:scale-105 active:scale-95">
                Ketuk Untuk Melihat Artikel Lainnya
            </a>
        </div>

    </div>
</section>


@endsection
