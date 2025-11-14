@extends('layouts.app')
@section('title', $promo->title.' — Promo')
@section('content')
  <article class="grid lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
      <img src="{{ $promo->thumbnail ? asset('storage/'.$promo->thumbnail) : asset('images/placeholder-16x9.jpg') }}"
           class="w-full rounded-2xl mb-6" alt="">

      <h1 class="text-3xl font-bold mb-2">{{ $promo->title }}</h1>
      <p class="text-sm text-neutral-500 mb-6">
        {{ $promo->published_at?->diffForHumans() }}
        @if($promo->start_date || $promo->end_date) • Periode:
          {{ $promo->start_date?->format('d M Y') }} — {{ $promo->end_date?->format('d M Y') }}
        @endif
      </p>

      <div class="prose max-w-none">
        {!! nl2br(e($promo->body)) !!}
      </div>
    </div>

    <aside>
      <h2 class="font-semibold mb-3">Promo Lainnya</h2>
      <div class="space-y-3">
        @foreach(\App\Models\Promo::where('is_published',1)->where('id','!=',$promo->id)->latest('published_at')->take(6)->get() as $x)
          <a href="{{ route('promos.show',$x->slug) }}" class="flex gap-3 rounded-xl border p-3 hover:bg-neutral-50">
            <img src="{{ $x->thumbnail ? asset('storage/'.$x->thumbnail) : asset('images/placeholder-1x1.jpg') }}"
                 class="w-16 h-16 rounded object-cover" alt="">
            <div>
              <div class="text-sm font-medium line-clamp-2">{{ $x->title }}</div>
              <div class="text-xs text-neutral-500">{{ $x->published_at?->diffForHumans() }}</div>
            </div>
          </a>
        @endforeach
      </div>
    </aside>
  </article>
@endsection
