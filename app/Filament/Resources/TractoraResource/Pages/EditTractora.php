<?php

namespace App\Filament\Resources\TractoraResource\Pages;

use App\Filament\Resources\TractoraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTractora extends EditRecord
{
    protected static string $resource = TractoraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
