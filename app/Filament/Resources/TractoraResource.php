<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TractoraResource\Pages;
use App\Filament\Resources\TractoraResource\RelationManagers;
use App\Models\Tractora;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TractoraResource extends Resource
{
    protected static ?string $model = Tractora::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Equipación";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('matricula')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('marca')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('modelo')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('vin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_matricula'),
                Forms\Components\DatePicker::make('fecha_itv'),
                Forms\Components\DatePicker::make('fecha_tacografo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('matricula')
                ->formatStateUsing(fn ($state) => ucwords(strtoupper($state)))
                    ->searchable(),
                Tables\Columns\TextColumn::make('marca')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                    ->searchable(),
                Tables\Columns\TextColumn::make('modelo')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                    ->searchable(),
                Tables\Columns\TextColumn::make('vin')
                ->formatStateUsing(fn ($state) => ucwords(strtolower($state)))
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_matricula')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_itv')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_tacografo')
                    ->date('d-m-Y')
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
            'index' => Pages\ListTractoras::route('/'),
            'create' => Pages\CreateTractora::route('/create'),
            'edit' => Pages\EditTractora::route('/{record}/edit'),
        ];
    }
}
