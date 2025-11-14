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
      <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari unit…"
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
