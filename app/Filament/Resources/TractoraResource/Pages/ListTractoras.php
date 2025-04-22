<?php

namespace App\Filament\Resources\TractoraResource\Pages;

use App\Filament\Resources\TractoraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTractoras extends ListRecords
{
    protected static string $resource = TractoraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
