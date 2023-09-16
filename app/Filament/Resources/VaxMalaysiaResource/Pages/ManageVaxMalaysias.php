<?php

namespace App\Filament\Resources\VaxMalaysiaResource\Pages;

use App\Filament\Resources\VaxMalaysiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageVaxMalaysias extends ManageRecords
{
    protected static string $resource = VaxMalaysiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
