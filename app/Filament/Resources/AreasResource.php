<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AreasResource\Pages;
use App\Filament\Resources\AreasResource\RelationManagers;
use App\Models\Areas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;


class AreasResource extends Resource
{
    protected static ?string $model = Areas::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Administracion';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')->required(),
                TextInput::make('ubicacion')->required(),
                TextInput::make('capacidad_maxima')->required()->numeric()->inputMode('decimal'),
                TextInput::make('encargado_de_area')->required(),
           
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')->sortable()->searchable(),
                TextColumn::make('ubicacion')->sortable()->searchable(),
                TextColumn::make('capacidad_maxima'),
                TextColumn::make('encargado_de_area'),
            ])
            ->filters([
                //
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
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAreas::route('/'),
            'create' => Pages\CreateAreas::route('/create'),
            'edit' => Pages\EditAreas::route('/{record}/edit'),
        ];
    }    
}
