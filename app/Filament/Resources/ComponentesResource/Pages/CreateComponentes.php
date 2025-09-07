<?php

namespace App\Filament\Resources\ComponentesResource\Pages;

use App\Filament\Resources\ComponentesResource;
use Filament\Notifications\Notification;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComponentes extends CreateRecord
{
    protected static string $resource = ComponentesResource::class;
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
            ->title('Componente creado exitosamente')
            ->body('El componente ha sido creado correctamente.')
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
