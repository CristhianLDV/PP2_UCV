<?php

namespace App\Filament\Resources\TipoResource\Pages;

use App\Filament\Resources\TipoResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTipo extends CreateRecord
{
    protected static string $resource = TipoResource::class;
    
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
            ->title('Tipos de Equipo creado exitosamente')
            ->body('El Tipos de Equipo ha sido creada correctamente.')
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
