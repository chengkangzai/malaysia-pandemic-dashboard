<?php

namespace App\Filament\Resources\VaxStateResource\Pages;

use App\Filament\Resources\VaxStateResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageVaxStates extends ManageRecords
{
    protected static string $resource = VaxStateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
