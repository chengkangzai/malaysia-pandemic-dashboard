<?php

namespace App\Filament\Resources\DeathsStateResource\Pages;

use App\Filament\Resources\DeathsStateResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDeathsStates extends ManageRecords
{
    protected static string $resource = DeathsStateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
