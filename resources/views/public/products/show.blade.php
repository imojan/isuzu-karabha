@extends('layouts.app')
@section('title', $product->name . ' — Produk')

@push('styles')
    <style>
        /* ========= STYLING KONTEN DARI EDITOR ========= */
        .product-content {
            font-family: system-ui, -apple-system, sans-serif;
            color: #374151;
        }

        /* Headings */
        .product-content h1 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-size: 1.875rem;
            /* text-3xl */
            line-height: 2.25rem;
            font-weight: 700;
            color: #111827;
        }

        .product-content h2 {
            margin-top: 1.75rem;
            margin-bottom: 0.875rem;
            font-size: 1.5rem;
            /* text-2xl */
            line-height: 2rem;
            font-weight: 600;
            color: #111827;
            border-bottom: 2px solid #DD2A2A;
            padding-bottom: 0.5rem;
        }

        .product-content h3 {
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            font-size: 1.25rem;
            /* text-xl */
            line-height: 1.75rem;
            font-weight: 600;
            color: #1f2937;
        }

        .product-content h4 {
            margin-top: 1.25rem;
            margin-bottom: 0.5rem;
            font-size: 1.125rem;
            /* text-lg */
            line-height: 1.75rem;
            font-weight: 600;
            color: #374151;
        }

        .product-content h5,
        .product-content h6 {
            margin-top: 1rem;
            margin-bottom: 0.5rem;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 600;
            color: #4b5563;
        }

        /* Paragraphs */
        .product-content p {
            margin-top: 0;
            margin-bottom: 1rem;
            font-size: 1rem;
            line-height: 1.75;
            color: #374151;
        }

        .product-content p:last-child {
            margin-bottom: 0;
        }

        /* Lists */
        .product-content ul,
        .product-content ol {
            margin-top: 0.75rem;
            margin-bottom: 1rem;
            padding-left: 1.5rem;
        }

        .product-content ul {
            list-style-type: disc;
        }

        .product-content ol {
            list-style-type: decimal;
        }

        .product-content li {
            margin-bottom: 0.5rem;
            line-height: 1.75;
            color: #374151;
        }

        .product-content li::marker {
            color: #DD2A2A;
        }

        /* Nested lists */
        .product-content ul ul,
        .product-content ol ol,
        .product-content ul ol,
        .product-content ol ul {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        /* Links */
        .product-content a {
            color: #DD2A2A;
            text-decoration: underline;
            transition: color 0.2s;
        }

        .product-content a:hover {
            color: #b91c1c;
        }

        /* Blockquotes */
        .product-content blockquote {
            margin: 1.5rem 0;
            padding-left: 1rem;
            border-left: 4px solid #DD2A2A;
            font-style: italic;
            color: #4b5563;
        }

        /* Code */
        .product-content code {
            background-color: #f3f4f6;
            padding: 0.125rem 0.375rem;
            border-radius: 0.25rem;
            font-size: 0.875em;
            font-family: monospace;
        }

        .product-content pre {
            background-color: #1f2937;
            color: #f9fafb;
            padding: 1rem;
            border-radius: 0.5rem;
            overflow-x: auto;
            margin: 1rem 0;
        }

        .product-content pre code {
            background-color: transparent;
            padding: 0;
            color: inherit;
        }

        /* Tables */
        .product-content table {
            width: 100%;
            margin: 1.5rem 0;
            border-collapse: collapse;
        }

        .product-content th,
        .product-content td {
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            text-align: left;
        }

        .product-content th {
            background-color: #f9fafb;
            font-weight: 600;
        }

        /* Images */
        .product-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 1.5rem 0;
        }

        /* Strong & Em */
        .product-content strong {
            font-weight: 600;
            color: #111827;
        }

        .product-content em {
            font-style: italic;
        }

        /* Horizontal Rule */
        .product-content hr {
            margin: 2rem 0;
            border: 0;
            border-top: 2px solid #e5e7eb;
        }

        /* ========= SPECIFICATION TOGGLE ANIMATION ========= */
        .spec-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .spec-content.active {
            max-height: 2000px;
            transition: max-height 0.5s ease-in;
        }

        .toggle-icon {
            transition: transform 0.3s ease;
        }

        .toggle-icon.rotated {
            transform: rotate(180deg);
        }
    </style>
@endpush

