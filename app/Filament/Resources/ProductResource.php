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
                ->schema([
                    TextInput::make('caracteristica')
                        ->label('Característica')
                        ->required(),
                    TextInput::make('medidas') // Asegúrate de que sea "medidas" en lugar de "descripción"
                        ->label('Medidas')
                        ->nullable(),
                ])
                ->columns(2),
            
            
            FileUpload::make('imagenes')
                ->label('Imágenes del producto')
                ->image()
                ->multiple()
                ->directory('products') // Guarda en storage/app/public/products
                ->disk('public') // Usa el disco 'public'
                ->preserveFilenames() // Mantiene el nombre original del archivo
                ->visibility('public')
                ->required(),

            FileUpload::make('pdf') // 📌 Campo para PDF
                ->label('Especificaciones Técnicas (PDF)')
                ->disk('public')
                ->directory('pdfs') // Se guardará en storage/app/public/pdfs
                ->acceptedFileTypes(['application/pdf'])
                ->maxSize(2048) // Máximo 2MB
                ->preserveFilenames()
                ->visibility('public'),
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
                    
                TextColumn::make('especificaciones')
                    ->label('Especificaciones')
                    ->formatStateUsing(function ($record) {
                        $especificaciones = is_string($record->especificaciones) 
                            ? json_decode($record->especificaciones, true) 
                            : $record->especificaciones;
                
                        if (empty($especificaciones)) {
                            return '-';
                        }
                
                        return "<ul style='padding-left: 20px; margin: 0;'>" . 
                            collect($especificaciones)->map(function ($item) {
                                $clave = $item['clave'] ?? 'Sin nombre';  
                                $medidas = $item['medidas'] ?? 'No especificado';
                                
                                return "<li><strong>" . ucfirst($clave) . ":</strong> {$medidas}</li>";
                            })->implode('') . 
                            "</ul>";
                    })
                    ->html(), // Permite mostrar HTML en la tabla
                
                
                
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
