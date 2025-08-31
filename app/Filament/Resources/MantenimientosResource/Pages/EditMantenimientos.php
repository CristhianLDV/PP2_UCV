<?php

namespace App\Filament\Resources\MantenimientosResource\Pages;

use App\Filament\Resources\MantenimientosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMantenimientos extends EditRecord
{
    protected static string $resource = MantenimientosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
