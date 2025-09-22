<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoResource\Pages;
use App\Filament\Resources\TipoResource\RelationManagers;
use App\Models\Categoria;
use App\Models\Tipo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipoResource extends Resource
{
    protected static ?string $model = Tipo::class;
    protected static ?string $navigationLabel = 'Tipos de Equipo';   // Menú lateral
    protected static ?string $pluralLabel = 'Tipos de Equipo';       // Títulos/plural
    protected static ?string $modelLabel = 'Tipos de Equipo';         // Singular

    protected static ?string $navigationIcon = 'heroicon-o-server';

    public static function form(Form $form): Form
    {
        return $form
             ->schema([
                 Card::make('Llene los campos del tipo de equipo')
                //
                ->schema([
                         Forms\Components\Grid::make(2)
                    ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre')
                    ->placeholder('Ingrese el nombre de la Marca')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('id_categoria')
                    ->label('Categoria')
                    ->relationship('categoria', 'nombre')
                    ->searchable()
                    ->placeholder('Seleccione la Categoria del equipo')
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nombre')
                            ->label('Nombre de la categoria')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('descripcion')
                            ->label('Descripcion de la categoria')
                            ->maxLength(255),
                    ]),
        
               
                                
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
                Tables\Columns\TextColumn::make('categoria.nombre')
                ->label('Categoria')
                ->sortable()
                ->searchable(),
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
                            ->title('Tipos de Equipo eliminado exitosamente')
                            ->body('El Tipos de Equipo ha sido eliminada correctamente.')
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
            'index' => Pages\ListTipos::route('/'),
            'create' => Pages\CreateTipo::route('/create'),
            'edit' => Pages\EditTipo::route('/{record}/edit'),
        ];
    }
        public static function getNavigationGroup(): ?string
    {

        return 'Inventario';
    }
}
