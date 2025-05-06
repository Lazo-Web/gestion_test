<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FabricaResource\Pages;
use App\Filament\Resources\FabricaResource\RelationManagers;
use App\Models\Fabrica;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FabricaResource extends Resource
{
    protected static ?string $model = Fabrica::class;

    protected static ?string $navigationIcon = 'gmdi-factory-o';
    protected static ?string $navigationGroup = "Clientes";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required(),
                Forms\Components\TextInput::make('direccion')
                    ->required(),
                Forms\Components\TextInput::make('telefono')
                    ->tel()
                    ->required(),
                Forms\Components\Select::make('cliente_id')
                    ->relationship('cliente', 'id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cliente.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListFabricas::route('/'),
            'create' => Pages\CreateFabrica::route('/create'),
            'edit' => Pages\EditFabrica::route('/{record}/edit'),
        ];
    }
}
