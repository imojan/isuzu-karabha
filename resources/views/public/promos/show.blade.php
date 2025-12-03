@extends('layouts.app')
@section('title', $promo->title.' — Promo')

@section('content')
@php
    // Status promo untuk badge
    $statusLabel = null;
    $statusClass = null;

    if ($promo->end_date && $promo->end_date->isPast()) {
        $statusLabel = 'Berakhir';
        $statusClass = 'bg-slate-100 text-slate-700 border border-slate-200';
    } elseif ($promo->start_date && $promo->start_date->isFuture()) {
        $statusLabel = 'Segera Hadir';
        $statusClass = 'bg-amber-50 text-amber-700 border border-amber-100';
    } else {
        $statusLabel = 'Sedang Berjalan';
        $statusClass = 'bg-emerald-50 text-emerald-700 border border-emerald-100';
    }

    $relatedPromos = \App\Models\Promo::where('is_published',1)
        ->where('id','!=',$promo->id)
        ->latest('published_at')
        ->take(6)
        ->get();
@endphp

<section class="py-16 bg-white">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Breadcrumb kecil --}}
    <div class="mb-6 text-sm font-poppins text-neutral-500 flex items-center gap-1">
      <a href="{{ route('promos.index') }}" class="hover:text-[#DD2A2A]">
        Promo
      </a>
      <span class="text-neutral-400">/</span>
      <span class="text-neutral-700 line-clamp-1">
        {{ $promo->title }}
      </span>
    </div>

    <article class="grid lg:grid-cols-3 gap-10 lg:gap-12 items-start">

      {{-- ========= LEFT: DETAIL PROMO ========= --}}
      <div class="lg:col-span-2">

        {{-- HEADER: badge + tanggal + judul (mirip artikel show) --}}
        <header class="mb-6">
          <div class="mb-3 flex flex-wrap items-center gap-3">
            <span class="inline-flex items-center rounded-full bg-[#DD2A2A]/10 px-3 py-1 text-xs font-semibold text-[#DD2A2A] font-poppins tracking-wide uppercase">
              Promo Isuzu
            </span>

            @if($statusLabel)
              <span class="inline-flex items-center rounded-full px-3 py-1 text-[11px] font-medium font-poppins {{ $statusClass }}">
                {{ $statusLabel }}
              </span>
            @endif

            @if($promo->published_at)
              <span class="text-xs md:text-sm font-poppins text-neutral-500">
                Dipublikasikan {{ $promo->published_at->format('d M Y') }}
              </span>
            @endif
          </div>

          <h1 class="font-poppins font-bold text-2xl md:text-3xl lg:text-4xl text-neutral-900 leading-tight">
            {{ $promo->title }}
          </h1>

          {{-- Periode & diffForHumans, mirip meta di artikel --}}
          <div class="mt-3 flex flex-wrap gap-4 text-xs md:text-sm font-poppins text-neutral-600">
            @if($promo->published_at)
              <div class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-neutral-400" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v6l3 3m4.5-3A7.5 7.5 0 1112 4.5 7.5 7.5 0 0119.5 12z"/>
                </svg>
                <span>{{ $promo->published_at->diffForHumans() }}</span>
              </div>
            @endif

            @if($promo->start_date || $promo->end_date)
              <div class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-neutral-400" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V4m8 3V4M4.5 9.25h15M6 5h12a1.5 1.5 0 011.5 1.5v11A1.5 1.5 0 0118 19H6a1.5 1.5 0 01-1.5-1.5v-11A1.5 1.5 0 016 5z"/>
                </svg>
                <span>
                  Periode:
                  @if($promo->start_date)
                    {{ $promo->start_date->format('d M Y') }}
                  @endif
                  @if($promo->end_date)
                    &nbsp;—&nbsp;{{ $promo->end_date->format('d M Y') }}
                  @endif
                </span>
              </div>
            @endif
          </div>
        </header>

        {{-- GAMBAR 1:1 (SQUARE) – konsisten dengan promos/index --}}
        <figure class="mb-8">
          <div class="mx-auto max-w-xs sm:max-w-sm md:max-w-md rounded-3xl overflow-hidden shadow-sm">
            <div class="aspect-square">
              <img
                src="{{ $promo->thumbnail ? asset('storage/'.$promo->thumbnail) : asset('images/placeholder-1x1.jpg') }}"
                alt="{{ $promo->title }}"
                class="w-full h-full object-cover"
              >
            </div>
          </div>
        </figure>

        {{-- BODY: gaya mirip artikel show --}}
        <div class="prose max-w-none font-poppins
                    prose-p:text-sm md:prose-p:text-base prose-p:leading-relaxed
                    prose-headings:font-semibold prose-headings:text-neutral-900
                    prose-a:text-[#DD2A2A]">
          {!! $promo->body !!}
        </div>

        {{-- Tombol kembali --}}
        <div class="mt-10">
          <a href="{{ route('promos.index') }}"
             class="inline-flex items-center gap-2 text-xs md:text-sm font-poppins text-[#DD2A2A] hover:text-[#B9191F]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.5 19.5L3 12m0 0 7.5-7.5M3 12h18"/>
            </svg>
            Kembali ke daftar promo
          </a>
        </div>
      </div>

      {{-- ========= RIGHT: SIDEBAR PROMO LAINNYA ========= --}}
      <aside class="lg:pt-2">
        <div class="rounded-3xl border border-slate-200 bg-slate-50/60 p-4 md:p-5">
          <h2 class="font-poppins font-semibold text-base md:text-lg text-slate-900 mb-3">
            Promo Lainnya
          </h2>
          <p class="text-xs md:text-sm text-neutral-600 mb-4">
            Temukan promo Isuzu lainnya yang mungkin sesuai dengan kebutuhan armada Anda.
          </p>

          @if($relatedPromos->isEmpty())
            <p class="text-xs md:text-sm text-neutral-500">
              Belum ada promo lainnya saat ini.
            </p>
          @else
            <div class="space-y-3">
              @foreach($relatedPromos as $x)
                <a href="{{ route('promos.show',$x->slug) }}"
                   class="group flex gap-3 rounded-2xl bg-white border border-slate-200 p-3
                          hover:border-[#DD2A2A]/60 hover:shadow-md transition">
                  <div class="w-16 h-16 rounded-2xl overflow-hidden flex-shrink-0">
                    <img
                      src="{{ $x->thumbnail ? asset('storage/'.$x->thumbnail) : asset('images/placeholder-1x1.jpg') }}"
                      alt="{{ $x->title }}"
                      class="w-full h-full object-cover"
                    >
                  </div>
                  <div class="flex-1 min-w-0">
                    <p class="text-[11px] text-neutral-500 mb-0.5">
                      {{ $x->published_at?->format('d M Y') }}
                    </p>
                    <div class="text-sm font-poppins font-medium text-slate-900 line-clamp-2 group-hover:text-[#DD2A2A]">
                      {{ $x->title }}
                    </div>
                  </div>
                </a>
              @endforeach
            </div>
          @endif
        </div>
      </aside>
    </article>
  </div>
</section>
@endsection
