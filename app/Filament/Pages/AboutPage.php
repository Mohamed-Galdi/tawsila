<?php

namespace App\Filament\Pages;

use App\Models\AboutPage as About_Page;
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


class AboutPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.about-page';

    public ?array $data = [];


    protected static ?string $navigationGroup = 'إدارة المحتوى';
    protected static ?int $navigationSort = 2;
    protected static ?string $title = 'صفحة من نحن ';
    protected  ?string $heading = 'تعديل  صفحة من نحن';


    public function mount(): void
    {
        $this->form->fill(About_Page::first()->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('قصتنا')
                    ->schema([
                        Textarea::make('our_story')->label('')->maxLength(600)->rows(6)->required(),
                        FileUpload::make('our_story_image')->label('')->image()->disk('public')->directory('ourTeam')->preserveFilenames()->required(),
                    ])->columns('2')
                    ->icon('heroicon-o-book-open'),
                Section::make('من نحن')
                    ->schema([
                        Textarea::make('who_we_are')->label('')->maxLength(600)->rows(6)->required(),
                    ])->columns('1')
                    ->icon('heroicon-o-user-group'),
                Section::make('فريق البرمجة')
                    ->schema([
                        Section::make(' العضو الأول')->schema([
                            TextInput::make('1st_team_member_name')->label(' الإسم')->maxLength(255)->required(),
                            TextInput::make('1st_team_member_role')->label('الدور  ')->maxLength(255)->required(),
                            FileUpload::make('1st_team_member_image')->label('الصورة')->label('')->image()->disk('public')->directory('ourTeam')->preserveFilenames()->required(),
                        ])->columnSpan(1),
                        Section::make(' العضو الثاني')->schema([
                            TextInput::make('2nd_team_member_name')->label(' الإسم')->maxLength(255)->required(),
                            TextInput::make('2nd_team_member_role')->label('الدور  ')->maxLength(255)->required(),
                            FileUpload::make('2nd_team_member_image')->label('الصورة')->label('')->image()->disk('public')->directory('ourTeam')->preserveFilenames()->required(),
                        ])->columnSpan(1),
                        Section::make(' العضو الثالث')->schema([
                            TextInput::make('3rd_team_member_name')->label(' الإسم')->maxLength(255)->required(),
                            TextInput::make('3rd_team_member_role')->label('الدور  ')->maxLength(255)->required(),
                            FileUpload::make('3rd_team_member_image')->label('الصورة')->label('')->image()->disk('public')->directory('ourTeam')->preserveFilenames()->required(),
                        ])->columnSpan(1),
                        Section::make(' العضو الرابع')->schema([
                            TextInput::make('4th_team_member_name')->label(' الإسم')->maxLength(255)->required(),
                            TextInput::make('4th_team_member_role')->label('الدور  ')->maxLength(255)->required(),
                            FileUpload::make('4th_team_member_image')->label('الصورة')->label('')->image()->disk('public')->directory('ourTeam')->preserveFilenames()->required(),
                        ])->columnSpan(1),

                    ])->columns('4')
                    ->icon('heroicon-o-face-smile'),
                Section::make('الأسئلة الشائعة ')
                    ->schema([
                        TextInput::make('1st_FAQs')->label('السؤال الاول')->maxLength(255)->required(),
                        Textarea::make('1st_answer')->label('جواب السؤال الاول')->maxLength(255)->required(),
                        TextInput::make('2nd_FAQs')->label('السؤال الثاني')->maxLength(255)->required(),
                        Textarea::make('2nd_answer')->label('جواب السؤال الثاني')->maxLength(255)->required(),
                        TextInput::make('3rd_FAQs')->label('السؤال الثالث')->maxLength(255)->required(),
                        Textarea::make('3rd_answer')->label('جواب السؤال الثالث')->maxLength(255)->required(),
                        TextInput::make('4th_FAQs')->label('السؤال الرابع')->maxLength(255)->required(),
                        Textarea::make('4th_answer')->label('جواب السؤال الرابع')->maxLength(255)->required(),
                        TextInput::make('5th_FAQs')->label('السؤال الخامس')->maxLength(255)->required(),
                        Textarea::make('5th_answer')->label('جواب السؤال الخامس')->maxLength(255)->required(),
                        TextInput::make('6th_FAQs')->label('السؤال السادس')->maxLength(255)->required(),
                        Textarea::make('6th_answer')->label('جواب السؤال السادس')->maxLength(255)->required(),
                    ])->columns('2')
                    ->icon('heroicon-o-question-mark-circle'),
            ])
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
        About_Page::first()->update($data);

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
