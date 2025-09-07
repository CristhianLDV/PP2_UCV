<?php

namespace App\Filament\Resources\EquiposResource\Pages;

use App\Filament\Resources\EquiposResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateEquipos extends CreateRecord
{
    protected static string $resource = EquiposResource::class;

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
            ->title('Equipo creado exitosamente')
            ->body('El equipo ha sido creado correctamente.')
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





 
 



