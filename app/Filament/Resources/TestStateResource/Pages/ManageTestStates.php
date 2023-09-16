<?php

namespace App\Filament\Resources\TestStateResource\Pages;

use App\Filament\Resources\TestStateResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTestStates extends ManageRecords
{
    protected static string $resource = TestStateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
