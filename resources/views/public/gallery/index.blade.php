@extends('layouts.app')
@section('title','Galeri — Isuzu Karabha')
@section('content')
  <h1 class="text-3xl font-bold mb-6">Galeri</h1>

  <form method="get" class="mb-6 flex items-center gap-3">
    <select name="category" class="border rounded-xl py-2 px-3">
      <option value="">Semua Kategori</option>
      @foreach($categories as $c)
        <option value="{{ $c }}" {{ ($category ?? '')===$c ? 'selected' : '' }}>{{ ucfirst($c) }}</option>
      @endforeach
    </select>
    <button class="px-4 py-2 rounded-xl border">Filter</button>
    @if(!empty($category))
      <a href="{{ route('gallery.index') }}" class="text-sm underline">Reset</a>
    @endif
  </form>

  @if($items->isEmpty())
    <div class="rounded-xl border p-6 text-sm text-neutral-600">Belum ada foto.</div>
  @else
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($items as $g)
        <figure class="rounded-2xl border overflow-hidden">
          <img src="{{ asset('storage/'.$g->image) }}" class="w-full h-60 object-cover" alt="">
          <figcaption class="p-3 text-sm text-neutral-700">{{ $g->caption }}</figcaption>
        </figure>
      @endforeach
    </div>
    <div class="mt-6">{{ $items->links() }}</div>
  @endif
@endsection
