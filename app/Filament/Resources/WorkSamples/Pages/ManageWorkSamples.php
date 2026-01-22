<?php

namespace App\Filament\Resources\WorkSamples\Pages;

use App\Filament\Resources\WorkSamples\WorkSampleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageWorkSamples extends ManageRecords
{
    protected static string $resource = WorkSampleResource::class;

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
