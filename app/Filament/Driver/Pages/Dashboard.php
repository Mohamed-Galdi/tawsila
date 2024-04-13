<?php

namespace App\Filament\Driver\Pages;


use App\Models\User;
use Filament\Actions\Action;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

class Dashboard extends BaseDashboard implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-s-user-circle';
    protected static string $view = 'filament.driver.pages.dashboard';

    public ?array $data = [];

    protected static ?int  $navigationSort = 1;
    protected static ?string $title = 'الحساب';
    protected  ?string $heading = 'معلومات الحساب';

    public function mount(): void
    {
        $this->form->fill(auth()->user()->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        FileUpload::make('image')->label('الصورة  ')->required()->directory('ourDrivers')->preserveFilenames(),
                    ])->columnSpan(1),
                Section::make()
                    ->schema([
                        TextInput::make('name')->label('الاسم ')->maxLength(30)->required(),
                        TextInput::make('email')->label('البريد الالكتروني')->maxLength(30)->required(),
                        TextInput::make('password')->label('كلمة المرور الجديدة')
                        ->password()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state)),
                    ])->columnSpan(2),
            ])->columns('3')
            ->statePath('data')
            ->model(auth()->user());
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
            ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
            ->submit('update'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return  $infolist->state(['null' => 'null'])
        ->schema([
            TextEntry::make('no trip')->hiddenLabel()->state(function () {
                if (!auth()->user()->driver->trip()->exists()) {
                    return 'ليس لديك رحلة بعد!!! ستحصل على صلاحيات تصفح الرحلة فور ان يتم ربطك برحلة من طرف المشرفين.';
                }
            })->color('danger')
        ]);
    }

    public function save()
    {

        $data = $this->form->getState();
        User::find(auth()->user()->id)->update($data);

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
        return redirect('/driver');
    }
    protected function getActions(): array
    {
        return [
            Action::make('الصفحة الرئيسية')->url('/')->icon('heroicon-s-home')->color('gray')->label('الصفحة الرئيسية'),
        ];
    }

}
