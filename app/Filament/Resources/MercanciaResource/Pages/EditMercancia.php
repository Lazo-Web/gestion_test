<?php

namespace App\Filament\Resources\MercanciaResource\Pages;

use App\Filament\Resources\MercanciaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMercancia extends EditRecord
{
    protected static string $resource = MercanciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
