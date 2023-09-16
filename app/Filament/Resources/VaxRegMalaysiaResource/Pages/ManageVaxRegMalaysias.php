<?php

namespace App\Filament\Resources\VaxRegMalaysiaResource\Pages;

use App\Filament\Resources\VaxRegMalaysiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageVaxRegMalaysias extends ManageRecords
{
    protected static string $resource = VaxRegMalaysiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
