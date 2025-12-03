@extends('layouts.app')
@section('title', $product->name.' — Produk')

@section('content')
  <div class="grid lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
      <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/placeholder-16x9.jpg') }}"
           class="w-full rounded-2xl mb-6" alt="">

      <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>

      <div class="prose max-w-none mt-6">
        {!! $product->body !!}
      </div>

      @if(!empty($product->specifications))
        <section class="mt-10">
          <h2 class="text-2xl font-semibold mb-4">Spesifikasi {{ $product->name }}</h2>

          <div class="space-y-3">
            @foreach($product->specifications as $group)
              <details class="border rounded-xl bg-white overflow-hidden">
                <summary class="cursor-pointer select-none px-4 py-3 flex items-center justify-between">
                  <span class="font-semibold text-sm uppercase tracking-wide">
                    {{ $group['group'] ?? '-' }}
                  </span>
                  <span class="text-xs text-neutral-500 ml-4">klik untuk lihat detail</span>
                </summary>

                @if(!empty($group['items']))
                  <div class="border-t px-4 py-3">
                    <dl class="divide-y">
                      @foreach($group['items'] as $item)
                        <div class="py-2 grid grid-cols-3 gap-2 text-sm">
                          <dt class="font-medium col-span-1">
                            {{ $item['label'] ?? '' }}
                          </dt>
                          <dd class="col-span-2 text-neutral-700">
                            {{ $item['value'] ?? '' }}
                          </dd>
                        </div>
                      @endforeach
                    </dl>
                  </div>
                @endif
              </details>
            @endforeach
          </div>
        </section>
      @endif
    </div>

    {{-- sidebar unit lain tetap pakai kode kamu yang lama --}}
    <aside>
      <h2 class="font-semibold mb-3">Unit Lain</h2>
      <div class="space-y-3">
        @foreach($more as $x)
          <a href="{{ route('products.show',$x->slug) }}" class="flex gap-3 rounded-xl border p-3 hover:bg-neutral-50">
            <img src="{{ $x->image ? asset('storage/'.$x->image) : asset('images/placeholder-1x1.jpg') }}"
                 class="w-16 h-16 rounded object-cover" alt="">
            <div>
              <div class="text-sm font-medium line-clamp-2">{{ $x->name }}</div>
              <div class="text-xs text-neutral-500">{{ $x->created_at->diffForHumans() }}</div>
            </div>
          </a>
        @endforeach
      </div>
    </aside>
  </div>
@endsection
