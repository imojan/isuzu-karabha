<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ArticleResource extends \Filament\Resources\Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $navigationLabel = 'Articles';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Artikel')->columns(2)->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(180)
                    ->live(onBlur: true) // generate saat user keluar dari field
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        if ($state) $set('slug', Str::slug($state));
                    }),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->helperText('Kosongkan untuk otomatis dari judul')
                    ->unique(ignoreRecord: true)
                    ->nullable(),

                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Thumbnail')->directory('articles')->disk('public')
                    ->image()->imageEditor()->columnSpanFull(),

                Forms\Components\Textarea::make('excerpt')->rows(3)->label('Ringkasan')->columnSpanFull(),
                Forms\Components\RichEditor::make('body')->label('Isi')->columnSpanFull(),

                Forms\Components\Toggle::make('is_published')->label('Tayang?')->default(true),
                Forms\Components\DateTimePicker::make('published_at')->label('Tanggal Tayang')->native(false),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')->disk('public')->square()->label('Thumb'),
                Tables\Columns\TextColumn::make('title')->wrap()->searchable()->sortable(),
                Tables\Columns\IconColumn::make('is_published')->boolean()->label('Tayang'),
                Tables\Columns\TextColumn::make('published_at')->dateTime()->label('Tayang Pada'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->since(),
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    protected static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        if (($data['is_published'] ?? false) && empty($data['published_at'])) $data['published_at'] = now();
        return $data;
    }

    protected static function mutateFormDataBeforeSave(array $data): array
    {
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        return $data;
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit'   => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
