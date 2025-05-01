<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EquipoResource\Pages;
use App\Filament\Resources\EquipoResource\RelationManagers;
use App\Models\Equipo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EquipoResource extends Resource
{
    protected static ?string $model = Equipo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Equipación";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('conductor_id')
                    ->relationship('conductor', 'nombre')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Buscar el conductor por ID
                        $conductor = \App\Models\Conductor::find($state);

                        if ($conductor) {
                            $primeraPalabra = strtok($conductor->nombre, ' ');
                            $set('name', strtolower($primeraPalabra));
                        }
                    })
                    ->default(null),

                Forms\Components\TextInput::make('name')
                    ->required()
                    // ->disabled()
                    ->maxLength(255),
                Forms\Components\Select::make('tractora_id')
                    ->relationship('tractora', 'matricula')
                    ->default(null),
                Forms\Components\Select::make('trailer_id')
                    ->relationship('trailer', 'matricula')
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->formatStateUsing(fn ($state) => strtoupper($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('conductor.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tractora.matricula')
                ->formatStateUsing(fn ($state) => strtoupper($state))
                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('trailer.matricula')
               
                ->formatStateUsing(fn ($state) => strtoupper($state))
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
            'index' => Pages\ListEquipos::route('/'),
            'create' => Pages\CreateEquipo::route('/create'),
            'edit' => Pages\EditEquipo::route('/{record}/edit'),
        ];
    }
}
