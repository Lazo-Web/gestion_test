<?php

namespace App\Filament\Resources\MercanciaResource\Pages;

use App\Filament\Resources\MercanciaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMercancias extends ListRecords
{
    protected static string $resource = MercanciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
