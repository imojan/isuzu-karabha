<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Halaman daftar artikel (berita)
     * - Bisa cari judul / excerpt / isi (param: q)
     * - Hanya artikel yang sudah dipublish
     * - Urut dari yang terbaru
     * - Paginate: 6 per halaman
     */
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $articles = Article::query()
            ->where('is_published', 1)
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('title', 'like', "%{$q}%")
                        ->orWhere('excerpt', 'like', "%{$q}%")
                        ->orWhere('body', 'like', "%{$q}%");
                });
            })
            ->orderByDesc('published_at')
            ->paginate(6)          // <= di sini batas 6 artikel per halaman
            ->withQueryString();   // biar ?q=... tetap kebawa saat pindah halaman

        return view('public.articles.index', compact('articles', 'q'));
    }

    /**
     * Detail artikel by slug (hanya yang sudah dipublish).
     * Juga ambil 6 artikel terbaru lain sebagai artikel terkait.
     */
    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', 1)
            ->firstOrFail();

        $related = Article::where('is_published', 1)
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('public.articles.show', compact('article', 'related'));
    }
}
