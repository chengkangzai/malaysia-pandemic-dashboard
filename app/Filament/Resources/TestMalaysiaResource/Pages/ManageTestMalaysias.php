<?php

namespace App\Filament\Resources\TestMalaysiaResource\Pages;

use App\Filament\Resources\TestMalaysiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTestMalaysias extends ManageRecords
{
    protected static string $resource = TestMalaysiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
