<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CpuResource\Pages;
use App\Filament\Resources\CpuResource\RelationManagers;
use App\Models\Cpu;
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

class CpuResource extends Resource
{
    protected static ?string $model = Cpu::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
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
                TextInput::make('procesador')->required(),
                TextInput::make('disco_duro')->required(),
                TextInput::make('memoria_ram')->required(),
                TextInput::make('tarjeta_inalambrica')->required(),
                TextInput::make('tarjeta_video')->required(),
                TextInput::make('sistema_operativo')->required(),
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
                TextColumn::make('procesador'),
                TextColumn::make('disco_duro'),
                TextColumn::make('memoria_ram'),
                TextColumn::make('tarjeta_inalambrica'),
                TextColumn::make('tarjeta_video'),
                TextColumn::make('sistema_operativo'),
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
            'index' => Pages\ListCpu::route('/'),
            'create' => Pages\CreateCpu::route('/create'),
            'edit' => Pages\EditCpu::route('/{record}/edit'),
        ];
    }    
}
