<?php

namespace App\Filament\Resources\ComponentesResource\Pages;

use App\Filament\Resources\ComponentesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComponentes extends EditRecord
{
    protected static string $resource = ComponentesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
