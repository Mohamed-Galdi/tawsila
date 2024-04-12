<?php

namespace App\Filament\Student\Pages;

use App\Models\Subscription;
use App\Models\TripRating;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Yepsua\Filament\Forms\Components\Rating;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Actions\Action as ActionsAction;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Notifications\Notification;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;


class sttudent_subscription extends Page implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;


    protected static ?string $navigationIcon = 'heroicon-s-adjustments-vertical';
    protected static string $view = 'filament.student.pages.sttudent_subscription';
    protected static ?int  $navigationSort = 2;
    protected static ?string $title = 'الإشتراك';
    protected  ?string $heading = 'إعدادات الإشتراك ';



    public ?array $data = [];


    protected function getActions(): array
    {
        return [
            Action::make('الصفحة الرئيسية')->url('/')->icon('heroicon-s-home')->color('gray')->label('الصفحة الرئيسية'),
        ];
    }
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->student->subscription()->exists();
    }

    public function infolist(Infolist $infolist): Infolist
    {
        $user = auth()->user();
        $student = $user->student;
        $studentSubscription = $student->subscription;

        if ($studentSubscription) {
            $subscription = Subscription::with('trip')->find($studentSubscription->id);
            $state = [
                // subscription
                'status' => $subscription->status == 1 ? 'نشط' : 'غير نشط',
                'plan' => $subscription->plan,

                // sub bus
                'bus_number' => $subscription->trip->bus->number,
                'bus_total_seats' => $subscription->trip->bus->total_seats,
                'bus_available_seats' => $subscription->trip->bus->available_seats,
                'bus_image' => $subscription->trip->bus->image,
                // sub driver
                'driver_name' => $subscription->trip->driver->user->name,
                'driver_experience' =>   $subscription->trip->driver->experience . ' ' . 'سنوات خبرة ',
                'driver_image' => $subscription->trip->driver->user->image,
                // sub university
                'university_name' => $subscription->trip->university->name,
                'university_image' => $subscription->trip->university->image,
                // trip times
                'times_per_day' => $subscription->trip->times_per_day == '1' ? 'مرة في اليوم' : 'مرتان في اليوم',
                'first_going_time' => $subscription->trip->first_going_time,
                'first_return_time' => $subscription->trip->first_return_time,
                'second_going_time' => $subscription->trip->second_going_time ?? 'لا يوجد',
                'second_return_time' => $subscription->trip->second_return_time ?? 'لا يوجد',
            ];
            return $infolist->state($state)
                ->schema([

                    ComponentsSection::make('الإشتراك')->schema([
                        TextEntry::make('status')
                            ->label('الحالة')->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'نشط' => 'success',
                                "غير نشط" => 'danger',
                            })
                            ->icons(fn (string $state): array => match ($state) {
                                'نشط' => ['heroicon-s-check-badge'],
                                "غير نشط" => ['heroicon-s-no-symbol'],
                            }),
                        TextEntry::make('plan')->label('مدة الإشتراك')->color('info')->badge()->icon('heroicon-s-clock'),
                        Actions::make([
                            ActionsAction::make('disable sub')->label('إلغاء الإشتراك')
                                ->icon('heroicon-m-x-mark')
                                ->color('danger')
                                ->modalDescription('Modified description')
                                ->requiresConfirmation()
                                ->disabled(Subscription::where('student_id', auth()->user()->student->id)->first()->status == 0)
                                ->action(function () {
                                    Subscription::where('student_id', auth()->user()->student->id)->update(['status' => 0]);
                                    Notification::make()
                                        ->title('تم إلغاء الإشتراك')
                                        ->body('تم إلغاء الإشتراك بنجاح')
                                        ->success()
                                        ->send();
                                }),
                            ActionsAction::make('rate trip')->label('تقييم الرحلة')
                                ->modalDescription('Modified description')
                                ->icon('heroicon-m-star')
                                ->color('warning')
                                ->requiresConfirmation()
                                ->fillForm(function () {
                                    if (TripRating::where('student_id', auth()->user()->student->id)->exists()) {
                                        $trip_rate = TripRating::where('student_id', auth()->user()->student->id)->first();
                                        return [
                                            'rate' => $trip_rate->rate,
                                            'description' => $trip_rate->description,
                                        ];
                                    }
                                })
                                ->form([
                                    Rating::make('rate')->size(10)->label(' التقييم'),
                                    Textarea::make('description')->label('وصف التقييم ')->placeholder('وصف التقييم الحافلة')->maxLength(250),

                                ])
                                ->action(function (array $data) {
                                    if (TripRating::where('student_id', auth()->user()->student->id)->exists()) {
                                        $trip_rate = TripRating::where('student_id', auth()->user()->student->id)->first();
                                        $trip_rate->trip_id = auth()->user()->student->subscription->trip->id;
                                        $trip_rate->rate = $data['rate'];
                                        $trip_rate->description = $data['description'];
                                        $trip_rate->save();
                                    } else {
                                        $trip_rate = new TripRating();
                                        $trip_rate->student_id = auth()->user()->student->id;
                                        $trip_rate->trip_id = auth()->user()->student->subscription->trip->id;
                                        $trip_rate->rate = $data['rate'];
                                        $trip_rate->description = $data['description'];
                                        $trip_rate->save();
                                    }
                                    Notification::make()
                                        ->title('تم تقييم الرحلة')
                                        ->success()
                                        ->send();
                                }),
                            ActionsAction::make('edit plan')->label('تغيير مدة الإشتراك')
                                ->icon('heroicon-m-pencil-square')
                                ->color('info')
                                ->modalDescription('Modified description')
                                ->requiresConfirmation()
                                ->fillForm(function () {
                                    $subscription = Subscription::where('id', auth()->user()->student->subscription->id)->first();
                                    return ['plan' => $subscription->plan];
                                })
                                ->form([
                                    ToggleButtons::make('plan')->label('اختر مدة الإشتراك')->options(['3 أشهر' => '3 أشهر', '6 أشهر' => '6 أشهر', '9 أشهر' => '9 أشهر', '12 أشهر' => '12 أشهر'])->columns(4)->colors(['3 أشهر' => 'info', '6 أشهر' => 'info', '9 أشهر' => 'info', '12 أشهر' => 'info']),
                                ])
                                ->action(function (array $data) {
                                    $subscription = Subscription::where('id', auth()->user()->student->subscription->id)->first();

                                    $subscription->plan = $data['plan'];
                                    $subscription->save();
                                    Notification::make()
                                        ->title('تم تغيير المدة')
                                        ->success()
                                        ->send();
                                }),

                            ActionsAction::make('print sub')->label('طبع وصل الإشتراك')
                                ->icon('heroicon-m-printer')
                                ->color('success')
                                ->url(fn (): string => route('print-subscription', ['subscription' => $subscription->id]))
                                ->openUrlInNewTab(),
                        ])->columnSpan(3)->columns(3)->alignEnd()->label('الإجراءات'),
                    ])->columnSpanFull()->columns(5),
                    ComponentsSection::make('الحافلة')->schema([
                        TextEntry::make('bus_number')->label('رقم الحافلة')->color('info'),
                        TextEntry::make('bus_total_seats')->label('مجموع المقاعد')->color('info'),
                        TextEntry::make('bus_available_seats')->label('المقاعد المتوفرة')->color('success'),
                        ImageEntry::make('bus_image')->hiddenLabel()->columnSpanFull()->size(330),
                    ])->columnSpan(1)->columns(3),
                    Group::make()->schema([
                        ComponentsSection::make('السائق')->schema([
                            ImageEntry::make('driver_image')->hiddenLabel()->circular()->size(100),
                            TextEntry::make('driver_name')->label('اسم السائق'),
                            TextEntry::make('driver_experience')->label('سنوات خبرة'),
                        ])->columnSpan(1)->columns(3),
                        ComponentsSection::make('الجامعة')->schema([
                            TextEntry::make('university_name')->hiddenLabel(),
                            ImageEntry::make('university_image')->hiddenLabel()->width(200),
                        ])->columnSpan(1),
                    ])->columnSpan(1)->columns(1),
                    ComponentsSection::make('الرحلة')->schema([
                        TextEntry::make('times_per_day')->label('عدد الرحلات في اليوم')->badge()->color('success')->columnSpanFull(),
                        TextEntry::make('first_going_time')->label('إنطلاق الرحلة  الأولى')->badge()->color('info')->icon('heroicon-s-clock'),
                        TextEntry::make('first_return_time')->label('عودة الرحلة  الأولى')->badge()->color('info')->icon('heroicon-s-clock'),
                        TextEntry::make('second_going_time')->label('إنطلاق الرحلة  الثانية')->badge()->color('info')->icon('heroicon-s-clock'),
                        TextEntry::make('second_return_time')->label('عودة الرحلة  الثانية')->badge()->color('info')->icon('heroicon-s-clock'),
                    ])->columnSpan(1)->columns(2),
                ])->columns(3);
        } else {
            return  $infolist->state(['null' => 'null'])
                ->schema([
                    TextEntry::make('no sub')->label('لا يوجد إشتراك !!! قم بالإشتراك في رحلة.')
                ]);
        };
    }
}
