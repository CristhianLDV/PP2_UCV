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
                                    ->placeholder('Ingrese el valor de compra del equipo')
                                    ->required()
                                    ->maxLength(255),
                                    Forms\Components\TextInput::make('fecha_compra')
                                        ->label('Fecha de Compra')
                                        ->placeholder('Ingrese la fecha de compra del equipo')
                                        ->required()
                                        ->maxLength(255),
                                        Forms\Components\TextInput::make('fecha_garantia')
                                            ->label('Fecha de Garantía')
                                            ->placeholder('Ingrese la fecha de garantía del equipo')
                                            ->required()
                                            ->maxLength(255),
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
