<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProveedoresResource\Pages;
use App\Filament\Resources\ProveedoresResource\RelationManagers;
use App\Models\Proveedor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ProveedoresResource extends Resource
{
    protected static ?string $model = Proveedor::class;
    protected static ?string $navigationLabel = 'Proveedores';   // Menú 
    protected static ?string $pluralLabel = 'Proveedores';       // Títulos/plural

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                  Card::make('Llene los campos del proveedor')
                //
                ->schema([
                         Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->label('Nombre Empresa')
                            ->placeholder('Ingrese el nombre de la empresa')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('ruc')
                            ->label('RUC')
                            ->placeholder('Ingrese el RUC del proveedor')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('direccion')
                            ->label('Dirección')
                            ->placeholder('Ingrese la dirección del proveedor')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('telefono')
                            ->label('Teléfono')
                            ->placeholder('Ingrese el teléfono del proveedor')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->placeholder('Ingrese el email del proveedor')
                            ->required()
                            ->maxLength(255)
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
                    ->label('Nombre Empresa')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('ruc')
                    ->label('RUC')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('direccion')
                    ->label('Dirección')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->searchable()
                    ->sortable(),
                     Tables\Columns\TextColumn::make('email')
                    ->label('Email')
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
            'index' => Pages\ListProveedores::route('/'),
            'create' => Pages\CreateProveedores::route('/create'),
            'edit' => Pages\EditProveedores::route('/{record}/edit'),
        ];
    }
      public static function getNavigationGroup(): ?string
    {

        return 'Configuracion Base';
    }
}
