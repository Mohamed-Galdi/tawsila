<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'المستخدمين';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'الطالبات';
    protected static ?string $navigationIcon = 'icon-student';
    protected static ?string $modelLabel = 'طالبة';
    protected static ?string $pluralModelLabel = 'طالبات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label('الإسم'),
                Forms\Components\TextInput::make('email')->required()->label('البريد الإلكتروني'),
                FileUpload::make('image')->required()->label('الصورة')->disk('public')->directory('studentsImages'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->circular()->label('الصورة'),
                Tables\Columns\TextColumn::make('name')->label('الإسم'),
                Tables\Columns\TextColumn::make('email')->label('البريد الإلكتروني'),
                Tables\Columns\TextColumn::make('trip_id')->label('الإشتراك')->badge()
                    ->state(function (User $record): string {
                        return $record->student->trip_id == !null ? 'لديها إشتراك' : 'بدون إشتراك';
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'بدون إشتراك' => 'danger',
                        'لديها إشتراك' => 'success',
                    })->icon(
                        fn (string $state): string => match ($state) {
                            'بدون إشتراك' => 'heroicon-o-no-symbol',
                            'لديها إشتراك' => 'heroicon-o-check',
                        }
                    ),

                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->since()->label('تاريخ التسجيل'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->before(function (User $record) {
                    if ($record->student) {
                        $record->student->delete();
                    }
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->before(function ($records) {
                        foreach ($records as $record) {
                            if ($record->student) {
                                $record->student->delete();
                            }
                        }
                    }),
                ]),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make([
                ImageEntry::make('image')->hiddenLabel()->height(300)->width(350),
            ])->columnSpan(1),
            Section::make([
                TextEntry::make('name')->label('الإسم')->color('primary'),
                TextEntry::make('email')->label('البريد الإلكتروني')->color('primary'),
            ])->columnSpan(1),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageStudents::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('role', 'student');
    }
}
