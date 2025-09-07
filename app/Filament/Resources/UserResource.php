<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'Usuarios';   // Menú lateral
    protected static ?string $pluralLabel = 'Usuarios';       // Títulos/plural
    protected static ?string $modelLabel = 'Usuario';         // Singular


    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Correo Electrónico')
                    ->required()
                    ->email()
                    ->maxLength(255),

                Forms\Components\TextInput::make('password')
                    ->label('Contraseña')
                    ->password()
                    ->required(fn (string $operation) => $operation === 'create') // obligatoria solo al crear
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null), // guarda encriptada

                    Forms\Components\Select::make('roles')
                        ->label('Roles')
                        ->multiple()
                        ->relationship('roles', 'name')
                        ->preload()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

            Tables\Columns\TextColumn::make('name')
                ->label('Nombre')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('email')
                ->label('Correo')
                ->searchable()
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
               Tables\Actions\EditAction::make()
                ->button()
                ->color('success'),
                Tables\Actions\DeleteAction::make()
                    ->button()
                    ->color('danger')
                    ->successNotification(
                        Notification::make()
                            ->title('Usuario eliminado exitosamente')
                            ->body('El usuario ha sido eliminado correctamente.')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Usuarios');
    }
       public static function getNavigationGroup(): ?string
    {

        return 'Seguridad';
    }
}
