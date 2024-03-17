<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Forms\DateTimePicker;
use Filament\Tables\Table;
use App\Models\Appointment;
use Filament\Resources\Resource;
use App\Models\AppointmentDuration;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('appointment_date')
                    ->label('Appointment Date')
                    ->required(),
                Select::make('appointment_durations_id')
                    ->label('Appointment Duration')
                    // ->options(
                    //     AppointmentDuration::all()->pluck('name', 'id')
                    // )
                    ->relationship('appointmentDuration', 'name')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('appointment_date')
                    ->label('Appointment Date')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('appointmentDuration.name')
                    ->label('Appointment Duration')
                    ->searchable()
                    ->sortable()

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
