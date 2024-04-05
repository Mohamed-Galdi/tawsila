<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TripResource\Pages;
use App\Filament\Resources\TripResource\RelationManagers;
use App\Models\Bus;
use App\Models\Driver;
use App\Models\Trip;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Infolists\Components\Fieldset as FS;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset as ComponentsFieldset;
use Filament\Infolists\Components\Group as ComponentsGroup;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TripResource extends Resource
{
    protected static ?string $model = Trip::class;

    protected static ?string $navigationGroup = 'الخدمات';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'الرحلات';
    protected static ?string $navigationIcon = 'icon-trip';
    protected static ?string $modelLabel = 'رحلة';
    protected static ?string $pluralModelLabel = 'رحلات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('areas')->Relationship('areas', 'name')->native(false)->multiple()->label('المناطق')->preload(),
                Select::make('university_id')->Relationship('university', 'name')->native(false)->label('الجامعة'),
                Select::make('bus_id')->native(false)->label('الحافلة')->options(Bus::where('status', 'متوفر')->get()->mapWithKeys(function ($bus) {
                    return [$bus->id => $bus->number];
                })->toArray()),
                
                Select::make('driver_id')->native(false)->label('السائق')
                    ->options(function (string $operation, ?Trip $record = null) {
                        if ($operation === 'edit') {
                            // Include current driver even if they have a trip
                            return
                                Driver::where('id', $record->driver->id)
                                ->orWhere(function ($query) {
                                    $query->where('status', 'تم التوثيق')
                                        ->whereDoesntHave('trip');
                                })
                                ->get()
                                ->mapWithKeys(function ($driver) {
                                    return [$driver->id => $driver->user->name];
                                })->toArray();
                        } else {
                            // Exclude drivers with trips
                            return Driver::where('status', 'تم التوثيق')->whereDoesntHave('trip')->get()->mapWithKeys(function ($driver) {
                                return [$driver->id => $driver->user->name];
                            })->toArray();
                        }
                    }),
                ToggleButtons::make('times_per_day')
                    ->grouped()
                    ->label('عدد الرحلات في اليوم')
                    ->default(1)
                    ->options([
                        1 => 'مرة في اليوم',
                        2 => 'مرتان في اليوم'
                    ])
                    ->icons([
                        1 => '',
                        2 => ''
                    ])
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state == 1) {
                            $set('fieldset1', true);
                            $set('fieldset2', false);
                        } elseif ($state == 2) {
                            $set('fieldset1', true);
                            $set('fieldset2', true);
                        }
                    }),

                Fieldset::make('تواقيت الرحلة الأولى')
                    ->schema([
                        TimePicker::make('first_going_time')->label('توقيت إنطلاق الرحلة  الأولى')->seconds(false)->datalist([
                            '07:00',
                            '07:30',
                            '08:00',
                            '08:30',
                            '09:00',
                            '09:30',
                            '10:00',
                        ])->default('07:30 AM'),
                        TimePicker::make('first_return_time')->label('توقيت عودة الرحلة  الأولى')->seconds(false)->datalist([
                            '10:00',
                            '10:30',
                            '11:00',
                            '11:30',
                            '12:00',
                            '12:30',
                            '13:00',
                        ])->default('12:00 AM'),
                    ])
                    ->default(true), // Make fieldset1 visible by default

                Fieldset::make('تواقيت الرحلة الثانية')
                    ->schema([
                        TimePicker::make('second_going_time')->label('توقيت إنطلاق الرحلة  الثانية')->seconds(false)->datalist([
                            '11:00',
                            '11:30',
                            '12:00',
                            '12:30',
                            '13:00',
                            '13:30',
                            '14:00',
                        ])->default('11:00 AM'),
                        TimePicker::make('second_return_time')->label('توقيت عودة الرحلة  الثانية')->seconds(false)->datalist([
                            '15:00',
                            '15:30',
                            '16:00',
                            '16:30',
                            '17:00',
                            '17:30',
                            '18:00',
                            '18:30',
                        ])->default('3:00 PM'),
                    ])
                    ->hidden(fn ($get) => !$get('fieldset2')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('areas.name')->badge()->color('info')->label('المناطق'),
                Tables\Columns\TextColumn::make('university.name')->label('الجامعة')->limit(15),
                Tables\Columns\TextColumn::make('bus.number')->label('الحافلة'),
                Tables\Columns\TextColumn::make('times_per_day')->label('عدد الرحلات في اليوم')->badge()->color('success')
                    ->state(function (Trip $record): string {
                        return $record->times_per_day == 1 ? 'مرة في اليوم' : 'مرتان في اليوم';
                    }),
                Tables\Columns\TextColumn::make('first_going_time')->label('إنطلاق الرحلة  الأولى')->state(function (Trip $record): string {
                    return $record->first_going_time ?? 'لا يوجد';
                }),
                Tables\Columns\TextColumn::make('first_return_time')->label('عودة الرحلة  الأولى')->state(function (Trip $record): string {
                    return $record->first_return_time ?? 'لا يوجد';
                }),
                Tables\Columns\TextColumn::make('second_going_time')->label('إنطلاق الرحلة  الثانية')->toggleable(true)->toggledHiddenByDefault()->state(function (Trip $record): string {
                    return $record->second_going_time ?? 'لا يوجد';
                }),
                Tables\Columns\TextColumn::make('second_return_time')->label('عودة الرحلة  الثانية')->toggleable(true)->toggledHiddenByDefault()->state(function (Trip $record): string {
                    return $record->second_return_time ?? 'لا يوجد';
                }),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('areas.name')->label('المناطق')->badge()->color('info'),
            TextEntry::make('university.name')->label('الجامعة')->color('info'),
            TextEntry::make('times_per_day')->label('عدد الرحلات في اليوم')->badge()->color('success')
                ->state(function (Trip $record): string {
                    return $record->times_per_day == 1 ? 'مرة في اليوم' : 'مرتان في اليوم';
                }),
            FS::make('تواقيت الرحلات')->schema([
                TextEntry::make('first_going_time')->label('إنطلاق الرحلة  الأولى')->badge()->color('gray')->state(function (Trip $record): string {
                    return $record->first_going_time ?? 'لا يوجد';
                }),
                TextEntry::make('first_return_time')->label('عودة الرحلة  الأولى')->badge()->color('gray')->label('عودة الرحلة  الأولى')->state(function (Trip $record): string {
                    return $record->first_return_time ?? 'لا يوجد';
                }),
                TextEntry::make('second_going_time')->label('إنطلاق الرحلة  الثانية')->badge()->color('gray')->label('إنطلاق الرحلة  الثانية')->state(function (Trip $record): string {
                    return $record->second_going_time ?? 'لا يوجد';
                }),
                TextEntry::make('second_return_time')->label('عودة الرحلة  الثانية')->badge()->color('gray')->label('عودة الرحلة  الثانية')->state(function (Trip $record): string {
                    return $record->second_return_time ?? 'لا يوجد';
                }),

            ])->columns(4)->columnSpanFull(),
            FS::make(' الحافلة')->schema([
                ImageEntry::make('bus.image')->hiddenLabel()->columnSpan(1)->width(350)->height(350),
                ComponentsGroup::make()->schema([
                    TextEntry::make('bus.number')->label('رقم الحافلة')->color('info'),
                    TextEntry::make('bus.status')->label('الحالة')->badge()
                        ->color(fn (string $state): string => match ($state) {
                            'متوفر' => 'success',
                            'خارج الخدمة' => 'danger',
                            'ممتلئ' => 'info',
                        }),
                    TextEntry::make('bus.total_seats')->label('مجموع المقاعد')->color('info'),
                    TextEntry::make('bus.available_seats')->label('المقاعد المتوفرة')->color('info'),
                ])
            ])->columns(2)->columnSpanFull(),
        ])->columns(3);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTrips::route('/'),
        ];
    }
}
