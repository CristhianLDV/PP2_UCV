<?php

namespace App\Filament\Resources\UbicacionesResource\Pages;

use App\Filament\Resources\UbicacionesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUbicaciones extends ListRecords
{
    protected static string $resource = UbicacionesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
