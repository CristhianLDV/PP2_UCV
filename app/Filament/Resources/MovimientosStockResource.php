<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovimientosStockResource\Pages;
use App\Filament\Resources\MovimientosStockResource\RelationManagers;
use App\Models\MovimientoStock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovimientosStockResource extends Resource
{
    protected static ?string $model = MovimientoStock::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'index' => Pages\ListMovimientosStocks::route('/'),
            'create' => Pages\CreateMovimientosStock::route('/create'),
            'edit' => Pages\EditMovimientosStock::route('/{record}/edit'),
        ];
    }
     public static function getNavigationGroup(): ?string
    {

        return 'Operaciones';
    }
}
