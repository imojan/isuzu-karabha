<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Galeri foto.
     * Query param:
     * - category: filter kategori (event/showroom/unit/…)
     */
    public function index(Request $request)
    {
        $category = trim((string) $request->query('category', ''));

        $items = GalleryItem::query()
            ->when($category !== '', fn ($q) => $q->where('category', $category))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        // (opsional) ambil daftar kategori unik untuk filter UI
        $categories = GalleryItem::query()
            ->select('category')
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('public.gallery.index', compact('items', 'category', 'categories'));
    }
}
