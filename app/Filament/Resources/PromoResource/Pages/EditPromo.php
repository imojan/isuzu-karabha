<?php

namespace App\Filament\Resources\PromoResource\Pages;

use App\Filament\Resources\PromoResource;
use App\Models\Promo;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditPromo extends EditRecord
{
    protected static string $resource = PromoResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $base = $data['slug'] ?: Str::slug($data['title'] ?? '');
        if ($base === '') $base = Str::random(8);

        $slug = $base; $original = $base; $i = 2;
        while (
            Promo::where('slug', $slug)
                 ->where('id', '!=', $this->record->id)
                 ->exists()
        ) {
            $slug = $original.'-'.$i++;
        }
        $data['slug'] = $slug;

        return $data;
    }
}
