<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EquiposResource\Pages;
    use App\Filament\Resources\EquiposResource\RelationManagers;
use App\Models\Categoria;
use App\Models\Equipo;
use App\Models\Proveedor;
use App\Models\ubicacion;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EquiposResource extends Resource
{
    protected static ?string $model = Equipo::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make('Llene los campos del equipo')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                            
                                Forms\Components\TextInput::make('codigo_inventario')
                                    ->label('Código de Inventario')
                                    ->placeholder('Ingrese el código de inventario del equipo')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('nombre')
                                    ->label('Nombre')
                                    ->placeholder('Ingrese el nombre del equipo')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('marca')
                                    ->label('Marca')
                                    ->placeholder('Ingrese la marca del equipo')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('modelo')
                                    ->label('Modelo')
                                    ->placeholder('Ingrese el modelo del equipo')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('numero_serie')
                                    ->label('Número de Serie')
                                    ->numeric()
                                    ->placeholder('Ingrese el número de serie del equipo')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('especificaciones')
                                    ->label('Especificaciones')
                                    ->placeholder('Ingrese las especificaciones del equipo')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Toggle::make('estado')
                                    ->label('Estado')
                                    ->onColor('success')
                                    ->offColor('danger')
                                    ->default(true),
                                Forms\Components\TextInput::make('valor_compra')
                                    ->label('Valor de Compra')
                                    ->numeric()
                                    ->prefix('S/') // Si quieres mostrar la moneda
                                    ->step(0.01) // Para permitir decimales
                                    ->placeholder('Ingrese el valor de compra del equipo')
                                    ->required()
                                     ->rules(['min:3', 'max:255'])
                                    ->maxLength(255),
                                    Forms\Components\DatePicker::make('fecha_compra')
                                        ->required(),
                                        Forms\Components\DatePicker::make('fecha_garantia')
                                            ->required(),
                                            Forms\Components\TextArea::make('observaciones')
                                                ->label('Observaciones')
                                                ->placeholder('Ingrese las observaciones del equipo')
                                                ->required()
                                                ->maxLength(255),
                                                Forms\Components\Select::make('id_categoria')
                                                    ->required()
                                                    ->label('Categoría')
                                                    ->placeholder('Seleccione la categoría del equipo')
                                                    ->options(
                                                        // Aquí puedes agregar las opciones para el select
                                                        Categoria::all()->pluck('nombre', 'id_categoria')
                                                    ),
                                                    Forms\Components\Select::make('id_ubicacion')
                                                        ->label('Ubicación')
                                                        ->placeholder('Seleccione la ubicación del equipo')
                                                        ->required()
                                                        ->options(
                                                            Ubicacion::all()->pluck('nombre', 'id_ubicacion')
                                                        ),
                                                        Forms\Components\Select::make('id_proveedor')
                                                            ->label('Proveedor')
                                                            ->placeholder('Seleccione el proveedor del equipo')
                                                            ->required()
                                                            ->options(
                                                                Proveedor::all()->pluck('nombre_empresa', 'id_proveedor')
                                                            ),
                                                        Forms\Components\Toggle::make('activo')
                                                            ->label('Activo')
                                                            ->default(true)
                    ])
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id_equipo')
                    ->label('ID')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('codigo_inventario')
                    ->label('Código de Inventario')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('marca')
                    ->label('Marca')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('modelo')
                    ->label('Modelo')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('numero_serie')
                    ->label('Número de Serie')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('categoria.nombre')
                    ->label('Categoría')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('ubicacion.nombre')
                    ->label('Ubicación')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('proveedor.nombre_empresa')
                    ->label('Proveedor')
                    ->searchable()
                    ->sortable(),
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
                            ->title('Equipo eliminado exitosamente')
                            ->body('El equipo ha sido eliminado correctamente.')
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
            'index' => Pages\ListEquipos::route('/'),
            'create' => Pages\CreateEquipos::route('/create'),
            'edit' => Pages\EditEquipos::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        
        return 'Inventario';
    }



}
