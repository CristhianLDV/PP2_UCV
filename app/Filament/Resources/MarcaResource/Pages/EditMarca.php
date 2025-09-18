<?php

namespace App\Filament\Resources\MarcaResource\Pages;

use App\Filament\Resources\MarcaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditMarca extends EditRecord
{
    protected static string $resource = MarcaResource::class;

     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return null;
    }
    
    protected function afterSave()
    {
        Notification::make()
            ->title('Marca actualizado exitosamente')
            ->body('La Marca ha sido actualizado correctamente.')
            ->success()
            ->send();
    }
     protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('Marca eliminado exitosamente')
                        ->body('La Marca ha sido eliminado correctamente.')
                        ->success()

                ),
        ];
}
}
