<?php

namespace App\Filament\Resources\AsignacionesResource\Pages;

use App\Filament\Resources\AsignacionesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAsignaciones extends ListRecords
{
    protected static string $resource = AsignacionesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
