<?php

namespace App\Filament\Widgets;

use App\Models\Categoria;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Equipo;
use App\Models\User;
use App\Models\Componente;

class EquiposStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //

            /* Stat::make('Usuarios', User::count())
                ->description('Total de usuarios registrados')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),
            Stat::make('Núevas Categorías', Categoria::count())
                ->description('Total de categorías registradas')
                ->descriptionIcon('heroicon-o-computer-desktop')
                ->color('success'),
            Stat::make('Núevos Equipos', Equipo::count())
                ->description('Total de equipos registrados')
                ->descriptionIcon('heroicon-o-computer-desktop')
                ->color('info'),
            Stat::make('Núevos Componentes', Componente::count())
                ->description('Total de componentes registrados')
                ->descriptionIcon('heroicon-o-cog')
                ->color('warning'), */
            

        ];
    }
}
