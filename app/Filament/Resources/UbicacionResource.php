<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UbicacionResource\Pages;
use App\Filament\Resources\UbicacionResource\RelationManagers;
use App\Models\Ubicacion;
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

class UbicacionResource extends Resource
{
    protected static ?string $model = Ubicacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-eye';
    protected static ?string $navigationLabel = 'Ubicaciones';
    protected static ?string $navigationGroup = 'Administracion';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ubicacion')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ubicacion'),
                TextColumn::make('created_at'),
                TextColumn::make('updated_at'),
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
            'index' => Pages\ListUbicacions::route('/'),
            'create' => Pages\CreateUbicacion::route('/create'),
            'edit' => Pages\EditUbicacion::route('/{record}/edit'),
        ];
    }    
}
