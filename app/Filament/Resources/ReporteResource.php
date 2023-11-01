<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReporteResource\Pages;
use App\Filament\Resources\ReporteResource\RelationManagers;
use App\Models\Reporte;
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
use Filament\Forms\Components\Checkbox;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Section;

class ReporteResource extends Resource
{
    protected static ?string $model = Reporte::class;
    protected static ?string $navigationGroup = 'Reportes';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'solicitud de equipo de mantenimiento';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               
                    Section::make('notificion')
                    ->description('solicitud de equipo de mantenimiento')
                    ->schema([
                        DatePicker::make('fecha')->required()->extraAttributes(['title' => 'Text input']),
                    TextInput::make('numero')->required() ->maxLength(255)->numeric()->inputMode('decimal'),
                     
                    Select::make('area')->required()->options(['draft' => 'Draft',
                        'reviewing' => 'Reviewing',
                        'published' => 'Published',]),
      
                    TextInput::make('solicitante')->required() ->maxLength(255),
                    
                    TextInput::make('codigo')->required(),
                    ]) ->columns(3)  ,             
                   
                    
    
                    Section::make('Material')
                    ->description('En que entorno es el problema')
                    ->schema([
                     
                        Checkbox::make('infraestructura'),
                        Checkbox::make('mobiliaria'),
                    
                        Checkbox::make('equipos_maquinarias'),
                    ]) ->columns(3) ,             
                   
                    
    
                    Section::make('detalles')
                    ->description('En que entorno es el problema')
                    ->schema([
                     
                        
                    TextInput::make('detallar_parte')->required(),
                    TextInput::make('cantidad')->required()->numeric()->inputMode('decimal'),
                    RichEditor::make('descripcion')->required()
                            ->hint('Translatable')
                            ->hintColor('primary')
                            ->columnSpanfull(),
                    
                    ]) ->columns(2)  ,                   
    
                    Section::make('Validacion')
                    ->description('En que entorno es el problema')
                    ->schema([
                        TextInput::make('firma_del_responsable')->helperText('Firma del encargado del area')->required()->columnSpanfull(),
                        TextInput::make('autorizado_por')->helperText('Autorización de servicio generales')->required()->columnSpanfull(),
                        
                    
                    ]) ->columns(2),                   
            
    
                    Section::make('Priorización del mantenimiento:')
                    ->description('uso esclusivo de servicios generales')
                    ->schema([
                     
                        
                    Checkbox::make('grave'),
                    Checkbox::make('leve'),
                    Checkbox::make('critica'),
                  
                    
                    ]) ->columns(3)  , 
    
                   
    
    
                   
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fecha')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('numero')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('area')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('solicitante')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('infraestructura')->boolean(),
                //TextColumn::make('infraestructura')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('mobiliaria')->boolean(),
                //TextColumn::make('mobiliaria')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('equipos_maquinarias')->boolean(),
                //TextColumn::make('equipos_maquinarias')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('detallar_parte')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('cantidad')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('descripcion')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('frima_del_responsable')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('autorizado_por')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('grave')->boolean(),
                //TextColumn::make('grave')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('leve')->boolean(),
                IconColumn::make('critica')->boolean(),
                TextColumn::make('created_at')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->sortable()->searchable() ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\viewAction::make(),
              
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
            'index' => Pages\ListReportes::route('/'),
            'create' => Pages\CreateReporte::route('/create'),
            'edit' => Pages\EditReporte::route('/{record}/edit'),
        ];
    }    
}
