<?php

namespace App\Filament\Pages;

use App\Models\ContactPage as Contact_Page;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;


class ContactPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'icon-page';
    protected static string $view = 'filament.pages.contact-page';

    public ?array $data = [];


    protected static ?string $navigationGroup = 'إدارة المحتوى';
    protected static ?int $navigationSort = 3;
    protected static ?string $title = 'صفحة تواصل معنا  ';
    protected  ?string $heading = 'تعديل  صفحة  تواصل معنا';


    public function mount(): void
    {
        $this->form->fill(Contact_Page::first()->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('phone')->label('رقم الهاتف')->maxLength(30)->required(),
                TextInput::make('email')->label('البريد الالكتروني')->maxLength(30)->required(),
                TextInput::make('address')->label('موقع مركزنا ')->maxLength(30)->required(),
            ])->columns('3')
            ->statePath('data');
    }
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('update'),
        ];
    }

    public function save(): void
    {

        $data = $this->form->getState();
        Contact_Page::first()->update($data);

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
