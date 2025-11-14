@props(['label' => 'Menu'])

@php $id = 'dd-'.Str::random(5); @endphp

<div class="relative" x-data="{open:false}" @keydown.escape.window="open=false">
  <button
    @click="open = !open"
    :aria-expanded="open"
    class="inline-flex items-center gap-2 rounded-lg border border-neutral-300 px-3 py-2 text-sm text-neutral-700 hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-[#DB3831]/40">
    <span>{{ $label }}</span>
    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
  </button>

  <div x-show="open" x-transition
       @click.outside="open=false"
       class="absolute right-0 mt-2 w-44 rounded-lg bg-white shadow-sm ring-1 ring-black/5 overflow-hidden z-50">
    <ul class="py-2 text-sm">
      {{ $slot }}
    </ul>
  </div>
</div>
