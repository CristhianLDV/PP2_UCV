<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarcaResource\Pages;
use App\Filament\Resources\MarcaResource\RelationManagers;
use App\Models\Marca;
use Filament\Forms\Components\Card;
use Filament\Notifications\Notification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MarcaResource extends Resource
{
    protected static ?string $model = Marca::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

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
                    ->placeholder('Ingrese el nombre de la Marca')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('imagen')
                     ->label('Imagen')
                    ->image() // Esto indica que solo se aceptan imágenes
                    ->directory('marcas') // Carpeta donde se guardará la imagen
                    ->maxSize(1024) // Tamaño máximo en KB
                    ->enableOpen() // Permite abrir la imagen desde el formulario
                    ->enableDownload(), // Permite descargar la imagen desde el formulario
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
                Tables\Columns\ImageColumn::make('imagen')
                ->label('Imagen')
                ->rounded(),
                Tables\Columns\BooleanColumn::make('activo')
                    ->label('Activo')
                    ->sortable()
                    ->searchable(),
                //
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
                            ->title('Marca eliminada exitosamente')
                            ->body('La marca ha sido eliminada correctamente.')
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
            'index' => Pages\ListMarcas::route('/'),
            'create' => Pages\CreateMarca::route('/create'),
            'edit' => Pages\EditMarca::route('/{record}/edit'),
        ];

    }

    public static function getNavigationGroup(): ?string
    {

        return 'Inventario';
    }
}
