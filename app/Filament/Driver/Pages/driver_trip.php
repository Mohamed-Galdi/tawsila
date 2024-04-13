<?php

namespace App\Filament\Driver\Pages;

use App\Models\Trip;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
                                
class driver_trip extends Page implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;

    protected static ?string $navigationIcon = 'heroicon-s-newspaper';
    protected static string $view = 'filament.driver.pages.driver_trip';
    protected static ?int  $navigationSort = 2;
    protected static ?string $title = 'الرحلة ';
    protected  ?string $heading = 'إعدادات الرحلة  ';

    public ?array $data = [];

    protected function getUserDriverTrip()
    {
        $user = auth()->user();
        $driver = $user->driver;
        $driverTrip = $driver->trip;

        return $driverTrip;
    }

    protected function getActions(): array
    {
        $driverTrip = $this->getUserDriverTrip();


        return [
            Action::make('وصل الرحلة ')->icon('heroicon-s-printer')->color('success')->label('وصل الرحلة ')
                ->url(fn (): string => route('print-trip', ['trip' => $driverTrip->id]))
                ->openUrlInNewTab(),
            Action::make('الصفحة الرئيسية')->url('/')->icon('heroicon-s-home')->color('gray')->label('الصفحة الرئيسية'),
        ];
    }
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->driver->trip()->exists();
    }

    public function infolist(Infolist $infolist): Infolist
    {
        $driverTrip = $this->getUserDriverTrip();


        if ($driverTrip) {
            $trip = Trip::find($driverTrip->id);
            $areaNames = $trip->areas->pluck('name')->toArray();

            $state = [
                // trip timings
                'times_per_day' => $trip->times_per_day == 1 ? 'مرة في اليوم' : 'مرتان في اليوم',
                'first_going_time' => $trip->first_going_time,
                'first_return_time' => $trip->first_return_time,
                'second_going_time' => $trip->second_going_time ?? 'لا يوجد',
                'second_return_time' => $trip->second_return_time ?? 'لا يوجد',

                // trip areas
                'areas' => $areaNames,

                // trip university
                'university_name' => $trip->university->name,
                'university_image' => $trip->university->image,
                'university_address' => $trip->university->address,

                // trip bus
                'bus_number' => $trip->bus->number,
                'bus_image' => $trip->bus->image,
                'bus_total_seats' => $trip->bus->total_seats,
                'bus_available_seats' => $trip->bus->available_seats,
            ];
            return $infolist->state($state)
                ->schema([

                    ComponentsSection::make('توقيت الرحلة')->schema([
                        TextEntry::make('times_per_day')->label('عدد المرات في اليوم')->badge()->color('success')->badge(),
                        TextEntry::make('first_going_time')->label('إنطلاق الرحلة  الأولى')->badge()->color('info')->icon('heroicon-s-clock'),
                        TextEntry::make('first_return_time')->label('عودة الرحلة  الأولى')->badge()->color('info')->icon('heroicon-s-clock'),
                        TextEntry::make('second_going_time')->label('إنطلاق الرحلة  الثانية')->badge()->color('info')->icon('heroicon-s-clock'),
                        TextEntry::make('second_return_time')->label('عودة الرحلة  الثانية')->badge()->color('info')->icon('heroicon-s-clock'),

                    ])->columnSpan(4)->columns(5),
                    ComponentsSection::make('المناطق')->schema([
                        TextEntry::make('areas')->hiddenLabel()->badge()->color('info'),
                    ])->columnSpan(2),
                    ComponentsSection::make('الجامعة')->schema([
                        TextEntry::make('university_name')->label('اسم الجامعة'),
                        TextEntry::make('university_address')->label('العنوان'),
                        ImageEntry::make('university_image')->hiddenLabel()->height(100),
                    ])->columnSpan(3)->columns(2),
                    ComponentsSection::make('الحافلة')->schema([

                        TextEntry::make('bus_number')->label('رقم الحافلة'),
                        TextEntry::make('bus_total_seats')->label('عدد المقاعد الكلية')->badge()->color('success')->badge(),
                        TextEntry::make('bus_available_seats')->label('عدد المقاعد المتاحة')->badge()->color('gray')->badge(),

                        ImageEntry::make('bus_image')->hiddenLabel()->size(250),
                    ])->columns(3)->columnSpan(3)
                ])->columns(6);
        } else {
            return  $infolist->state(['null' => 'null'])
                ->schema([
                    TextEntry::make('no sub')->label('لا يوجد إشتراك !!! قم بالإشتراك في رحلة.')
                ]);
        };
    }
}
