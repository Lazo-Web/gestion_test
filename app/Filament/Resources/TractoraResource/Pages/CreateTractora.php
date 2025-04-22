<?php

namespace App\Filament\Resources\TractoraResource\Pages;

use App\Filament\Resources\TractoraResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTractora extends CreateRecord
{
    protected static string $resource = TractoraResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
