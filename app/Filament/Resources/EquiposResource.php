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
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

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
                            
                                Forms\Components\TextInput::make('codigo_patrimonial')
                                    ->label('Código Patrimonial')
                                    ->placeholder('Ingrese el código Patrimonial del equipo')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('nombre_equipo')
                                    ->label('Nombre del Equipo')
                                    ->placeholder('Ingrese el nombre del equipo')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('id_marca')
                                    ->label('Marca')
                                    ->relationship('marca', 'nombre') // relación definida en el modelo Marcas
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('nombre')
                                            ->label('Nombre de la marca')
                                            ->required(),
                                    
                                    ]),
                                    Forms\Components\Select::make('id_tipo_equipo')
                                    ->label('Equipo')
                                    ->relationship('tipo', 'nombre') // relación definida en el modelo Marcas
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('nombre')
                                            ->label('Nombre del tipo de equipo')
                                            ->required(),
                                    
                                    ]),
                                Forms\Components\TextInput::make('modelo')
                                    ->label('Modelo')
                                    ->placeholder('Ingrese el modelo del equipo')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('serie')
                                    ->label('Número de Serie')
                                    ->numeric()
                                    ->placeholder('Ingrese el número de serie del equipo')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('estado')
                                    ->label('Estado')
                                    ->options([
                                        'Asignado'   => 'Asignado',
                                        'Disponible' => 'Disponible',
                                        'Regular'     => 'Regular',
                                        'Malo'        => 'Malo',
                                        'Inoperativo' => 'Inoperativo',
                                    ])
                                    ->required()
                                    ->default('bueno')
                                    ->placeholder('Seleccione el estado'),
                                   // 🔗 Relación con componentes (Many-to-Many)
                            Forms\Components\Select::make('componentes')
                                ->label('Componentes')
                                ->multiple()
                                ->relationship('componentes', 'nombre')
                                ->preload()
                                ->searchable(),

                    ])
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                
                    Tables\Columns\TextColumn::make('codigo_patrimonial')
                    ->label('Código Patrimonial')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('nombre_equipo')
                    ->label('Equipo')
                    ->searchable()
                    ->sortable(),
                     Tables\Columns\TextColumn::make('tipo.nombre')
                    ->label('Marca')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('marca.nombre')
                    ->label('Marca')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('modelo')
                    ->label('Modelo')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('serie')
                    ->label('Número de Serie')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('estado')
                    ->label('Estado')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\BadgeColumn::make('componentes_count')
                    ->counts('componentes')
                    ->label('N° Componentes'),
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
