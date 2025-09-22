<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsignacionesResource\Pages;
use App\Filament\Resources\AsignacionesResource\RelationManagers;
use App\Models\Asignacion;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\Equipo;
use App\Models\Componente;
use App\Models\User;
use App\Models\Area;
use App\Models\Ubicacion;
use Filament\Resources\Resource;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Card;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AsignacionesResource extends Resource
{
    protected static ?string $model = Asignacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
         return $form
           ->schema([
                 Card::make('Llene los campos del componente')
                //
                ->schema([
                         Forms\Components\Grid::make(2)
                    ->schema([
                        // AGREGAR ESTE CAMPO - ES OBLIGATORIO
                         Forms\Components\Select::make('asignable_type')
                ->label('Tipo de Asignación')
                ->options([
                    Equipo::class => 'Equipo',
                    Componente::class => 'Componente',
                ])
                ->reactive()
                ->required(),

            Forms\Components\Select::make('asignable_id')
                ->label('Seleccionar Item')
                ->options(function (callable $get) {
                    if ($get('asignable_type') === Equipo::class) {
                        return Equipo::pluck('nombre_equipo', 'id_equipo');
                    }
                    if ($get('asignable_type') === Componente::class) {
                        return Componente::pluck('nombre', 'id_componente');
                    }
                    return [];
                })
                ->required()
                ->searchable(),

            Forms\Components\Select::make('id_usuario')
                ->label('Usuario Responsable')
                ->options(User::pluck('name', 'id'))
                ->searchable()
                ->required(),

            Forms\Components\Select::make('id_area')
                ->label('Área (Opcional)')
                ->options(Area::pluck('nombre', 'id_area'))
                ->searchable(),

            Forms\Components\Select::make('id_ubicacion')
                ->label('Ubicación Física (Opcional)')
                ->options(Ubicacion::pluck('nombre', 'id_ubicacion'))
                ->searchable(),

            Forms\Components\DatePicker::make('fecha_asignacion')
                ->label('Fecha de Asignación')
                ->default(now())
                ->required(),

            Forms\Components\DatePicker::make('fecha_devolucion')
                ->label('Fecha de Devolución')
                ->minDate(now()),

            Forms\Components\Select::make('estado')
                ->label('Estado')
                ->options([
                      'asignado' => 'Asignado',
                        'devuelto' => 'Devuelto',
                            'retrasado' => 'Retrasado',
                                'perdido' => 'Perdido',
                ])
                ->default('asignado')
                ->required(),

            Forms\Components\Textarea::make('observacion')
                ->label('Observaciones')
                ->rows(3),
                     ])
                 ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            Tables\Columns\TextColumn::make('id_asignacion')
            ->label('ID')
            ->sortable(),
            Tables\Columns\TextColumn::make('asignable_type')
                ->label('Tipo')
                ->formatStateUsing(fn($state) => $state === Equipo::class ? 'Equipo' : 'Componente')
                ->sortable(),
            Tables\Columns\TextColumn::make('asignable')
            ->label('Elemento')
            ->formatStateUsing(function ($record) {
                if (! $record) return '-';
                if ($record->asignable_type === \App\Models\Equipo::class) {
                    return $record->asignable?->nombre_equipo ?? '—';
                }
                if ($record->asignable_type === \App\Models\Componente::class) {
                    return $record->asignable?->nombre ?? '—';
                }
                return '—';
            })
            ->sortable(),
            Tables\Columns\TextColumn::make('usuario.name')->label('Usuario'),
            Tables\Columns\TextColumn::make('area.nombre')->label('Área'),
            Tables\Columns\TextColumn::make('ubicacion.nombre')->label('Ubicación'),
            Tables\Columns\TextColumn::make('fecha_asignacion')->date()->label('Asignado el'),
            Tables\Columns\TextColumn::make('fecha_devolucion')->date()->label('Devuelto el'),
            Tables\Columns\BadgeColumn::make('estado')
                ->colors([
                        'success' => 'asignado',
                        'danger'  => 'devuelto',
                        'warning' => 'retrasado',
                        'secondary' => 'perdido',
                ]),


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->button()
                ->color('success'),
                Tables\Actions\DeleteAction::make()
                    ->button()
                    ->color('danger')
                    ->successNotification(
                        Notification::make()
                            ->title('Componente eliminado exitosamente')
                            ->body('El componente ha sido eliminado correctamente.')
                            ->success()
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAsignaciones::route('/'),
            'create' => Pages\CreateAsignaciones::route('/create'),
            'edit' => Pages\EditAsignaciones::route('/{record}/edit'),
        ];
    }
    public static function getNavigationGroup(): ?string
    {

        return 'Asignaciones';
    }
}
