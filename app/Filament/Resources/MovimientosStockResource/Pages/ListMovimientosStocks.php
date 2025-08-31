<?php

namespace App\Filament\Resources\MovimientosStockResource\Pages;

use App\Filament\Resources\MovimientosStockResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMovimientosStocks extends ListRecords
{
    protected static string $resource = MovimientosStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
