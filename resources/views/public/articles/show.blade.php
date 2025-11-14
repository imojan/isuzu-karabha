@extends('layouts.app')
@section('title', $article->title . ' — Artikel')

@section('content')
  <article class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-0 py-10">

    {{-- Thumbnail --}}
    <img
      src="{{ $article->thumbnail ? asset('storage/'.$article->thumbnail) : asset('images/placeholder-16x9.jpg') }}"
      alt="{{ $article->title }}"
      class="w-full rounded-2xl mb-6 object-cover"
    >

    {{-- Judul + tanggal --}}
    <h1 class="font-poppins font-bold text-2xl sm:text-3xl lg:text-4xl text-gray-900 leading-tight mb-2">
      {{ $article->title }}
    </h1>
    <p class="font-poppins text-xs sm:text-sm text-gray-500 mb-6">
      {{ $article->published_at?->format('d M Y') }}
    </p>

    {{-- ISI ARTIKEL DARI HTML EDITOR (TRIX) --}}
    <div
      class="article-body font-poppins text-[15px] leading-relaxed text-gray-800 space-y-4"
    >
      {!! $article->body !!}
    </div>

    {{-- Link kembali --}}
    <div class="mt-10">
      <a href="{{ route('articles.index') }}"
         class="font-poppins text-sm text-[#DD2A2A] hover:text-[#C01111] underline underline-offset-2">
        ← Kembali ke daftar artikel
      </a>
    </div>
  </article>
@endsection
