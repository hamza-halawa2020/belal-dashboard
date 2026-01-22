<?php

namespace App\Filament\Resources\Faqs\Pages;

use App\Filament\Resources\Faqs\FaqResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageFaqs extends ManageRecords
{
    protected static string $resource = FaqResource::class;

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
