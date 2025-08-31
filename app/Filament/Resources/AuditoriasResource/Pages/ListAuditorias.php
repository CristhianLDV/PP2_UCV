<?php

namespace App\Filament\Resources\AuditoriasResource\Pages;

use App\Filament\Resources\AuditoriasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAuditorias extends ListRecords
{
    protected static string $resource = AuditoriasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
