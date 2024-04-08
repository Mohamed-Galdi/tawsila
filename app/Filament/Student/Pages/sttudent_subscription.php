<?php

namespace App\Filament\Student\Pages;

use App\Models\Subscription;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
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
    protected static ?string $title = ' الإشتراك';
    protected  ?string $heading = 'إعدادات الإشتراك ';

    public ?array $data = [];


    // public function mount(): void{
    //     $subscription = Subscription::where('student_id', auth()->user()->student->id)->first();
    //     if ($subscription) {
    //         $this->form->fill($subscription->attributesToArray());
    //     }
    // }

    // public function form(Form $form): Form{
    //     return $form
    //         ->schema([
    //             Section::make('الحافلة')
    //                 ->schema([
    //                     FileUpload::make('trip.bus.image')->label('الصورة  ')->required()->disabled(),
    //                 ])->columnSpan(1),
    //             Section::make()
    //                 ->schema([
    //                     TextInput::make('plan')->label('الاسم ')->disabled(),
    //                     TextInput::make('trip_id'),

    //                 ])->columnSpan(2),
    //         ])->columns('3')
    //         ->statePath('data')
    //         ->model(auth()->user());
    // }

    public function infolist(Infolist $infolist): Infolist
    {
        $subscription = Subscription::where('id', auth()->user()->student->subscription->id)->with('trip')->first();
        if ($subscription) {
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
        }
        return $infolist->state($state)
            ->schema([
                ComponentsSection::make('الإشتراك')->schema([
                    TextEntry::make('status')->label('الحالة')->colors(['1' => 'success', '0' => 'danger'])->icons(['1' => 'heroicon-s-check-badge', '0' => 'heroicon-s-no-symbol'])->badge(),
                    TextEntry::make('plan')->label('مدة الإشتراك')->color('info')->badge()->icon('heroicon-s-clock'),
                    Actions::make([
                        ActionsAction::make('disable sub')->label('إلغاء الإشتراك')
                            ->icon('heroicon-m-x-mark')
                            ->color('danger')
                            ->modalDescription('Modified description')
                            ->requiresConfirmation(),
                        // ->action('expirePassword'),
                        ActionsAction::make('rate trip')->label('تقييم الرحلة')
                            ->modalDescription('Modified description')
                            ->icon('heroicon-m-star')
                            ->color('warning')
                            ->requiresConfirmation(),
                        // ->action('expirePassword'),
                        ActionsAction::make('edit plan')->label('تغيير مدة الإشتراك')
                            ->icon('heroicon-m-pencil-square')
                            ->color('info')
                            ->modalDescription('Modified description')
                            ->requiresConfirmation()
                            ->form([
                                ToggleButtons::make('subject')->required()->options(['1', '2', '3']),
                            ]),
                        // ->action('expirePassword'),

                        ActionsAction::make('print sub')->label('طبع وصل الإشتراك')
                            ->icon('heroicon-m-printer')
                            ->color('success')
                            ->url(fn (): string => route('print-subscription', ['subscription' => $subscription->id])),
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
    }

    // protected function getFormActions(): array{
    //     return [
    //         Action::make('save')
    //             ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
    //             ->submit('update'),
    //     ];
    // }

    // public function save(){

    //     $data = $this->form->getState();
    //     Subscription::find(auth()->user()->student->subscription()->id)->update($data);

    //     Notification::make()
    //         ->success()
    //         ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
    //         ->send();
    //     return redirect('/student');
    // }
}