@section('content')
    <section class="py-12 bg-gradient-to-b from-gray-50 to-white md:py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Breadcrumb --}}
            <nav class="mb-6 text-sm">
                <ol class="flex items-center gap-2 text-gray-600">
                    <li><a href="{{ route('home') }}" class="hover:text-[#DD2A2A] transition">Home</a></li>
                    <li><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-[#DD2A2A] transition">Produk</a></li>
                    <li><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg></li>
                    <li class="font-medium text-gray-900">{{ Str::limit($product->name, 40) }}</li>
                </ol>
            </nav>

            <div class="grid gap-8 lg:grid-cols-12 lg:gap-12">

                {{-- ========= MAIN CONTENT ========= --}}
                <div class="lg:col-span-8">

                    {{-- Gambar utama produk dengan shadow & border --}}
                    <div class="w-full mb-8 overflow-hidden bg-white rounded-2xl shadow-lg border border-gray-100">
                        <div class="aspect-[16/9] bg-gradient-to-br from-gray-100 to-gray-200">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/placeholder-16x9.jpg') }}"
                                alt="{{ $product->name }}" class="object-cover w-full h-full" loading="eager">
                        </div>
                    </div>

                    {{-- Card untuk info produk --}}
                    <div class="p-6 mb-8 bg-white border border-gray-100 shadow-sm md:p-8 rounded-2xl">
                        {{-- Judul --}}
                        <h1 class="mb-3 text-2xl font-bold text-gray-900 md:text-3xl lg:text-4xl font-poppins">
                            {{ $product->name }}
                        </h1>

                        {{-- Subtitle --}}
                        @if (!empty($product->subtitle))
                            <p class="mb-4 text-base text-gray-600 md:text-lg">
                                {{ $product->subtitle }}
                            </p>
                        @endif

                        {{-- Divider --}}
                        <div class="w-20 h-1 mb-6 bg-gradient-to-r from-[#DD2A2A] to-[#ff6b6b] rounded-full"></div>

                        {{-- Body dari editor (deskripsi panjang) dengan styling dinamis --}}
                        <div class="prose prose-gray max-w-none product-content">
                            {!! $product->body !!}
                        </div>
                    </div>

                    {{-- ========= SPESIFIKASI TEKNIS (ACCORDION TANPA JS) ========= --}}
                    @if (!empty($product->specifications))
                        <section class="mt-10">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-1 h-8 bg-[#DD2A2A] rounded-full"></div>
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 font-poppins">
                                    Spesifikasi Teknis
                                </h2>
                            </div>

                            <div class="space-y-4">
                                @foreach ($product->specifications as $loopIndex => $group)
                                    @php $rows = $group['items'] ?? []; @endphp

                                    @if (!empty($rows))
                                        <details
                                            class="overflow-hidden bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition"
                                            {{ $loop->first ? 'open' : '' }} {{-- auto buka grup pertama --}}>
                                            <summary
                                                class="flex items-center justify-between w-full px-5 py-4 cursor-pointer
                     bg-gradient-to-r from-[#DD2A2A] to-[#c92424] text-white
                     list-none group">
                                                <span class="text-sm md:text-base font-semibold tracking-wide uppercase">
                                                    {{ $group['group'] ?? 'Spesifikasi' }}
                                                </span>
                                                <svg class="w-5 h-5 text-white transition-transform duration-300 group-open:rotate-180"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </summary>

                                            <div class="overflow-x-auto">
                                                <table class="w-full text-sm md:text-base">
                                                    <tbody>
                                                        @foreach ($rows as $rowIndex => $row)
                                                            <tr
                                                                class="{{ $rowIndex % 2 === 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-100 transition">
                                                                <th
                                                                    class="w-2/5 px-4 py-3 md:px-6 md:py-4 text-left align-top font-semibold text-gray-800">
                                                                    {{ $row['label'] ?? '' }}
                                                                </th>
                                                                <td
                                                                    class="px-4 py-3 md:px-6 md:py-4 align-top text-gray-700">
                                                                    {{ $row['value'] ?? '' }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </details>
                                    @endif
                                @endforeach
                            </div>
                        </section>
                    @endif
                </div>

                {{-- ========= SIDEBAR: UNIT LAIN ========= --}}
                <aside class="lg:col-span-4">
                    <div class="sticky top-6">
                        <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-2xl">
                            <h2
                                class="flex items-center gap-2 mb-5 text-lg font-bold text-gray-900 md:text-xl font-poppins">
                                <svg class="w-5 h-5 text-[#DD2A2A]" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                                    </path>
                                </svg>
                                Unit Lainnya
                            </h2>

                            <div class="space-y-3">
                                @forelse($more as $x)
                                    <a href="{{ route('products.show', $x->slug) }}"
                                        class="flex gap-3 p-3 transition bg-gray-50 border border-gray-200 rounded-xl hover:border-[#DD2A2A] hover:shadow-md hover:-translate-y-0.5 group">
                                        <div
                                            class="overflow-hidden bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg w-16 h-16 shrink-0 md:w-20 md:h-20">
                                            <img src="{{ $x->image ? asset('storage/' . $x->image) : asset('images/placeholder-1x1.jpg') }}"
                                                alt="{{ $x->name }}"
                                                class="object-cover w-full h-full transition group-hover:scale-110"
                                                loading="lazy">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div
                                                class="text-sm font-semibold text-gray-900 transition line-clamp-2 group-hover:text-[#DD2A2A]">
                                                {{ $x->name }}
                                            </div>
                                            <div class="flex items-center gap-1 mt-2 text-xs text-gray-500">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $x->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <p class="py-8 text-sm text-center text-gray-500">
                                        Belum ada unit lainnya
                                    </p>
                                @endforelse
                            </div>

                            {{-- CTA Button --}}
                            <div class="pt-5 mt-5 border-t border-gray-200">
                                <a href="{{ route('products.index') }}"
                                    class="flex items-center justify-center w-full gap-2 px-4 py-3 text-sm font-semibold text-white transition bg-gradient-to-r from-[#DD2A2A] to-[#c92424] rounded-xl hover:from-[#c92424] hover:to-[#b91c1c] shadow-lg hover:shadow-xl">
                                    Lihat Semua Produk
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </section>

@endsection
