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
                 Forms\Components\Select::make('id_marca')
                    ->label('Marca')
                    ->relationship('marca', 'nombre') // relación definida en el modelo Marcas
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nombre')
                            ->label('Nombre del tipo')
                            ->required(),
                       
                    ]),
                Forms\Components\TextInput::make('modelo')
                    ->label('Modelo')
                    ->placeholder('Ej: Inspiron, DDR4, SSD NVM')
                    ->required()
                    ->maxLength(255),   
                Forms\Components\TextInput::make('serie')
                    ->label('Número de serie')
                    ->placeholder('Ej: SN123456789')
                    ->maxLength(100),
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
                Tables\Columns\TextColumn::make('modelo')
                ->label('Modelo')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('serie')
                ->label('Serie')
                ->searchable()
                ->sortable(),
                  Tables\Columns\TextColumn::make('marca.nombre')
                ->label('Marca')
                ->sortable()
                ->searchable(),
                 Tables\Columns\TextColumn::make('estado')
                ->label('Estado')
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
