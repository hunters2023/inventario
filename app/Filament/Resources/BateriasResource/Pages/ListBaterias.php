<?php

namespace App\Filament\Resources\BateriasResource\Pages;

use App\Filament\Resources\BateriasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBaterias extends ListRecords
{
    protected static string $resource = BateriasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
