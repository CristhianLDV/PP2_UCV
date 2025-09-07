<?php

namespace App\Filament\Resources\UbicacionesResource\Pages;

use App\Filament\Resources\UbicacionesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateUbicaciones extends CreateRecord
{
    protected static string $resource = UbicacionesResource::class;


     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

       protected function getCreatedNotification(): ?Notification
    {
        return null;
    }

        protected function afterCreate(): void
    {
        Notification::make()
            ->title('Ubicación creada exitosamente')
            ->body('La ubicación ha sido creada correctamente.')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
            ->label('Registrar')
            ->color('success'),

    
            $this->getCancelFormAction()
                ->label('Cancelar'),

        ];
    }
}
