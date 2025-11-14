<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    PromoController,
    ProductController,
    ArticleController,
    GalleryController,
    ContactController
};

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['en','id'])) {
        session(['app_locale' => $locale]);
        app()->setLocale($locale);
    }
    return back();
})->name('lang.switch');

// Halaman promo
Route::prefix('promo')->name('promos.')->group(function () {
    Route::get('/', [PromoController::class, 'index'])->name('index');
    Route::get('/{slug}', [PromoController::class, 'show'])->name('show');
});

Route::prefix('produk')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/{slug}', [ProductController::class, 'show'])->name('show');
});

// Halaman artikel
Route::prefix('artikel')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('/{slug}', [ArticleController::class, 'show'])->name('show');
});

// Halaman galeri
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');

// Halaman kontak
Route::get('/kontak', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/kontak', [ContactController::class, 'submit'])->name('contact.submit');
