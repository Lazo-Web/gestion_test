<?php

namespace App\Filament\Resources\FabricaResource\Pages;

use App\Filament\Resources\FabricaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFabrica extends EditRecord
{
    protected static string $resource = FabricaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
