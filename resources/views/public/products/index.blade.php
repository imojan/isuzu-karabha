@extends('layouts.app')
@section('title','Produk — Isuzu Karabha')
@section('content')

  {{-- ===== HERO FULL-BLEED ===== --}}
  <div class="relative w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]">
    <section id="beranda"
            class="relative isolate flex flex-col items-center text-center gap-4
                    bg-no-repeat bg-cover bg-center
                    min-h-[640px] md:min-h-[720px] lg:min-h-[860px] xl:min-h-[969px]"
            style="background-image:url('{{ asset('images/isuzu-contoh.jpg') }}')"
            aria-label="Isuzu Jakarta dealer showcase with vehicles">
        </div>
      </div>
    </section>
  </div>
  <div class="flex items-center justify-between mb-6">
    <form method="get" class="relative">
      <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari uni@extends('layouts.app')
@section('title','Produk — Isuzu Karabha')

@section('content')

  {{-- ===== HERO FULL-BLEED (HEADER PRODUK) ===== --}}
  <div class="relative w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]">
    <section
      class="relative isolate flex items-center
             bg-no-repeat bg-cover bg-center
             min-h-[260px] md:min-h-[320px]"
      style="background-image:url('{{ asset('images/isuzu-contoh.jpg') }}')"
      aria-label="Daftar produk Isuzu"
    >
      <div class="absolute inset-0 bg-black/40"></div>

      <div class="relative z-[1] w-full max-w-6xl mx-auto px-6 lg:px-12 py-10 md:py-14">
        <div class="font-poppins text-left text-white max-w-xl" data-animate>
          <p class="text-xs md:text-sm tracking-[0.18em] uppercase text-white">
            Produk Isuzu Karabha
          </p>
          <h1 class="mt-2 text-3xl md:text-4xl lg:text-5xl font-black leading-tight">
            Pilihan Kendaraan <span class="text-[#DB3831]">Tangguh</span> untuk Bisnis & Pribadi
          </h1>
          <p class="mt-3 text-sm md:text-base text-white/90">
            Temukan berbagai tipe kendaraan Isuzu dengan performa handal dan efisiensi terbaik sesuai kebutuhan Anda.
          </p>
        </div>
      </div>
    </section>
  </div>

  {{-- ===== SECTION: LIST PRODUK ===== --}}
  <section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">

      {{-- Heading + Search --}}
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-10">
        <div class="text-left" data-animate>
          <h2 class="font-poppins font-black text-3xl md:text-4xl mb-2">
            <span class="text-[#DB3831]">PRODUK </span>
            <span class="text-black">ISUZU</span>
          </h2>
          <p class="font-poppins text-sm md:text-base text-neutral-700 max-w-2xl">
            Jelajahi line-up kendaraan Isuzu dari truk niaga, microbus, hingga kendaraan penumpang
            yang siap menunjang aktivitas Anda.
          </p>
        </div>

        <form method="get" class="relative w-full md:w-72" data-animate>
          <input
            type="text"
            name="q"
            value="{{ $q ?? '' }}"
            placeholder="Cari unit…"
            class="w-full border border-neutral-300 rounded-2xl py-2.5 pl-4 pr-9
                   text-sm font-poppins focus:outline-none focus:ring-2 focus:ring-[#DD2A2A]/60"
          >
          @if(!empty($q))
            <a href="{{ route('products.index') }}"
               class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-neutral-400 hover:text-neutral-600">
              ×
            </a>
          @endif
        </form>
      </div>

      {{-- Jika kosong --}}
      @if($products->isEmpty())
        <div class="rounded-2xl border border-dashed border-neutral-300 bg-white p-8 text-center">
          <p class="font-poppins text-sm text-neutral-600">
            Belum ada produk yang tersedia.
          </p>
        </div>
      @else

        {{-- GRID PRODUK (style mirip home) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          @foreach($products as $i => $pr)
            @php $delay = $i * 0.05; @endphp

            <a
              href="{{ route('products.show',$pr->slug) }}"
              data-animate
              style="animation-delay: {{ $delay }}s"
              class="bg-white rounded-3xl overflow-hidden shadow-md
                     hover:shadow-2xl transition-all hover:-translate-y-2
                     cursor-pointer group"
            >
              {{-- Gambar --}}
              <div class="relative overflow-hidden h-64">
                <img
                  src="{{ $pr->image ? asset('storage/'.$pr->image) : asset('images/placeholder-16x9.jpg') }}"
                  alt="{{ $pr->name }}"
                  class="w-full h-full object-cover
                         transition-transform duration-300 group-hover:scale-110"
                />
                <div
                  class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent
                         opacity-0 group-hover:opacity-100
                         transition-opacity duration-300">
                </div>
              </div>

              {{-- Konten --}}
              <div class="p-6 text-center">
                <h3 class="font-poppins font-semibold text-lg md:text-xl text-gray-900 mb-2">
                  {{ $pr->name }}
                </h3>

                @if($pr->excerpt)
                  <p class="font-poppins text-sm text-gray-600 line-clamp-2">
                    {{ $pr->excerpt }}
                  </p>
                @endif
              </div>
            </a>
          @endforeach
        </div>

        {{-- PAGINATION --}}
        <div class="mt-10">
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 text-sm text-gray-500">
            {{-- Info jumlah --}}
            <p class="font-poppins">
              Menampilkan
              @if ($products->firstItem())
                <span class="font-semibold">{{ $products->firstItem() }}</span>
                –
                <span class="font-semibold">{{ $products->lastItem() }}</span>
              @else
                <span class="font-semibold">{{ $products->count() }}</span>
              @endif
              dari
              <span class="font-semibold">{{ $products->total() }}</span>
              produk
            </p>

            {{-- Links bawaan Tailwind (sudah kamu custom sebelumnya) --}}
            <div class="md:ml-4">
              {{ $products->links() }}
            </div>
          </div>
        </div>

      @endif
    </div>
  </section>

@endsection
t…"
             class="border rounded-xl py-2 pl-3 pr-10 w-64">
      @if(!empty($q))
        <a href="{{ route('products.index') }}" class="absolute right-3 top-2.5 text-xs text-neutral-500">×</a>
      @endif
    </form>
  </div>

  @if($products->isEmpty())
    <div class="rounded-xl border p-6 text-sm text-neutral-600">Belum ada produk.</div>
  @else
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($products as $pr)
        <a href="{{ route('products.show',$pr->slug) }}" class="rounded-2xl border overflow-hidden hover:shadow">
          <img src="{{ $pr->image ? asset('storage/'.$pr->image) : asset('images/placeholder-16x9.jpg') }}"
               class="w-full h-44 object-cover" alt="">
          <div class="p-4">
            <h3 class="font-semibold">{{ $pr->name }}</h3>
            <p class="text-sm text-neutral-600 line-clamp-2">{{ $pr->excerpt }}</p>
          </div>
        </a>
      @endforeach
    </div>
    <div class="mt-6">{{ $products->links() }}</div>
  @endif
@endsection
