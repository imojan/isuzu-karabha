@extends('layouts.app')
@section('title','Promo — Isuzu Karabha')
@section('content')
  {{-- ===== HERO FULL-BLEED ===== --}}
<div class="relative w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]">
  <section id="beranda"
           class="relative isolate flex flex-col items-center text-center gap-4
                  bg-no-repeat bg-cover bg-center
                  min-h-[640px] md:min-h-[720px] lg:min-h-[860px] xl:min-h-[969px]"
           style="background-image:url('{{ asset('images/background-promo.png') }}')"
           aria-label="Isuzu Jakarta dealer showcase with vehicles">
      </div>
    </div>
  </section>
</div>

  @if($promos->isEmpty())
    <div class="rounded-xl border p-6 text-sm text-neutral-600">Belum ada promo aktif.</div>
  @else
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($promos as $p)
        <a href="{{ route('promos.show',$p->slug) }}" class="rounded-2xl border overflow-hidden hover:shadow">
          <img src="{{ $p->thumbnail ? asset('storage/'.$p->thumbnail) : asset('images/placeholder-16x9.jpg') }}"
               class="w-full h-44 object-cover" alt="">
          <div class="p-4">
            <h3 class="font-semibold">{{ $p->title }}</h3>
            <p class="text-sm text-neutral-600 line-clamp-2">{{ $p->excerpt }}</p>
            @if($p->start_date || $p->end_date)
              <p class="mt-2 text-xs text-neutral-500">
                Periode: {{ $p->start_date?->format('d M Y') }} — {{ $p->end_date?->format('d M Y') }}
              </p>
            @endif
          </div>
        </a>
      @endforeach
    </div>
    <div class="mt-6">{{ $promos->links() }}</div>
  @endif
@endsection
