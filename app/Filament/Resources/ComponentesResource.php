<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComponentesResource\Pages;
use App\Filament\Resources\ComponentesResource\RelationManagers;
use App\Models\Componente;
use App\Models\Categoria;
use App\Models\Proveedor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Card;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComponentesResource extends Resource
{
    protected static ?string $model = Componente::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

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
           
                Forms\Components\Textarea::make('nombre')
                    ->label('Nombre')
                    ->placeholder('Ingrese el nombre del componente')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('descripcion')
                    ->label('Descripción')
                    ->placeholder('Ingrese la descripción del componente')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('marca')
                    ->label('Marca')
                    ->placeholder('Ingrese la marca del componente')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('modelo')
                    ->label('Modelo')
                    ->placeholder('Ingrese el modelo del componente')
                    ->required()
                    ->maxLength(255),   
                Forms\Components\TextInput::make('tipo')
                    ->label('Tipo')
                    ->placeholder('Ingrese el tipo del componente')
                    ->required()
                    ->maxLength(255),
              Forms\Components\Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'excelente'   => 'Excelente',
                        'bueno'       => 'Bueno',
                        'regular'     => 'Regular',
                        'malo'        => 'Malo',
                        'inoperativo' => 'Inoperativo',
                    ])
                    ->required()
                    ->default('bueno')
                    ->placeholder('Seleccione el estado'),
            
                Forms\Components\Select::make('id_categoria')
                    ->label('Categoría')
                    ->options(
                        Categoria::all()->pluck('nombre', 'id_categoria')
                    )
                    ->required()
                    ->placeholder('Seleccione la categoría del componente'),
                Forms\Components\Select::make('id_proveedor')
                    ->label('Proveedor')
                    ->options(
                        Proveedor::all()->pluck('nombre_empresa', 'id_proveedor')
                    )
                    ->required()
                    ->placeholder('Seleccione el proveedor del componente'),
                Forms\Components\Toggle::make('activo')
                    ->label('Activo')
                    ->default(true),
                    ])
                 ])
            ]);
    
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nombre')
                ->label('Nombre')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                ->label('Descripción')
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
                Tables\Columns\TextColumn::make('tipo')
                ->label('Tipo')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('estado')
                ->label('  Estado')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('categoria.nombre')
                ->label('Categoría')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('proveedor.nombre_empresa')
                ->label('Proveedor')
                ->searchable()
                ->sortable(),
                Tables\Columns\BooleanColumn
                    ::make('activo')
                    ->label('Activo')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
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
            'index' => Pages\ListComponentes::route('/'),
            'create' => Pages\CreateComponentes::route('/create'),
            'edit' => Pages\EditComponentes::route('/{record}/edit'),
        ];
    }
       public static function getNavigationGroup(): ?string
    {
        
        return 'Inventario';
    }
}
