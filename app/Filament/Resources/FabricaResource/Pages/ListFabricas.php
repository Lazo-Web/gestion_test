<?php

namespace App\Filament\Resources\FabricaResource\Pages;

use App\Filament\Resources\FabricaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFabricas extends ListRecords
{
    protected static string $resource = FabricaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
