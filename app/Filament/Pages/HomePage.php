<?php

namespace App\Filament\Pages;

use App\Models\HomePage as Home_Page;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;


class HomePage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.home-page';

    public ?array $data = [];


    protected static ?string $title = 'aaa';
    protected static ?string $navigationGroup = 'pages';
    protected  ?string $heading = 'bbb';


    public function mount(): void
    {
        $this->form->fill(Home_Page::first()->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
            ])
            ->statePath('data');
    }
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('hifz'),
        ];
    }

    public function save(): void
    {

        $data = $this->form->getState();
        Home_Page::first()->update($data);

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
