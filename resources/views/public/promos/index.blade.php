@extends('layouts.app')

@section('title', 'Promo — Isuzu Karabha')

@section('content')
  {{-- ===== HERO FULL-BLEED PROMO ===== --}}
  <div class="relative w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]">
    <section
      id="promo-hero"
      class="relative isolate flex items-center justify-center text-center
             bg-no-repeat bg-cover bg-center
             min-h-[480px] md:min-h-[560px] lg:min-h-[620px]"
      style="background-image:url('{{ asset('images/background-promo.png') }}')"
      aria-label="Promo spesial Isuzu Karabha"
    >
      {{-- overlay gelap --}}
      <div class="absolute inset-0 bg-black/40"></div>

      <div class="relative z-10 max-w-3xl px-4 sm:px-6 lg:px-8 flex flex-col items-center gap-4 font-poppins">
        <p class="text-xs sm:text-sm tracking-[0.25em] uppercase text-[#F8ECEC]/90">
          Promo Spesial Isuzu Karabha
        </p>

        <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-white leading-tight">
          Dapatkan Penawaran Terbaik Untuk Armada Bisnis Anda
        </h1>

        <p class="text-sm md:text-base text-slate-100/90">
          Pilih promo cicilan ringan, cashback menarik, dan program pembelian unit Isuzu 
          yang paling sesuai dengan kebutuhan operasional Anda.
        </p>

        @if(!$promos->isEmpty())
          <a href="#daftar-promo"
             class="mt-2 inline-flex items-center gap-2 rounded-full bg-[#CA1F26] px-5 py-2.5
                    text-sm font-semibold text-white shadow-lg hover:bg-[#a91c22]
                    transition-all hover:scale-105 active:scale-95">
            Lihat Semua Promo
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.5 12h15m0 0L15 6.75M19.5 12 15 17.25" />
            </svg>
          </a>
        @endif
      </div>

      {{-- gradient ke konten putih di bawah --}}
      <div class="pointer-events-none absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-white to-transparent"></div>
    </section>
  </div>

  {{-- ===== SECTION LIST PROMO ===== --}}
  <section id="daftar-promo" class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 font-poppins">

      {{-- Heading --}}
      <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3 mb-10">
        <div data-animate>
          <h2 class="text-3xl md:text-4xl font-black text-slate-900 mb-2">
            <span class="text-[#DB3831]">PROMO </span>
            <span class="text-black">TERBARU</span>
          </h2>
          <p class="mt-1 text-sm md:text-base text-slate-600 max-w-xl">
            Manfaatkan promo yang sedang berjalan untuk mendapatkan unit Isuzu dengan penawaran terbaik.
          </p>
        </div>

        @if(!$promos->isEmpty())
          <span
            class="inline-flex items-center self-start sm:self-end
                   rounded-full bg-[#293D77]/5 px-4 py-1.5 text-xs md:text-sm font-medium text-[#293D77]">
            {{ $promos->total() }} promo tersedia
          </span>
        @endif
      </div>

      {{-- Jika tidak ada promo --}}
      @if($promos->isEmpty())
        <div class="rounded-2xl border border-dashed border-slate-200 bg-slate-50/60 px-6 py-10 text-center">
          <p class="text-sm md:text-base text-neutral-600">
            Saat ini belum ada promo aktif. Silakan cek kembali beberapa waktu lagi.
          </p>
        </div>
      @else
        {{-- GRID KARTU PROMO (1 kolom mobile, 2 kolom di atas sm, rasio 1:1) --}}
<div class="grid gap-8 sm:grid-cols-2">
  @foreach($promos as $i => $p)
    @php
      $statusLabel = null;
      $statusClass = null;

      if ($p->end_date && $p->end_date->isPast()) {
          $statusLabel = 'Berakhir';
          $statusClass = 'bg-slate-100 text-slate-600';
      } elseif ($p->start_date && $p->start_date->isFuture()) {
          $statusLabel = 'Segera Hadir';
          $statusClass = 'bg-amber-50 text-amber-700';
      } else {
          $statusLabel = 'Sedang Berjalan';
          $statusClass = 'bg-emerald-50 text-emerald-700';
      }
    @endphp

    <a
      href="{{ route('promos.show', $p->slug) }}"
      data-animate
      style="animation-delay: {{ $i * 0.05 }}s"
      class="group flex flex-col overflow-hidden
             rounded-3xl bg-white border border-slate-200
             shadow-lg transition-all hover:-translate-y-2 hover:shadow-2xl"
    >
      {{-- Gambar 1:1 --}}
      <div class="relative aspect-square overflow-hidden">
        <img
          src="{{ $p->thumbnail ? asset('storage/'.$p->thumbnail) : asset('images/placeholder-1x1.png') }}"
          class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
          alt="{{ $p->title }}"
        >

        @if($p->start_date || $p->end_date)
          <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent p-3">
            <p class="text-[11px] md:text-xs font-medium uppercase tracking-wide text-slate-50">
              Periode:
              @if($p->start_date)
                {{ $p->start_date->format('d M Y') }}
              @endif
              @if($p->end_date)
                &nbsp;—&nbsp;{{ $p->end_date->format('d M Y') }}
              @endif
            </p>
          </div>
        @endif
      </div>

      {{-- Konten --}}
      <div class="flex flex-1 flex-col gap-3 p-5">
        <h3 class="line-clamp-2 text-sm md:text-base font-semibold text-slate-900">
          {{ $p->title }}
        </h3>

        @if($p->excerpt)
          <p class="text-xs md:text-sm text-neutral-600 line-clamp-3">
            {{ $p->excerpt }}
          </p>
        @endif

        <div class="mt-auto flex items-center justify-between pt-2">
          @if($statusLabel)
            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] md:text-xs font-medium {{ $statusClass }}">
              {{ $statusLabel }}
            </span>
          @endif

          <span class="inline-flex items-center gap-1 text-[11px] md:text-xs font-semibold
                       text-[#CA1F26] group-hover:text-[#a11b21] group-hover:underline">
            Lihat detail
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.5 12h15m0 0L15 6.75M19.5 12 15 17.25" />
            </svg>
          </span>
        </div>
      </div>
    </a>
  @endforeach
</div>


        {{-- PAGINATION (rapi & agak menjauh dari grid) --}}
        <div class="mt-10">
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 text-sm text-gray-500">
            <p>
              Menampilkan
              @if ($promos->firstItem())
                <span class="font-semibold">{{ $promos->firstItem() }}</span>
                –
                <span class="font-semibold">{{ $promos->lastItem() }}</span>
              @else
                <span class="font-semibold">{{ $promos->count() }}</span>
              @endif
              dari
              <span class="font-semibold">{{ $promos->total() }}</span>
              promo
            </p>

            <div class="md:ml-4">
              {{ $promos->links() }}
            </div>
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection
