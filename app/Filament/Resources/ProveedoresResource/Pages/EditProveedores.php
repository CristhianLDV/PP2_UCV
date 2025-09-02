<?php

namespace App\Filament\Resources\ProveedoresResource\Pages;

use App\Filament\Resources\ProveedoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditProveedores extends EditRecord
{
    protected static string $resource = ProveedoresResource::class;

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
            ->title('Proveedor actualizado exitosamente')
            ->body('El proveedor ha sido actualizado correctamente.')
            ->success()
            ->send();
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('Proveedor eliminado exitosamente')
                        ->body('El proveedor ha sido eliminado correctamente.')
                        ->success()

                ),
        ];
    }

}





