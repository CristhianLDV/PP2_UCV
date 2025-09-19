<?php

namespace App\Filament\Resources\TipoResource\Pages;

use App\Filament\Resources\TipoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditTipo extends EditRecord
{
    protected static string $resource = TipoResource::class;
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
            ->title('Tipos de Equipo actualizado exitosamente')
            ->body('El Tipos de Equipo ha sido actualizado correctamente.')
            ->success()
            ->send();
    }
     protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('Tipos de Equipo eliminado exitosamente')
                        ->body('El Tipos de Equipo ha sido eliminado correctamente.')
                        ->success()

                ),
        ];
}

}
