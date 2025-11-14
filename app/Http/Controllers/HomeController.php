<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use App\Models\Article;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $promos = Promo::where('is_published', 1)
            ->latest('published_at')
            ->take(6)
            ->get();

        $articles = Article::where('is_published', 1)
            ->latest('published_at')
            ->take(3)
            ->get();

        $products = Product::where('is_published', 1)
            ->take(6)
            ->get();

        return view('public.home', compact('promos', 'articles', 'products'));
    }
}
