<?php

namespace App\Filament\Resources\DeathsMalaysiaResource\Pages;

use App\Filament\Resources\DeathsMalaysiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDeathsMalaysias extends ManageRecords
{
    protected static string $resource = DeathsMalaysiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
