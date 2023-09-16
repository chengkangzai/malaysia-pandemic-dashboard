<?php

namespace App\Filament\Resources\PopulationResource\Pages;

use App\Filament\Resources\PopulationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePopulations extends ManageRecords
{
    protected static string $resource = PopulationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
