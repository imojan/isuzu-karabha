@extends('layouts.app')
@section('title','Artikel — Isuzu Karabha')

@section('content')
  <section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">

      {{-- HEADER: Judul + Search --}}
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-10">
        <div>
          <h1 class="font-poppins font-bold text-3xl md:text-4xl text-gray-900">
            Artikel
          </h1>
          <p class="font-poppins text-sm md:text-base text-gray-600 mt-1">
            Berita & Artikel Terbaru Seputar Isuzu untuk Anda.
          </p>
        </div>

        <form method="get" class="w-full md:w-auto">
          <div class="relative">
            <input
              type="text"
              name="q"
              value="{{ $q ?? '' }}"
              placeholder="Cari artikel…"
              class="w-full md:w-72 lg:w-80 rounded-full border border-neutral-300
                     bg-white py-2.5 pl-4 pr-10 text-sm font-poppins
                     placeholder:text-neutral-400 focus:outline-none
                     focus:ring-2 focus:ring-[#DD2A2A]/60 focus:border-[#DD2A2A]"
            >
            @if(!empty($q))
              <a href="{{ route('articles.index') }}"
                 class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-neutral-400 hover:text-neutral-600">
                ×
              </a>
            @endif
          </div>
        </form>
      </div>

      {{-- KALAU KOSONG --}}
      @if($articles->isEmpty())
        <div class="rounded-2xl border border-dashed border-neutral-300 px-6 py-10 text-center">
          <p class="font-poppins text-sm md:text-base text-neutral-600">
            Belum ada artikel yang tersedia saat ini.
          </p>
        </div>
      @else

        {{-- GRID 2 KOLOM --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          @foreach($articles as $i => $a)
            @php $delay = $i * 0.05; @endphp
            <a href="{{ route('articles.show',$a->slug) }}"
               data-animate
               style="animation-delay: {{ $delay }}s"
               class="bg-white rounded-3xl overflow-hidden shadow-md
                      hover:shadow-2xl transition-all hover:-translate-y-2
                      cursor-pointer flex flex-col">
              
              <div class="relative h-48 overflow-hidden">
                <img
                  src="{{ $a->thumbnail ? asset('storage/'.$a->thumbnail) : asset('images/placeholder-16x9.jpg') }}"
                  alt="{{ $a->title }}"
                  class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                >
              </div>

              <div class="p-5 md:p-6 flex-1 flex flex-col">
                <p class="font-poppins text-xs md:text-sm text-gray-500 mb-2 text-right">
                  {{ $a->published_at?->format('d M Y') }}
                </p>

                <h3 class="font-poppins font-semibold text-base md:text-lg text-gray-900 mb-2 line-clamp-2">
                  {{ $a->title }}
                </h3>

                <p class="font-poppins text-sm text-gray-600 mb-4 line-clamp-3">
                  {{ $a->excerpt }}
                </p>

                <span class="mt-auto font-poppins text-xs md:text-sm text-[#DD2A2A] font-semibold text-right hover:underline">
                  Baca Selengkapnya →
                </span>
              </div>
            </a>
          @endforeach
        </div>

        {{-- PAGINATION --}}
        <div class="mt-10 flex justify-center">
          {{ $articles->links() }}
          {{-- kalau pakai Tailwind pagination:
               {{ $articles->links('pagination::tailwind') }} --}}
          
        </div>

      @endif
    </div>
  </section>
@endsection
