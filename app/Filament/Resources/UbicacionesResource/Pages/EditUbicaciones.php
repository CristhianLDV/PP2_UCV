<?php

namespace App\Filament\Resources\UbicacionesResource\Pages;

use App\Filament\Resources\UbicacionesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditUbicaciones extends EditRecord
{
    protected static string $resource = UbicacionesResource::class;

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
            ->title('Ubicación actualizada exitosamente')
            ->body('La ubicación ha sido actualizada correctamente.')
            ->success()
            ->send();
    }
    

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('Ubicación eliminada exitosamente')
                        ->body('La ubicación ha sido eliminada correctamente.')
                        ->success()

                ),
        ];
    }
}
