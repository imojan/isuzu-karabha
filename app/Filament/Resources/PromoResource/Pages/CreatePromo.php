<?php

namespace App\Filament\Resources\PromoResource\Pages;

use App\Filament\Resources\PromoResource;
use App\Models\Promo;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreatePromo extends CreateRecord
{
    protected static string $resource = PromoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // slug dasar dari title bila kosong
        $base = $data['slug'] ?: Str::slug($data['title'] ?? '');
        $data['slug'] = $this->ensureUniqueSlug($base);

        // default published_at bila Tayang? = true tapi belum diisi
        if (($data['is_published'] ?? false) && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        return $data;
    }

    private function ensureUniqueSlug(string $slug): string
    {
        if ($slug === '') $slug = Str::random(8);

        $original = $slug; $i = 2;
        while (Promo::where('slug', $slug)->exists()) {
            $slug = $original.'-'.$i++;
        }
        return $slug;
    }
}
