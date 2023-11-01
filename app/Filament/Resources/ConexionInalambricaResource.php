<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConexionInalambricaResource\Pages;
use App\Filament\Resources\ConexionInalambricaResource\RelationManagers;
use App\Models\ConexionInalambrica;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Card;
use Filament\Infolists\Components\TextEntry;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Enums\ActionsPosition;

class ConexionInalambricaResource extends Resource
{
    protected static ?string $model = ConexionInalambrica::class;

    protected static ?string $navigationIcon = 'heroicon-o-Signal';
    protected static ?string $navigationGroup = 'Equipos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')->required(),
                TextInput::make('ubicacion')->required(),
                TextInput::make('marca'),
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
                TextColumn::make('numero_serie')->sortable(),
                TextColumn::make('nombre')->sortable()->searchable(),
                TextColumn::make('ubicacion')->sortable()->searchable(),
                TextColumn::make('marca')->sortable(),
                TextColumn::make('modelo')->sortable(),
                TextColumn::make('estado'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\viewAction::make(),
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
            'index' => Pages\ListConexionInalambricas::route('/'),
            'create' => Pages\CreateConexionInalambrica::route('/create'),
            'edit' => Pages\EditConexionInalambrica::route('/{record}/edit'),
        ];
    }    
}
