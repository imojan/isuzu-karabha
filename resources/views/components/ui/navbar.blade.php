@php
  $menus = [
    ['label'=>'BERANDA',    'route'=>route('home'),            'isActive'=>request()->routeIs('home')],
    ['label'=>'PROMO',      'route'=>route('promos.index'),    'isActive'=>request()->routeIs('promos.*')],
    ['label'=>'PRODUK',     'route'=>route('products.index'),  'isActive'=>request()->routeIs('products.*')],
    ['label'=>'GALERI',     'route'=>route('gallery.index'),   'isActive'=>request()->routeIs('gallery.*')],
    ['label'=>'ARTIKEL',    'route'=>route('articles.index'),  'isActive'=>request()->routeIs('articles.*')],
    ['label'=>'KONTAK KAMI','route'=>route('contact.show'),    'isActive'=>request()->routeIs('contact.*')],
  ];
  $lang = session('app_locale','id');
@endphp

<header class="sticky top-0 z-40 bg-white/90 backdrop-blur font-roboc">
  <nav class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between gap-6">
    {{-- logo --}}
    <a href="{{ route('home') }}" class="shrink-0 inline-flex items-center gap-3" aria-label="Isuzu Karabha Jakarta">
      <img src="{{ asset('images/logo-utama-isuzu.png') }}" alt="Isuzu Logo" class="h-11 w-auto">
    </a>

    {{-- menu desktop --}}
    <ul class="hidden md:flex items-center gap-9">
      @foreach($menus as $m)
        <li>
          <a href="{{ $m['route'] }}"
             class="inline-flex items-center px-1 py-1 text-[12px] font-semibold
                    {{ $m['isActive'] ? 'text-[#DB3831] border-b-2 border-[#DB3831]esuatu' : 'text-black border-b-2 border-transparent hover:text-[#DB3831]/90 hover:border-[#DB3831]/40' }}">
            {{ $m['label'] }}
          </a>
        </li>
      @endforeach
    </ul>

    <div class="hidden md:flex items-center gap-4">
      {{-- language --}}
      <div class="inline-flex items-center gap-2 text-[14px] font-medium">
        <a href="{{ route('lang.switch','en') }}" class="px-1 {{ $lang==='en' ? 'text-[#DB3831]' : 'text-black hover:text-[#DB3831]/90' }}">EN</a>
        <span aria-hidden="true" class="h-4 w-px bg-neutral-300"></span>
        <a href="{{ route('lang.switch','id') }}" class="px-1 {{ $lang==='id' ? 'text-[#DB3831]' : 'text-black hover:text-[#DB3831]/90' }}">ID</a>
      </div>

    </div>

    {{-- hamburger mobile --}}
    <button id="navToggle"
            class="md:hidden inline-flex items-center justify-center rounded-lg border border-orange-700 p-2 text-orange-700 hover:bg-neutral-100"
            aria-label="Open menu" aria-controls="navMenu" aria-expanded="false">
      <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="3" y1="6"  x2="21" y2="6"/>
        <line x1="3" y1="12" x2="21" y2="12"/>
        <line x1="3" y1="18" x2="21" y2="18"/>
      </svg>
    </button>
  </nav>

  {{-- mobile menu --}}
  <div id="navMenu" class="md:!hidden hidden bg-white border-t border-neutral-200">
    <ul class="max-w-6xl mx-auto px-4 py-3 grid gap-1 text-[14px] font-bold">
      @foreach($menus as $m)
        <li><a href="{{ $m['route'] }}" class="block px-2 py-2 {{ $m['isActive'] ? 'text-[#DB3831]' : 'text-black' }}">{{ $m['label'] }}</a></li>
      @endforeach
      <li class="flex items-center gap-2 px-2 py-2 font-medium">
        <span class="text-xs text-neutral-500 mr-2">Bahasa:</span>
        <a href="{{ route('lang.switch','en') }}" class="{{ $lang==='en' ? 'text-[#DB3831] font-semibold' : 'text-black' }}">EN</a>
        <span class="h-4 w-px bg-neutral-300"></span>
        <a href="{{ route('lang.switch','id') }}" class="{{ $lang==='id' ? 'text-[#DB3831] font-semibold' : 'text-black' }}">ID</a>
      </li>
    </ul>
  </div>
</header>
