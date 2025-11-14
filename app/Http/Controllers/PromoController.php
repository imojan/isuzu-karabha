<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    public function index()
{
    $promos = \App\Models\Promo::where('is_published',1)
        ->orderByDesc('published_at')->paginate(9);
    return view('public.promos.index', compact('promos'));
}

public function show(string $slug)
{
    $promo = \App\Models\Promo::where('slug',$slug)->where('is_published',1)->firstOrFail();
    return view('public.promos.show', compact('promo'));
}

}
