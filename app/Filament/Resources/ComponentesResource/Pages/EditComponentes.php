<?php

namespace App\Filament\Resources\ComponentesResource\Pages;

use App\Filament\Resources\ComponentesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditComponentes extends EditRecord
{
    protected static string $resource = ComponentesResource::class;
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
            ->title('Componente actualizado exitosamente')
            ->body('El componente ha sido actualizado correctamente.')
            ->success()
            ->send();
    }
    

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('Componente eliminado exitosamente')
                        ->body('El componente ha sido eliminado correctamente.')
                        ->success()

                ),
        ];
    }
   
}
