<footer id="kontak" class="relative">

    {{-- ===== TOP BAR: WHATSAPP CTA ===== --}}
    <div class="relative min-h-[80px] sm:min-h-[90px] lg:min-h-[99px]">
    <div class="absolute inset-0 flex flex-col sm:flex-row">

        {{-- Bagian merah --}}
        <div class="bg-[#DD2A2A] flex-1 flex items-center py-4 sm:py-0">
            <div class="w-full max-w-2xl mx-auto px-4 sm:px-6 lg:px-12">
                <div class="flex items-center gap-3 sm:gap-4 md:gap-6">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-white rounded-full flex items-center justify-center flex-shrink-0">
                        <img
                            src="{{ asset('images/logo-wa.png') }}"
                            alt="WhatsApp"
                            class="w-7 h-7 sm:w-8 sm:h-8 md:w-9 md:h-9 object-contain"
                        />
                    </div>

                    <div class="min-w-0">
                        <h3 class="font-poppins font-semibold text-lg sm:text-xl md:text-2xl lg:text-3xl text-white uppercase leading-tight">
                            Hubungi Kami!
                        </h3>
                        <p class="font-poppins text-xs sm:text-sm md:text-base lg:text-lg text-black capitalize truncate">
                            Untuk pertanyaan lebih lanjut
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bagian hitam --}}
        <div class="bg-black w-full sm:w-[240px] md:w-[300px] lg:w-[360px] xl:w-[521px] flex items-center justify-center py-4 sm:py-0">
            <a
                href="https://wa.me/6289639126343"
                target="_blank"
                rel="noopener"
                class="bg-[#60D669] hover:bg-[#50C659] text-white px-4 sm:px-5 md:px-6 lg:px-7 py-2.5 sm:py-3 md:py-3.5 rounded-lg
                       font-poppins font-semibold flex items-center gap-2 sm:gap-3
                       transition-all hover:scale-105 active:scale-95"
            >
                <img
                    src="{{ asset('images/wa-white.png') }}"
                    alt="WhatsApp"
                    class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7 object-contain"
                />
                <span class="text-xs sm:text-sm md:text-base whitespace-nowrap">
                    Hubungi Sekarang
                </span>
            </a>
        </div>

    </div>
</div>

    {{-- ===== MAIN FOOTER ===== --}}
    <div class="bg-[#191F23] py-16 pt-20 sm:pt-16">
        <div class="max-w-6xl mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-16">

                {{-- Company Info --}}
                <div>
                    <img
                        src="{{ asset('images/logo-putih.png') }}"
                        alt="Isuzu Karabha"
                        class="h-16 mb-6 object-contain"
                    />
                    <p class="font-poppins text-[11px] md:text-sm text-white/80 capitalize leading-relaxed">
                        Untuk info promo, diskon, cashback, cicilan, kredit, DP ringan, dan harga mobil Isuzu terbaru
                        atau penawaran menarik lainnya, hubungi kontak yang tersedia.
                    </p>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h3 class="font-poppins font-semibold text-xl md:text-2xl text-white capitalize mb-3">
                        Quick Links
                    </h3>
                    <div class="w-[102px] h-0.5 bg-[#DD2A2A] mb-6"></div>

                    <ul class="space-y-2 font-poppins text-sm md:text-base text-white capitalize">
                        <li class="flex items-start">
                            <span class="mr-2">•</span>
                            <a href="#beranda" class="hover:text-[#DD2A2A] transition-colors">Beranda</a>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">•</span>
                            <a href="#promo" class="hover:text-[#DD2A2A] transition-colors">Promo</a>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">•</span>
                            <a href="#produk" class="hover:text-[#DD2A2A] transition-colors">Produk</a>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">•</span>
                            <a href="#galeri" class="hover:text-[#DD2A2A] transition-colors">Galeri</a>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">•</span>
                            <a href="#artikel" class="hover:text-[#DD2A2A] transition-colors">Artikel</a>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">•</span>
                            <a href="#kontak" class="hover:text-[#DD2A2A] transition-colors">Kontak Kami</a>
                        </li>
                    </ul>
                </div>

                {{-- Address --}}
                <div>
                    <h3 class="font-poppins font-semibold text-xl md:text-2xl text-white capitalize mb-3">
                        Alamat
                    </h3>
                    <div class="w-[77px] h-0.5 bg-[#DD2A2A] mb-6"></div>
                    <p class="font-poppins text-[11px] md:text-sm text-white/80 capitalize leading-relaxed">
                        Jl. Perintis Kemerdekaan No.39, RT.1/RW.1, Pulo Gadung, Kec. Pulo Gadung,
                        Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13260
                    </p>
                </div>

                {{-- Contact --}}
                <div>
                    <h3 class="font-poppins font-semibold text-xl md:text-2xl text-white capitalize mb-3">
                        Kontak Kami
                    </h3>
                    <div class="w-[131px] h-0.5 bg-[#DD2A2A] mb-6"></div>

                    <div class="space-y-3 text-white/80">

                        {{-- WhatsApp --}}
                        <div class="flex items-center gap-3">
                            <img 
                                src="{{ asset('images/wa-white.png') }}"
                                alt="WhatsApp"
                                class="w-5 h-5 md:w-6 md:h-6"
                            />
                            <p class="font-poppins text-[11px] md:text-sm capitalize whitespace-nowrap">
                                089639126343 — (24/7 Consultation)
                            </p>
                        </div>

                        {{-- Instagram --}}
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/instagram-white.png') }}" alt="Instagram" class="w-5 h-5 md:w-6 md:h-6">
                            <p class="font-poppins text-[11px] md:text-sm lowercase">
                                isuzusalesjakarta
                            </p>
                        </div>

                        {{-- TikTok --}}
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/tiktok-white.png') }}" alt="TikTok" class="w-5 h-5 md:w-6 md:h-6">
                            <p class="font-poppins text-[11px] md:text-sm lowercase">
                                hanhanite
                            </p>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/gmail-white.png') }}" alt="Email" class="w-5 h-5 md:w-6 md:h-6">
                            <p class="font-poppins text-[11px] md:text-sm lowercase">
                                email@example.com
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ===== BOTTOM COPYRIGHT STRIP ===== --}}
    <div class="relative h-[99px]">
        <img
            src="{{ asset('images/footer.png') }}"
            alt="Footer Background"
            class="absolute inset-0 w-full h-full object-cover"
        />
        <div class="absolute inset-0 flex items-center px-6 lg:px-12">
            <p class="font-[Inter] text-xs md:text-sm text-white">
                <span>© {{ now()->year }} </span>
                <span class="font-semibold">Isuzu Sales Jakarta </span>
                <span class="font-medium">Support By PT. </span>
                <span class="font-semibold">Karabha Perkasa Jakarta Timur. </span>
                <span class="font-bold">All rights reserved.</span>
            </p>
        </div>
    </div>

</footer>
