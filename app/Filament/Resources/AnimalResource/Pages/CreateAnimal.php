<?php

namespace App\Filament\Resources\AnimalResource\Pages;

use App\Filament\Resources\AnimalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAnimal extends CreateRecord
{
    protected static string $resource = AnimalResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();    
        return $data;
    }
}
