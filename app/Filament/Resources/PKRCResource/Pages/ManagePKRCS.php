<?php

namespace App\Filament\Resources\PKRCResource\Pages;

use App\Filament\Resources\PKRCResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePKRCS extends ManageRecords
{
    protected static string $resource = PKRCResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
