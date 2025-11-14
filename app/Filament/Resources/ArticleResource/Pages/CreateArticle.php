<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use App\Models\Article;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // isi slug jika kosong
        $base = $data['slug'] ?: Str::slug($data['title'] ?? '');
        $data['slug'] = $this->ensureUniqueSlug($base);

        // isi published_at default saat tayang = true tapi user tidak set tanggal
        if (($data['is_published'] ?? false) && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        return $data;
    }

    private function ensureUniqueSlug(string $slug): string
    {
        if ($slug === '') $slug = Str::random(8);

        $original = $slug;
        $i = 2;
        while (Article::where('slug', $slug)->exists()) {
            $slug = $original.'-'.$i++;
        }
        return $slug;
    }
}
