<?php

namespace App\Filament\Resources\FeasibilityStudyRequests\Pages;

use App\Filament\Resources\FeasibilityStudyRequests\FeasibilityStudyRequestResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageFeasibilityStudyRequests extends ManageRecords
{
    protected static string $resource = FeasibilityStudyRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
