<?php

namespace App\Filament\Resources\AreaResource\Pages;

use App\Filament\Resources\AreaResource;
use Filament\Notifications\Notification;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArea extends EditRecord
{
    protected static string $resource = AreaResource::class;

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
            ->title('Área actualizada exitosamente')
            ->body('La área ha sido actualizada correctamente.')
            ->success()
            ->send();
    }
        

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('Área eliminada exitosamente')
                        ->body('La área ha sido eliminada correctamente.')
                        ->success()

                ),
        ];
    }

}








