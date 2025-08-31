<?php

namespace App\Filament\Resources\ReporteIncidenciasResource\Pages;

use App\Filament\Resources\ReporteIncidenciasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReporteIncidencias extends EditRecord
{
    protected static string $resource = ReporteIncidenciasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
