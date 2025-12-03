@extends('layouts.app')
@section('title','Kontak Kami — Isuzu Karabha')

@section('content')
<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-6xl mx-auto px-4 lg:px-8">

        {{-- Heading --}}
        <div class="mb-8 text-center">
            <h1 class="font-poppins font-semibold text-3xl md:text-4xl text-slate-900">
                Kontak Kami
            </h1>
            <p class="mt-2 text-sm md:text-base text-slate-600 max-w-2xl mx-auto">
                Punya pertanyaan seputar produk, promo, atau ingin konsultasi armada?
                Kirimkan pesan melalui formulir di samping atau hubungi kami melalui kontak berikut.
            </p>
        </div>

        {{-- Flash success --}}
        @if(session('ok'))
            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                {{ session('ok') }}
            </div>
        @endif

        {{-- 2 Kolom: Info Card + Form --}}
        <div class="grid gap-8 lg:gap-10 md:grid-cols-2 items-start">

            {{-- ========= LEFT: CONTACT INFORMATION CARD ========= --}}
            <div
                class="relative overflow-hidden rounded-3xl bg-[#CA1F26] text-white
                       px-6 py-8 md:px-8 md:py-10 flex flex-col gap-8">

                {{-- Dekorasi blob --}}
                <div class="pointer-events-none absolute -bottom-24 -right-10 h-56 w-56 rounded-full bg-white/5"></div>
                <div class="pointer-events-none absolute -bottom-10 right-16 h-40 w-40 rounded-full bg-white/10"></div>

                <div class="relative z-10">
                    <h2 class="font-poppins font-semibold text-2xl md:text-3xl mb-3">
                        Contact Information
                    </h2>
                    <p class="text-xs md:text-sm text-white/80 leading-relaxed max-w-md">
                        Bila Anda memiliki pertanyaan atau membutuhkan penawaran,
                        Anda dapat menghubungi sales kami melalui informasi kontak di bawah
                        atau mengisi formulir di sebelah kanan.
                    </p>
                </div>

                {{-- Sales Profile (foto sales) --}}
                <div class="relative z-10 flex items-center gap-4 md:gap-5">
                    {{-- frame square 1:1, lebih besar --}}
                    <div class="w-24 h-24 md:w-28 md:h-28 rounded-2xl overflow-hidden border-2 border-white/70">
                        <img
                            src="{{ asset('images/hani-nurul.jpeg') }}"
                            alt="Sales Isuzu"
                            class="w-full h-full object-cover"
                        >
                    </div>
                    <div>
                        <p class="font-poppins font-semibold text-sm md:text-base">
                            Nurul Hanifah
                        </p>
                        <p class="text-xs md:text-sm text-white/80">
                            Sales
                        </p>
                    </div>
                </div>

                {{-- List Contact --}}
                <div class="relative z-10 space-y-5 md:space-y-6 text-sm md:text-base">

                    {{-- Telepon --}}
                    <div class="flex items-start gap-3">
                        <div
                            class="mt-0.5 flex h-9 w-9 items-center justify-center rounded-full
                                   bg-white/10 border border-white/30">
                            {{-- icon phone --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 0 0 2.25-2.25v-1.17a1.5 1.5 0 0 0-.97-1.4l-3.03-1.21a1.5 1.5 0 0 0-1.64.36l-.72.72a1.5 1.5 0 0 1-1.9.24 12.04 12.04 0 0 1-4.53-4.53 1.5 1.5 0 0 1 .24-1.9l.72-.72a1.5 1.5 0 0 0 .36-1.64l-1.21-3.03a1.5 1.5 0 0 0-1.4-.97H4.5A2.25 2.25 0 0 0 2.25 6.75z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-poppins">0896-3912-6343</p>
                            <p class="text-xs text-white/70 mt-0.5">Tersedia via WhatsApp & Telepon</p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="flex items-start gap-3">
                        <div
                            class="mt-0.5 flex h-9 w-9 items-center justify-center rounded-full
                                   bg-white/10 border border-white/30">
                            {{-- icon mail --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 8.25l8.22 4.93a1.5 1.5 0 0 0 1.56 0L21 8.25M4.5 5.25h15A1.5 1.5 0 0 1 21 6.75v10.5A1.5 1.5 0 0 1 19.5 18.75h-15A1.5 1.5 0 0 1 3 17.25V6.75A1.5 1.5 0 0 1 4.5 5.25z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-poppins">hello@isuzukarabha.co.id</p>
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div class="flex items-start gap-3">
                        <div
                            class="mt-0.5 flex h-9 w-9 items-center justify-center rounded-full
                                   bg-white/10 border border-white/30">
                            {{-- icon location --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 21.75s7.5-4.5 7.5-11.25A7.5 7.5 0 0 0 4.5 10.5C4.5 17.25 12 21.75 12 21.75z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 12.75a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5z"/>
                            </svg>
                        </div>
                        <div class="text-xs md:text-sm text-white/90 leading-relaxed">
                            Jl. Perintis Kemerdekaan No.39, RT.1/RW.1, Pulo Gadung, <br>
                            Kec. Pulo Gadung, Kota Jakarta Timur, <br>
                            Daerah Khusus Ibukota Jakarta |13260.
                        </div>
                    </div>

                </div>
            </div>

            {{-- ========= RIGHT: CONTACT FORM ========= --}}
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 px-6 py-7 md:px-8 md:py-8">
                <form method="post" action="{{ route('contact.submit') }}" class="space-y-5">
                    @csrf

                    {{-- 1 field per baris --}}
                    <div>
                        <label class="block text-xs font-medium text-slate-700 uppercase tracking-wide">
                            Nama <span class="text-red-500">*</span>
                        </label>
                        <input
                            name="name"
                            value="{{ old('name') }}"
                            required
                            class="mt-1 w-full rounded-2xl border border-slate-300 px-3 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-[#DD2A2A]/40 focus:border-[#DD2A2A]"
                        >
                        @error('name')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-700 uppercase tracking-wide">
                            Email
                        </label>
                        <input
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            class="mt-1 w-full rounded-2xl border border-slate-300 px-3 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-[#DD2A2A]/40 focus:border-[#DD2A2A]"
                        >
                        @error('email')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-700 uppercase tracking-wide">
                            No. HP
                        </label>
                        <input
                            name="phone"
                            value="{{ old('phone') }}"
                            class="mt-1 w-full rounded-2xl border border-slate-300 px-3 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-[#DD2A2A]/40 focus:border-[#DD2A2A]"
                        >
                        @error('phone')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-700 uppercase tracking-wide">
                            Subjek
                        </label>
                        <input
                            name="subject"
                            value="{{ old('subject') }}"
                            class="mt-1 w-full rounded-2xl border border-slate-300 px-3 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-[#DD2A2A]/40 focus:border-[#DD2A2A]"
                        >
                        @error('subject')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-700 uppercase tracking-wide">
                            Pesan <span class="text-red-500">*</span>
                        </label>
                        <textarea
                            name="message"
                            rows="6"
                            required
                            class="mt-1 w-full rounded-2xl border border-slate-300 px-3 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-[#DD2A2A]/40 focus:border-[#DD2A2A] resize-y"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol submit --}}
                    <div class="pt-2">
                        <button
                            class="inline-flex w-full items-center justify-center rounded-full
                                   bg-emerald-800 px-6 py-3 text-sm font-semibold text-white
                                   shadow-sm hover:bg-emerald-600 active:scale-[0.99]
                                   transition-transform"
                        >
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
