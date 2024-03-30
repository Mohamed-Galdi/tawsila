<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DriverResource\Pages;
use App\Filament\Resources\DriverResource\RelationManagers;
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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DriverResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'المستخدمين';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'السائقون';
    protected static ?string $navigationIcon = 'icon-driver';
    protected static ?string $modelLabel = 'سائق';
    protected static ?string $pluralModelLabel = 'سائقون';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label('الإسم'),
                Forms\Components\TextInput::make('email')->required()->label('البريد الإلكتروني'),
                Forms\Components\TextInput::make('driver.status')->required()->label('البريد الإلكتروني'),

                FileUpload::make('image')->required()->label('الصورة'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->circular()->label('الصورة'),
                Tables\Columns\TextColumn::make('name')->label('الإسم'),
                Tables\Columns\TextColumn::make('email')->label('البريد الإلكتروني')->limit(20),
                Tables\Columns\TextColumn::make('driver.license_number')->label('رقم الرخصة'),
                Tables\Columns\ImageColumn::make('driver.license_image')->label('صورة الرخصة'),
                Tables\Columns\TextColumn::make('driver.status')->label('الحالة')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'قيد المراجعة' => 'info',
                        'تم التوثيق' => 'success',
                        ' مرفوض' => 'danger',
                        'غير متوفر حاليا' => 'warning',
                    })->icon(
                        fn (string $state): string => match ($state) {
                            'قيد المراجعة' => 'heroicon-s-magnifying-glass-circle',
                            'تم التوثيق' => 'heroicon-s-check-badge',
                            ' مرفوض' => 'heroicon-s-hand-raised',
                            'غير متوفر حاليا' => 'heroicon-s-pause-circle',
                        }
                    ),
                Tables\Columns\TextColumn::make('created_at')->label('تاريخ التسجيل')->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->before(function (User $record) {
                    if ($record->driver) {
                        $record->driver->delete();
                    }
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->before(function ($records) {
                        foreach ($records as $record) {
                            if ($record->driver) {
                                $record->driver->delete();
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
                ImageEntry::make('driver.license_image')->hiddenLabel()->height(300)->width(350),
            ])->columnSpan(1),
            Section::make([
                TextEntry::make('name')->label('الإسم')->color('primary'),
                TextEntry::make('email')->label('البريد الإلكتروني')->color('primary'),
                TextEntry::make('driver.license_number')->label('رقم الرخصة')->color('primary'),
                TextEntry::make('driver.status')->label('الحالة')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'قيد المراجعة' => 'info',
                        'تم التوثيق' => 'success',
                        ' مرفوض' => 'danger',
                        'غير متوفر حاليا' => 'warning',
                    })->icon(
                        fn (string $state): string => match ($state) {
                            'قيد المراجعة' => 'heroicon-s-magnifying-glass-circle',
                            'تم التوثيق' => 'heroicon-s-check-badge',
                            ' مرفوض' => 'heroicon-s-hand-raised',
                            'غير متوفر حاليا' => 'heroicon-s-pause-circle',
                        }
                    ),
            ])->columns(4),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDrivers::route('/'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('role', 'driver');
    }
}
