<?php

namespace App\Filament\Resources\AuditoriasResource\Pages;

use App\Filament\Resources\AuditoriasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuditorias extends EditRecord
{
    protected static string $resource = AuditoriasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
