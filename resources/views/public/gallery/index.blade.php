@extends('layouts.app')
@section('title', 'Galeri — Isuzu Karabha')

@section('content')
<div class="bg-white min-h-screen">

  {{-- ===== HERO SECTION ===== --}}
  {{-- Menampilkan judul dan deskripsi halaman galeri dengan layout yang responsif --}}
  <section class="pt-28 md:pt-32 pb-10 px-6 lg:px-24 max-w-[1440px] mx-auto">
    {{-- Judul halaman dengan warna merah khas Isuzu --}}
    <h1 class="font-poppins text-center uppercase mb-4 text-4xl md:text-5xl tracking-[0.18em] text-black font-bold">
      <span class="text-[#DB3831]">GALERI</span>
    </h1>

    {{-- Deskripsi singkat tentang penawaran spesial bulan ini --}}
    <p class="font-poppins text-sm md:text-base lg:text-lg text-black text-center max-w-4xl mx-auto leading-relaxed">
      Dapatkan penawaran spesial bulan ini! Nikmati diskon, bonus menarik, dan promo pembelian ringan
      untuk berbagai tipe Isuzu favorit Anda.
    </p>
  </section>

  {{-- ===== GALLERY GRID SECTION ===== --}}
  {{-- Menampilkan grid galeri dengan layout responsif atau pesan jika tidak ada data --}}
  <section class="pb-16 px-6 lg:px-24 max-w-[1440px] mx-auto">
    {{-- Cek apakah ada data galeri --}}
    @if($items->isEmpty())
      {{-- Tampilkan pesan ketika galeri kosong --}}
      <div class="rounded-2xl border border-dashed border-neutral-300 bg-neutral-50 px-6 py-12 text-center">
        <p class="font-poppins text-sm md:text-base text-neutral-600">
          Belum ada foto di galeri untuk saat ini.
        </p>
      </div>
    @else
      {{-- Definisikan pola row-span untuk membuat layout grid yang menarik dan dinamis --}}
      {{-- Pola ini menentukan berapa banyak baris setiap item akan menempati --}}
      @php
        $spanPattern = [
          'row-span-2',
          'row-span-3',
          'row-span-1',
          'row-span-1',
          'row-span-2',
          'row-span-2',
          'row-span-2',
          'row-span-2',
          'row-span-3',
          'row-span-3',
          'row-span-3',
        ];
      @endphp

      {{-- Grid container: responsive columns, fixed height rows, dan gap konsisten --}}
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-[200px]">
        {{-- Loop setiap item galeri dan apply pola row-span yang diulang --}}
        @foreach($items as $idx => $g)
          {{-- Ambil nilai row-span dari pola, gunakan modulo untuk loop jika data > pola --}}
          @php
            $spanClass = $spanPattern[$idx % count($spanPattern)];
          @endphp

          {{-- Item galeri dengan efek hover scale up --}}
          <div class="{{ $spanClass }} rounded-lg overflow-hidden group cursor-pointer">
            {{-- Gambar dengan lazy loading dan hover effect --}}
            <img
              src="{{ asset('storage/' . $g->image) }}"
              alt="{{ $g->caption ?: 'Foto Galeri Isuzu' }}"
              class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
              loading="lazy"
            />
          </div>
        @endforeach
      </div>

      {{-- Pagination links untuk navigasi antar halaman --}}
      <div class="mt-10 flex justify-center">
        {{ $items->links() }}
      </div>
    @endif
  </section>  </div>
@endsection
