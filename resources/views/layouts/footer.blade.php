<footer id="kontak" class="relative">

    {{-- ===== TOP BAR: WHATSAPP CTA ===== --}}
    <div class="relative h-[99px]">
        <div class="absolute inset-0 flex">

            {{-- Bagian merah (dirapikan pakai container max-w-6xl supaya sejajar dengan logo putih) --}}
            <div class="bg-[#DD2A2A] flex-1 flex items-center">
                <div class="w-full max-w-4xl mx-auto px-6 lg:px-12">
                    <div class="flex items-center gap-4 md:gap-6">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
                            {{-- Bisa ganti PNG / SVG WA di sini --}}
                            <img
                                src="{{ asset('images/logo-wa.png') }}"
                                alt="WhatsApp"
                                class="w-9 h-9 object-contain"
                            />
                        </div>

                        <div>
                            <h3 class="font-poppins font-semibold text-2xl md:text-3xl text-white uppercase leading-tight">
                                Hubungi Kami!
                            </h3>
                            <p class="font-poppins text-base md:text-lg text-black capitalize">
                                Untuk pertanyaan lebih lanjut
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bagian hitam (tetap) --}}
            <div class="bg-black w-[260px] md:w-[360px] lg:w-[521px] flex items-center justify-center">
                <a
                    href="https://wa.me/6289639126343"
                    target="_blank"
                    rel="noopener"
                    class="bg-[#60D669] hover:bg-[#50C659] text-white px-5 md:px-7 py-3 md:py-3.5 rounded-lg
                           font-poppins font-semibold flex items-center gap-3
                           transition-all hover:scale-105 active:scale-95"
                >
                    {{-- Icon WA kecil --}}
                    <img
                        src="{{ asset('images/wa-white.png') }}"
                        alt="WhatsApp"
                        class="w-6 h-6 md:w-7 md:h-7 object-contain"
                    />
                    <span class="text-sm md:text-base">
                        Hubungi Sekarang
                    </span>
                </a>
            </div>

        </div>
    </div>

    {{-- ===== MAIN FOOTER ===== --}}
    <div class="bg-[#191F23] py-16">
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
                            <a href="" class="hover:text-[#DD2A2A] transition-colors">Beranda</a>
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

                    <div class="space-y-5 text-white/80">

                        {{-- WhatsApp --}}
                        <div class="flex items-center gap-4">
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
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('images/instagram-white.png') }}" alt="Instagram" class="w-5 h-5 md:w-6 md:h-6">
                            <p class="font-poppins text-[11px] md:text-sm lowercase">
                                isuzusalesjakarta
                            </p>
                        </div>

                        {{-- TikTok --}}
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('images/tiktok-white.png') }}" alt="TikTok" class="w-5 h-5 md:w-6 md:h-6">
                            <p class="font-poppins text-[11px] md:text-sm lowercase">
                                hanhanite
                            </p>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-center gap-4">
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
