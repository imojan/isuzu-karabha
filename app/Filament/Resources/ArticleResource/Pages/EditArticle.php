<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use App\Models\Article;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // pastikan slug ada & unik (abaikan record saat ini)
        $base = $data['slug'] ?: Str::slug($data['title'] ?? '');
        if ($base === '') $base = Str::random(8);

        $slug = $base;
        $original = $base;
        $i = 2;
        while (
            Article::where('slug', $slug)
                ->where('id', '!=', $this->record->id)
                ->exists()
        ) {
            $slug = $original.'-'.$i++;
        }
        $data['slug'] = $slug;

        return $data;
    }
}
