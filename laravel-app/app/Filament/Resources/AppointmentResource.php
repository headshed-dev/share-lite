<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Appointment;
use Filament\Resources\Resource;
use App\Models\AppointmentDuration;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use Faker\Provider\ar_EG\Text;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DateTimePicker::make('appointment_date')
                    ->label('Date')
                    ->required(),
                Select::make('appointment_durations_id')
                    ->label('Appointment Duration')
                    ->relationship('appointmentDuration', 'name')
                    ->required(),
                Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'email')
                    ->searchable()

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
                    ->label('Appointment')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('appointmentDuration.name')
                    ->label('Appointment')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('appointmentDuration.duration_in_minutes')
                    ->label('Duration')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.email')
                    ->label('user')
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
