<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TelefonoIPResource\Pages;
use App\Filament\Resources\TelefonoIPResource\RelationManagers;
use App\Models\TelefonoIP;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;

class TelefonoIPResource extends Resource
{
    protected static ?string $model = TelefonoIP::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?string $navigationGroup = 'Equipos';
    protected static ?string $navigationLabel = 'Telefonos IP';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')->required(),
                TextInput::make('ubicacion')->required(),
                TextInput::make('marca')->required(),
                TextInput::make('modelo')->required(),
                TextInput::make('numero_serie')->required(),
                TextInput::make('codigo_inventario')->required(),
                TextInput::make('mac_address')->required(),
                TextInput::make('estado')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('codigo_inventario')->sortable()->searchable(),
                TextColumn::make('numero_serie'),
                TextColumn::make('nombre')->sortable()->searchable(),
                TextColumn::make('ubicacion')->sortable()->searchable(),
                TextColumn::make('marca'),
                TextColumn::make('modelo'),
                TextColumn::make('mac_address'),
                TextColumn::make('estado'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ],position: ActionsPosition::BeforeColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTelefonoIPS::route('/'),
            'create' => Pages\CreateTelefonoIP::route('/create'),
            'edit' => Pages\EditTelefonoIP::route('/{record}/edit'),
        ];
    }    
}
