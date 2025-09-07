<?php

namespace App\Filament\Resources\EquiposResource\Pages;

use App\Filament\Resources\EquiposResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditEquipos extends EditRecord
{
    protected static string $resource = EquiposResource::class;

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
            ->title('Equipo actualizado exitosamente')
            ->body('El equipo ha sido actualizado correctamente.')
            ->success()
            ->send();
    }
    

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('Equipo eliminado exitosamente')
                        ->body('El equipo ha sido eliminado correctamente.')
                        ->success()

                ),
        ];
    }
}
