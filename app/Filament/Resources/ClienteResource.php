<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClienteResource\Pages;
use App\Filament\Resources\ClienteResource\RelationManagers;
use App\Models\Cliente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\form;

class ClienteResource extends Resource
{
    protected static ?string $model = Cliente::class;

    protected static ?string $navigationIcon = 'lineawesome-user-secret-solid';
    protected static ?string $navigationGroup = "Clientes";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('direccion')
                ->maxLength(255),
                Forms\Components\TextInput::make('telefono')
                ->maxLength(255),
                Forms\Components\Select::make('tipo')
                ->options([
                    'granja' => 'Granja',
                    'fabrica' => 'Fabrica',
                    'empresa' => 'Empresa',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
               ->formatStateUsing(fn ($state) => strtoupper($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
                ->formatStateUsing(fn ($state) => strtoupper($state)),
                Tables\Columns\TextColumn::make('telefono')
                ->formatStateUsing(fn ($state) => strtoupper($state)),

                Tables\Columns\TextColumn::make('tipo')

                    ->formatStateUsing(fn ($state) => strtoupper($state))
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageClientes::route('/'),
        ];
    }
}
