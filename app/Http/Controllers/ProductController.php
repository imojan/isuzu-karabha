<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Daftar produk (unit) dengan pencarian.
     * Query param:
     * - q: keyword di name/excerpt/body
     */
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $products = Product::query()
            ->where('is_published', 1)
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('name', 'like', "%{$q}%")
                        ->orWhere('excerpt', 'like', "%{$q}%")
                        ->orWhere('body', 'like', "%{$q}%");
                });
            })
            ->latest('id') // atau orderBy('name') sesuai kebutuhan
            ->paginate(12)
            ->withQueryString();

        return view('public.products.index', compact('products', 'q'));
    }

    /**
     * Detail produk by slug (hanya published).
     * Tampilkan produk lain sebagai rekomendasi.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_published', 1)
            ->firstOrFail();

        $more = Product::where('is_published', 1)
            ->where('id', '!=', $product->id)
            ->take(6)->get();

        return view('public.products.show', compact('product', 'more'));
    }
}
