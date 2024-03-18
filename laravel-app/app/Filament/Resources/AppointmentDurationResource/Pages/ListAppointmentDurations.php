<?php

namespace App\Filament\Resources\AppointmentDurationResource\Pages;

use App\Filament\Resources\AppointmentDurationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppointmentDurations extends ListRecords
{
    protected static string $resource = AppointmentDurationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
