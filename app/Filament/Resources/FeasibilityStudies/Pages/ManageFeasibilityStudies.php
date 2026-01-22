<?php

namespace App\Filament\Resources\FeasibilityStudies\Pages;

use App\Filament\Resources\FeasibilityStudies\FeasibilityStudyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageFeasibilityStudies extends ManageRecords
{
    protected static string $resource = FeasibilityStudyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
              ->mutateFormDataUsing(function (array $data) {
                $data['created_by'] = auth()->id();
                return $data;
            }),
        ];
    }
}
