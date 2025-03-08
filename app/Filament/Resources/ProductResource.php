<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Products';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),

                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->rows(3),

                Repeater::make('especificaciones')
                    ->label('Especificaciones')
                    ->schema([
                        TextInput::make('clave')->label('Característica')->required(),
                        TextInput::make('medidas')->label('Medidas')->required(),
                    ])
                    ->columnSpanFull(),

                FileUpload::make('imagenes') // Cambia 'images' por 'imagenes'
                    ->image()
                    ->multiple()
                    ->directory('products')
                    ->columnSpanFull(),
                
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('imagenes')
                    ->label('Imagen')
                    ->size(50), // Tamaño de miniatura
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
