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
                        Forms\Components\TextInput::make('nombre_empresa')
                            ->label('Nombre Empresa')
                            ->placeholder('Ingrese el nombre de la empresa')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contacto_principal')
                            ->label('Contacto Principal')
                            ->placeholder('Ingrese el contacto principal del proveedor')
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
                            ->maxLength(255),
                        Forms\Components\TextInput::make('direccion')
                            ->label('Dirección')
                            ->placeholder('Ingrese la dirección del proveedor')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('ruc_dni')
                            ->label('RUC/DNI')
                            ->placeholder('Ingrese el RUC o DNI del proveedor')
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
                //
                Tables\Columns\TextColumn::make('id_proveedor')
                    ->label('ID')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('nombre_empresa')
                    ->label('Nombre Empresa')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('contacto_principal')
                    ->label('Contacto Principal')
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
                    Tables\Columns\TextColumn::make('direccion')
                    ->label('Dirección')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('ruc-dni')
                    ->label('RUC/DNI')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\BooleanColumn::make('activo')
                    ->label('Activo')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de creación')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
