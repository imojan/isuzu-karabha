<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends \Filament\Resources\Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $navigationLabel = 'Products';

    public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\Section::make('Data Produk')->columns(2)->schema([
            // 🟢 Nama otomatis mengisi slug saat diisi
            Forms\Components\TextInput::make('name')
                ->label('Nama')
                ->required()
                ->maxLength(150)
                ->live(onBlur: true) // generate slug saat user keluar dari field
                ->afterStateUpdated(function (Forms\Set $set, ?string $state) {
                    if ($state) {
                        $set('slug', \Illuminate\Support\Str::slug($state));
                    }
                }),

            // 🟢 Slug bisa dikosongkan, akan otomatis dibuat oleh hook di bawah
            Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->unique(ignoreRecord: true)
                ->helperText('Kosongkan untuk otomatis dari nama')
                ->nullable(),

            Forms\Components\FileUpload::make('image')
                ->label('Gambar')
                ->directory('products')
                ->disk('public')
                ->image()
                ->imageEditor()
                ->columnSpanFull(),

            Forms\Components\Textarea::make('excerpt')
                ->rows(3)
                ->label('Ringkasan')
                ->columnSpanFull(),

            Forms\Components\RichEditor::make('body')
                ->label('Deskripsi / Spesifikasi')
                ->columnSpanFull(),

            Forms\Components\Toggle::make('is_published')
                ->label('Tayang?')
                ->default(true),
        ]),
    ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->disk('public')->square(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('is_published')->boolean()->label('Tayang'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->since(),
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    protected static function mutateFormDataBeforeCreate(array $data): array
    { $data['slug'] = $data['slug'] ?: Str::slug($data['name']); return $data; }

    protected static function mutateFormDataBeforeSave(array $data): array
    { $data['slug'] = $data['slug'] ?: Str::slug($data['name']); return $data; }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit'   => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
