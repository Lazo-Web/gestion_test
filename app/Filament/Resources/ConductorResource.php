<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConductorResource\Pages;
use App\Filament\Resources\ConductorResource\RelationManagers;
use App\Models\Conductor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConductorResource extends Resource
{
    protected static ?string $model = Conductor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('apellido')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('dni')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('direccion')
                ->maxLength(255)
                ->default(null),
            Forms\Components\TextInput::make('ciudad')
                ->maxLength(255)
                ->default(null),
            Forms\Components\TextInput::make('provincia')
                ->maxLength(255)
                ->default(null),
            Forms\Components\TextInput::make('cod_postal')
                ->maxLength(255)
                ->default(null),
            Forms\Components\TextInput::make('telefono')
                ->tel()
                ->required()
                ->maxLength(255),
            Forms\Components\DatePicker::make('permiso_conducir_fecha'),
            Forms\Components\DatePicker::make('targeta_tacografo_vencimiento'),

            Forms\Components\DatePicker::make('capacitacion_vencimiento'),

            Forms\Components\DatePicker::make('fecha_nacimiento'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                    ->searchable(),
                Tables\Columns\TextColumn::make('dni')
                ->formatStateUsing(fn ($state) => strtoupper($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('ciudad')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('provincia')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('cod_postal')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('permiso_conducir_fecha')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                ->toggleable(isToggledHiddenByDefault: true)
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('targetatacografo_vencimiento')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                ->toggleable(isToggledHiddenByDefault: true)
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('capacitacion_vencimiento')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                ->toggleable(isToggledHiddenByDefault: true)
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_nacimiento')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                ->toggleable(isToggledHiddenByDefault: true)
                    ->date()
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
            'index' => Pages\ListConductors::route('/'),
            'create' => Pages\CreateConductor::route('/create'),
            'edit' => Pages\EditConductor::route('/{record}/edit'),
        ];
    }
}
