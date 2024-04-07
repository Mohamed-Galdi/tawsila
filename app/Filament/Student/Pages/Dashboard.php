<?php

namespace App\Filament\Student\Pages;

use App\Models\User;
use Filament\Actions\Action;

use Filament\Forms\Components\Actions\Action as AC;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Dashboard extends BaseDashboard implements HasForms, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-s-user-circle';

    protected static string $view = 'filament.student.pages.dashboard';


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
                        FileUpload::make('image')->label('الصورة  ')->required()->directory('studentsImages')->preserveFilenames(),
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

    public function save()
    {

        $data = $this->form->getState();
        $data['avatar_url'] = 'storage/'.$data['image'];
        User::find(auth()->user()->id)->update($data);

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
        return redirect('/student');
    }
};
