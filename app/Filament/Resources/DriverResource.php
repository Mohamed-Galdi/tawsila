<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DriverResource\Pages;
use App\Filament\Resources\DriverResource\RelationManagers;
use App\Models\Driver;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
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
                Forms\Components\TextInput::make('name')->required()->label('الإسم')->columnSpan(2),
                Forms\Components\TextInput::make('email')->required()->label('البريد الإلكتروني')->columnSpan(2),
                Group::make()->relationship('driver')
                    ->schema([
                        TextInput::make('license_number'),
                    ])->columnSpan(2),
                Group::make()->relationship('driver')
                    ->schema([
                        ToggleButtons::make('status')->label('الحالة')
                            ->options([
                                ' مرفوض' => ' مرفوض',
                                'تم التوثيق' => 'تم التوثيق',
                                'قيد المراجعة' => 'قيد المراجعة'
                            ])
                            ->colors([
                                ' مرفوض' => 'danger',
                                'تم التوثيق' => 'success',
                                'قيد المراجعة' => 'info'
                            ])
                            ->icons([
                                ' مرفوض' => 'heroicon-s-hand-raised',
                                'تم التوثيق' => 'heroicon-s-check-badge',
                                'قيد المراجعة' => 'heroicon-s-magnifying-glass-circle'
                            ])
                            ->columns(5)
                    ])->columnSpanFull(),
                FileUpload::make('image')->required()->label('الصورة')->columnSpan(3)->disk('public')->directory('ourDrivers'),
                Group::make()->relationship('driver')
                    ->schema([
                        FileUpload::make('license_image')->disk('public')->directory('drivers_licenses'),
                    ])->columnSpan(3),


            ])->columns(6);
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
                        'مرفوض' => 'danger',
                    })->icon(
                        fn (string $state): string => match ($state) {
                            'قيد المراجعة' => 'heroicon-s-magnifying-glass-circle',
                            'تم التوثيق' => 'heroicon-s-check-badge',
                            'مرفوض' => 'heroicon-s-hand-raised',
                        }
                    ),
                Tables\Columns\TextColumn::make('has_trip')->badge()->state(fn (User $record): string => $record->driver->trip ? 'مربوط برحلة' : 'بدون برحلة')
                    ->color(fn (string $state): string => match ($state) {
                        'مربوط برحلة' => 'warning',
                        'بدون برحلة' => 'gray',
                    })->label('حالة الرحلة'),
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
                // TextEntry::make('email')->label('البريد الإلكتروني')->color('primary'),
                TextEntry::make('driver.license_number')->label('رقم الرخصة')->color('primary'),
                TextEntry::make('driver.status')->label('الحالة')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'قيد المراجعة' => 'info',
                        'تم التوثيق' => 'success',
                        ' مرفوض' => 'danger',
                    })->icon(
                        fn (string $state): string => match ($state) {
                            'قيد المراجعة' => 'heroicon-s-magnifying-glass-circle',
                            'تم التوثيق' => 'heroicon-s-check-badge',
                            ' مرفوض' => 'heroicon-s-hand-raised',
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
