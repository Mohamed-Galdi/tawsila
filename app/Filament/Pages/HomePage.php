<?php

namespace App\Filament\Pages;

use App\Models\HomePage as Home_Page;
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


class HomePage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.home-page';

    public ?array $data = [];


    protected static ?string $navigationGroup = 'إدارة المحتوى';
    protected static ?int  $navigationSort = 1;
    protected static ?string $title = 'الصفحة الرئيسية';
    protected  ?string $heading = 'تعديل الصفحة الرئيسية';


    public function mount(): void
    {
        $this->form->fill(Home_Page::first()->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('الترويسة')
                    ->schema([
                        TextInput::make('title')->label('العنوان الرئيسي')->maxLength(255),
                        Textarea::make('subtitle')->label('العنوان الفرعي ')->maxLength(255),
                    ])->columns('2')->icon('heroicon-o-queue-list'),
                Section::make('جامعاتنا')
                    ->schema([
                        TextInput::make('our_university_title')->label('عنوان قسم الجامعات')->maxLength(255)->columnSpanFull(),
                        FileUpload::make('our_university_1')->label('الجامعة الاولى')->image()->disk('public')->directory('ourUniversities')->preserveFilenames()->imagePreviewHeight('250')->panelAspectRatio('2:1'),
                        FileUpload::make('our_university_2')->label('الجامعة الثانية')->image()->disk('public')->directory('ourUniversities')->preserveFilenames()->imagePreviewHeight('250')->panelAspectRatio('2:1'),
                        FileUpload::make('our_university_3')->label('الجامعة الثالثة')->image()->disk('public')->directory('ourUniversities')->preserveFilenames()->imagePreviewHeight('250')->panelAspectRatio('2:1'),
                        FileUpload::make('our_university_4')->label('الجامعة الرابعة')->image()->disk('public')->directory('ourUniversities')->preserveFilenames()->imagePreviewHeight('250')->panelAspectRatio('2:1'),
                        FileUpload::make('our_university_5')->label('الجامعة الخامسة')->image()->disk('public')->directory('ourUniversities')->preserveFilenames()->imagePreviewHeight('250')->panelAspectRatio('2:1'),
                        FileUpload::make('our_university_6')->label('الجامعة السادسة')->image()->disk('public')->directory('ourUniversities')->preserveFilenames()->imagePreviewHeight('250')->panelAspectRatio('2:1'),
                        FileUpload::make('our_university_7')->label('الجامعة السابعة')->image()->disk('public')->directory('ourUniversities')->preserveFilenames()->imagePreviewHeight('250')->panelAspectRatio('2:1'),
                        FileUpload::make('our_university_8')->label('الجامعة الثامنة')->image()->disk('public')->directory('ourUniversities')->preserveFilenames()->imagePreviewHeight('250')->panelAspectRatio('2:1'),
                        FileUpload::make('our_university_9')->label('الجامعة التاسعة')->image()->disk('public')->directory('ourUniversities')->preserveFilenames()->imagePreviewHeight('250')->panelAspectRatio('2:1'),
                        FileUpload::make('our_university_10')->label('الجامعة العاشرة')->image()->disk('public')->directory('ourUniversities')->preserveFilenames()->imagePreviewHeight('250')->panelAspectRatio('2:1'),

                    ])->columns('5')->icon('heroicon-o-rectangle-group'),
                Section::make('خدماتنا')
                    ->schema([
                        TextInput::make('our_services')->label('عنوان قسم خدماتنا')->maxLength(255)->columnSpanFull(),
                        TextInput::make('1st_service_title')->label('عنوان الخدمة الأولى')->maxLength(255),
                        Textarea::make('1st_service_text')->label('وصف الخدمة الأولى')->maxLength(255),
                        FileUpload::make('1st_service_image')->label('صورة الخدمة الأولى  '),
                        TextInput::make('2nd_service_title')->label('عنوان الخدمة الثانية')->maxLength(255),
                        Textarea::make('2nd_service_text')->label('وصف الخدمة الثانية')->maxLength(255),
                        FileUpload::make('2nd_service_image')->label('صورة الخدمة الثانية  '),
                        TextInput::make('3rd_service_title')->label('عنوان الخدمة الثالثة')->maxLength(255),
                        Textarea::make('3rd_service_text')->label('وصف الخدمة الثالثة')->maxLength(255),
                        FileUpload::make('3rd_service_image')->label('صورة الخدمة الثالثة  '),

                    ])->columns('3')->icon('heroicon-o-sparkles'),
                Section::make('الخطوات')
                    ->schema([
                        TextInput::make('steps')->label('عنوان قسم الخطوات')->maxLength(255)->columnSpanFull(),
                        TextInput::make('1st_step_title')->label('الخطوه الأولى')->maxLength(255),
                        TextInput::make('2nd_step_title')->label('الخطوه الثانية')->maxLength(255),
                        TextInput::make('3rd_step_title')->label('الخطوه الثالثة')->maxLength(255),
                        TextInput::make('4th_step_title')->label('الخطوه الرابعة')->maxLength(255),
                        TextArea::make('1st_step_text')->label('وصف الخطوه الأولى')->maxLength(255),
                        TextArea::make('2nd_step_text')->label('وصف الخطوه الثانية')->maxLength(255),
                        TextArea::make('3rd_step_text')->label('وصف الخطوه الثالثة')->maxLength(255),
                        TextArea::make('4th_step_text')->label('وصف الخطوه الرابعة')->maxLength(255),

                    ])->columns('4')->icon('heroicon-o-forward'),
                Section::make('السائقين')
                    ->schema([
                        TextInput::make('drivers')->label('عنوان قسم السائقين')->maxLength(255)->columnSpanFull(),
                        Section::make(' السائق الأول')->schema([
                            TextInput::make('driver_1_name')->label(' الإسم')->maxLength(255),
                            TextInput::make('driver_1_exp')->label('سنوات الخبرة ')->maxLength(255),
                            FileUpload::make('driver_1_image')->label('الصورة    '),
                        ])->columnSpan(1),
                        Section::make(' السائق الثاني')->schema([
                            TextInput::make('driver_2_name')->label(' الإسم')->maxLength(255),
                            TextInput::make('driver_2_exp')->label('سنوات الخبرة ')->maxLength(255),
                            FileUpload::make('driver_2_image')->label('الصورة    '),
                        ])->columnSpan(1),
                        Section::make(' السائق الثالث ')->schema([
                            TextInput::make('driver_3_name')->label(' الإسم')->maxLength(255),
                            TextInput::make('driver_3_exp')->label('سنوات الخبرة ')->maxLength(255),
                            FileUpload::make('driver_3_image')->label('الصورة    '),
                        ])->columnSpan(1),
                        Section::make(' السائق الرابع ')->schema([
                            TextInput::make('driver_4_name')->label(' الإسم')->maxLength(255),
                            TextInput::make('driver_4_exp')->label('سنوات الخبرة ')->maxLength(255),
                            FileUpload::make('driver_4_image')->label('الصورة    '),
                        ])->columnSpan(1),
                        Section::make(' السائق الخامس ')->schema([
                            TextInput::make('driver_5_name')->label(' الإسم')->maxLength(255),
                            TextInput::make('driver_5_exp')->label('سنوات الخبرة ')->maxLength(255),
                            FileUpload::make('driver_5_image')->label('الصورة    '),
                        ])->columnSpan(1),
                        Section::make(' السائق السادس ')->schema([
                            TextInput::make('driver_6_name')->label(' الإسم')->maxLength(255),
                            TextInput::make('driver_6_exp')->label('سنوات الخبرة ')->maxLength(255),
                            FileUpload::make('driver_6_image')->label('الصورة    '),
                        ])->columnSpan(1),
                        Section::make(' السائق السابع')->schema([
                            TextInput::make('driver_7_name')->label(' الإسم')->maxLength(255),
                            TextInput::make('driver_7_exp')->label('سنوات الخبرة ')->maxLength(255),
                            FileUpload::make('driver_7_image')->label('الصورة    '),
                        ])->columnSpan(1),
                        Section::make(' السائق الثامن')->schema([
                            TextInput::make('driver_8_name')->label(' الإسم')->maxLength(255),
                            TextInput::make('driver_8_exp')->label('سنوات الخبرة ')->maxLength(255),
                            FileUpload::make('driver_8_image')->label('الصورة    '),
                        ])->columnSpan(1),
                        Section::make(' السائق التاسع')->schema([
                            TextInput::make('driver_9_name')->label(' الإسم')->maxLength(255),
                            TextInput::make('driver_9_exp')->label('سنوات الخبرة ')->maxLength(255),
                            FileUpload::make('driver_9_image')->label('الصورة    '),
                        ])->columnSpan(1),
                        Section::make(' السائق العاشر')->schema([
                            TextInput::make('driver_10_name')->label(' الإسم')->maxLength(255),
                            TextInput::make('driver_10_exp')->label('سنوات الخبرة ')->maxLength(255),
                            FileUpload::make('driver_10_image')->label('الصورة    '),
                        ])->columnSpan(1),


                    ])->columns('5')->icon('heroicon-o-identification'),
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
        Home_Page::first()->update($data);

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
