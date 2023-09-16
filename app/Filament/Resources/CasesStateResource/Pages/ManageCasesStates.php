<?php

namespace App\Filament\Resources\CasesStateResource\Pages;

use App\Filament\Resources\CasesStateResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCasesStates extends ManageRecords
{
    protected static string $resource = CasesStateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
