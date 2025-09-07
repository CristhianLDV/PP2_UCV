<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriasResource\Pages;
use App\Filament\Resources\CategoriasResource\RelationManagers;
use App\Models\Categoria;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Expr\Cast\String_;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\SelectFilter;

class CategoriasResource extends Resource
{
    protected static ?string $model = Categoria::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Card::make('Llene los campos de la categoría')
                //
                ->schema([
                         Forms\Components\Grid::make(2)
                    ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre')
                    ->placeholder('Ingrese el nombre de la categoría')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion')
                    ->label('Descripción')
                    ->placeholder('Ingrese la descripción de la categoría')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('codigo')
                    ->label('Código')
                    ->placeholder('Ingrese el código de la categoría')
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
                Tables\Columns\TextColumn::make('id_categoria')
                    ->label('ID')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('codigo')
                    ->label('Código')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\BooleanColumn::make('activo')
                    ->label('Activo')
                    ->sortable(),
                ])
            ->filters([
                //
                SelectFilter::make('activo')
                    ->label('Activo')
                    ->options([
                        '1' => '✅ Activas',
                        '0' => '❌ Inactivas',
                    ])
                    ->placeholder('📋 Todas las categorías')
                    ->label('Estado de la categoría'),


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
                            ->title('Categoría eliminada exitosamente')
                            ->body('La categoría ha sido eliminada correctamente.')
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
            'index' => Pages\ListCategorias::route('/'),
            'create' => Pages\CreateCategorias::route('/create'),
            'edit' => Pages\EditCategorias::route('/{record}/edit'),
        ];
    }
    public static function getNavigationGroup(): ?string
    {

        return 'Configuracion Base';
    }
}
