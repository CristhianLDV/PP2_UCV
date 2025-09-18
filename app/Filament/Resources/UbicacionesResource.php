<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UbicacionesResource\Pages;
use App\Filament\Resources\UbicacionesResource\RelationManagers;
use App\Models\Ubicacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;


class UbicacionesResource extends Resource
{
    protected static ?string $model = Ubicacion::class;
    protected static ?string $navigationLabel = 'Ubicaciones';   // Menú lateral
    protected static ?string $pluralLabel = 'Ubicaciones';       // Títulos/pl

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
        Card::make('Llene los campos de la ubicación')
                //
                ->schema([
                         Forms\Components\Grid::make(2)
                    ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre')
                    ->placeholder('Ingrese el nombre de la ubicación')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion')
                    ->label('Descripción')
                    ->placeholder('Ingrese la descripción de la ubicación')
                    ->required()
                    ->maxLength(255),
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
            
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->sortable()
                    ->searchable(),
                 Tables\Columns\BooleanColumn::make('activo')
                    ->label('Activo')
                    ->sortable()
                    ->searchable(),
      
            ])
            ->filters([
                //ss
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
                            ->title('Ubicación eliminada exitosamente')
                            ->body('La ubicación ha sido eliminada correctamente.')
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
            'index' => Pages\ListUbicaciones::route('/'),
            'create' => Pages\CreateUbicaciones::route('/create'),
            'edit' => Pages\EditUbicaciones::route('/{record}/edit'),
        ];
    }
    public static function getNavigationGroup(): ?string
    {

        return 'Configuracion Base';
    }
}
