<?php

namespace App\Filament\Resources\AreasResource\Pages;

use App\Filament\Resources\AreasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAreas extends EditRecord
{
    protected static string $resource = AreasResource::class;
    protected static ?string $navigationLabel = 'Crear Reportes';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getReddirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
}
