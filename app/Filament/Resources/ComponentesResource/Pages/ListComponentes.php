<?php

namespace App\Filament\Resources\ComponentesResource\Pages;

use App\Filament\Resources\ComponentesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Notifications\Notification;
use Filament\Forms;
use Filament\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ComponentesImport;

class ListComponentes extends ListRecords
{
    protected static string $resource = ComponentesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
             
            Action::make('descargar_plantilla')
            ->label('Descargar Plantilla')
            ->icon('heroicon-o-arrow-down-tray')
            ->color('success') 
           ->url(route('componentes.plantilla'))
            ->openUrlInNewTab(false), // descarga directa
               
            Action::make('importar')
                ->label('Importar Componentes')
                ->icon('heroicon-o-arrow-up-tray')
                ->color('warning') // Botón amarillo
                ->form([
                    Forms\Components\FileUpload::make('archivo')
                        ->label('Archivo Excel/CSV')
                        ->required()
                        ->storeFiles(false) // 👈 evita que se guarde en storage
                        ->acceptedFileTypes([
                            'text/csv',
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        ]),
                ])
                
                        
                ->action(function (array $data) {
                    Excel::import(new ComponentesImport, $data['archivo']->getRealPath());

                    Notification::make()
                        ->title('Importación exitosa')
                        ->body('Se han importado los componentes correctamente.')
                        ->success()
                        ->send();
                }),
      
        ];
    }
}
