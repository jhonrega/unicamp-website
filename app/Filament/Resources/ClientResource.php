<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Gestión';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Nombre del Cliente')
                ->required()
                ->maxLength(255),

            FileUpload::make('logo')
                ->label('Logo del Cliente')
                ->disk('public') // Guarda en storage/app/public
                ->directory('clients') // Carpeta donde se almacenarán los logos
                ->image() // Solo permite imágenes
                ->preserveFilenames() // Mantiene el nombre original del archivo
                ->visibility('public') // Asegura que el archivo sea accesible públicamente
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('name')
                ->label('Nombre')
                ->searchable(),

            ImageColumn::make('logo')
                ->label('Logo')
                ->disk('public') // Asegura que busque en el disco 'public'
                ->size(50) // Ajusta el tamaño del logo en la tabla
                ->getStateUsing(fn ($record) => asset('storage/' . $record->logo)) // Genera la URL correcta
                ->circular(), // Opcional: hace que la imagen sea redonda
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
