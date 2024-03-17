<?php

namespace App\Filament\Resources\AppointmentDurationResource\Pages;

use App\Filament\Resources\AppointmentDurationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppointmentDuration extends EditRecord
{
    protected static string $resource = AppointmentDurationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
