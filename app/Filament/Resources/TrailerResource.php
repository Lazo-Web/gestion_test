<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrailerResource\Pages;
use App\Filament\Resources\TrailerResource\RelationManagers;
use App\Models\Trailer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrailerResource extends Resource
{
    protected static ?string $model = Trailer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Equipación";
    protected static ?string $modelLabel = 'Cisternas';

    public static function recalcularCapacidad(callable $set, $get): void
{
    $set('capacidad',
        ($get('deposito_1') ?? 0) +
        ($get('deposito_2') ?? 0) +
        ($get('deposito_3') ?? 0) +
        ($get('deposito_4') ?? 0)
    );
}




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
                Forms\Components\TextInput::make('vin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_matricula'),
                Forms\Components\DatePicker::make('fecha_itv'),
                Forms\Components\DatePicker::make('fecha_atp'),
                Forms\Components\TextInput::make('deposito_1')
                    ->numeric()
                     ->afterStateUpdated(fn ($state, callable $set, $get) => self::recalcularCapacidad($set, $get))

                    ->default(null),
                Forms\Components\TextInput::make('deposito_2')
                    ->numeric()
                     ->afterStateUpdated(fn ($state, callable $set, $get) => self:: recalcularCapacidad($set, $get))

                    ->default(null),
                Forms\Components\TextInput::make('deposito_3')
                    ->numeric()
                     ->afterStateUpdated(fn ($state, callable $set, $get) => self:: recalcularCapacidad($set, $get))

                    ->default(null),
                Forms\Components\TextInput::make('deposito_4')
                    ->numeric()
                     ->afterStateUpdated(fn ($state, callable $set, $get) => self:: recalcularCapacidad($set, $get))

                    ->default(null),
                Forms\Components\TextInput::make('capacidad')

                    ->disabled()
                    ->dehydrated(true)
                   ->afterStateHydrated(fn (callable $set, $get) => self::recalcularCapacidad($set, $get)),

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
                 ->formatStateUsing(fn ($state) => ucwords(strtoupper($state)))
                    ->searchable(),
                Tables\Columns\TextColumn::make('vin')
                 ->formatStateUsing(fn ($state) => ucwords(strtoupper($state)))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('fecha_matricula')
                    ->date('d-m-Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->extraAttributes(['class' => 'text-center']),
                Tables\Columns\TextColumn::make('fecha_itv')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_atp')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('deposito_1')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('deposito_2')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('deposito_3')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('deposito_4')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('capacidad')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
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
            'index' => Pages\ListTrailers::route('/'),
            'create' => Pages\CreateTrailer::route('/create'),
            'edit' => Pages\EditTrailer::route('/{record}/edit'),
        ];
    }
}
