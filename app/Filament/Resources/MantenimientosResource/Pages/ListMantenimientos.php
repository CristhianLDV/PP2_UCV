<?php

namespace App\Filament\Resources\MantenimientosResource\Pages;

use App\Filament\Resources\MantenimientosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMantenimientos extends ListRecords
{
    protected static string $resource = MantenimientosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
