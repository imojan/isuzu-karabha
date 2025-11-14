@extends('layouts.app')
@section('title','Kontak Kami — Isuzu Karabha')
@section('content')
  <h1 class="text-3xl font-bold mb-6">Kontak Kami</h1>

  @if(session('ok'))
    <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-800">
      {{ session('ok') }}
    </div>
  @endif

  <form method="post" action="{{ route('contact.submit') }}" class="grid md:grid-cols-2 gap-5 max-w-3xl">
    @csrf
    <div>
      <label class="text-sm">Nama *</label>
      <input name="name" value="{{ old('name') }}" required class="mt-1 w-full border rounded-xl px-3 py-2">
      @error('name') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
    </div>

    <div>
      <label class="text-sm">Email</label>
      <input name="email" value="{{ old('email') }}" class="mt-1 w-full border rounded-xl px-3 py-2">
      @error('email') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
    </div>

    <div>
      <label class="text-sm">No. HP</label>
      <input name="phone" value="{{ old('phone') }}" class="mt-1 w-full border rounded-xl px-3 py-2">
      @error('phone') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
    </div>

    <div>
      <label class="text-sm">Subjek</label>
      <input name="subject" value="{{ old('subject') }}" class="mt-1 w-full border rounded-xl px-3 py-2">
      @error('subject') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
    </div>

    <div class="md:col-span-2">
      <label class="text-sm">Pesan *</label>
      <textarea name="message" rows="6" required class="mt-1 w-full border rounded-xl px-3 py-2">{{ old('message') }}</textarea>
      @error('message') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
    </div>

    <div class="md:col-span-2">
      <button class="px-5 py-3 rounded-xl bg-red-600 text-white">Kirim Pesan</button>
    </div>
  </form>
@endsection
