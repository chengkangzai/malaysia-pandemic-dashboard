<?php

namespace App\Filament\Resources\VaxRegStateResource\Pages;

use App\Filament\Resources\VaxRegStateResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageVaxRegStates extends ManageRecords
{
    protected static string $resource = VaxRegStateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
