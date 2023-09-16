<?php

namespace App\Filament\Resources\ICUResource\Pages;

use App\Filament\Resources\ICUResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageICUS extends ManageRecords
{
    protected static string $resource = ICUResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}