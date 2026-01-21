<?php

namespace App\Filament\Resources\SuccessPartners\Pages;

use App\Filament\Resources\SuccessPartners\SuccessPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageSuccessPartners extends ManageRecords
{
    protected static string $resource = SuccessPartnerResource::class;

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
