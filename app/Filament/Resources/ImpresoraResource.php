<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImpresoraResource\Pages;
use App\Filament\Resources\ImpresoraResource\RelationManagers;
use App\Models\Impresora;
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

class ImpresoraResource extends Resource
{
    protected static ?string $model = Impresora::class;

    protected static ?string $navigationIcon = 'heroicon-o-printer';
    protected static ?string $navigationGroup = 'Equipos';

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
            'index' => Pages\ListImpresoras::route('/'),
            'create' => Pages\CreateImpresora::route('/create'),
            'edit' => Pages\EditImpresora::route('/{record}/edit'),
        ];
    }    
}
