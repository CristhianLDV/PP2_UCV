<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuditoriasResource\Pages;
use App\Filament\Resources\AuditoriasResource\RelationManagers;
use App\Models\Auditoria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuditoriasResource extends Resource
{
    protected static ?string $model = Auditoria::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

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
            'index' => Pages\ListAuditorias::route('/'),
            'create' => Pages\CreateAuditorias::route('/create'),
            'edit' => Pages\EditAuditorias::route('/{record}/edit'),
        ];
    }
      public static function getNavigationGroup(): ?string
    {

        return 'Seguridad';
    }
}
