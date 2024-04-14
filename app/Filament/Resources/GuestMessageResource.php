<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestMessageResource\Pages;
use App\Filament\Resources\GuestMessageResource\RelationManagers;
use App\Models\GuestMessage;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuestMessageResource extends Resource
{
    protected static ?string $model = GuestMessage::class;

    protected static ?string $navigationGroup = 'الرسائل';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'رسائل الزوار';
    protected static ?string $navigationIcon = 'guest-message';
    protected static ?string $modelLabel = 'رسالة';
    protected static ?string $pluralModelLabel = 'رسائل';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             Forms\Components\TextInput::make('name')
    //                 ->required()
    //                 ->maxLength(255),
    //             Forms\Components\TextInput::make('email')
    //                 ->email()
    //                 ->required()
    //                 ->maxLength(255),
    //             Forms\Components\Textarea::make('message')
    //                 ->required()
    //                 ->columnSpanFull(),
    //             Forms\Components\Toggle::make('replied')
    //                 ->required(),
    //         ]);
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('الاسم'),
                TextColumn::make('email')->label('البريد الإلكتروني'),
                TextColumn::make('message')->label('نص الرسالة')->limit(20),
                TextColumn::make('created_at')->label('تاريخ الإرسال')->since(),
                ToggleColumn::make('replied')->label('تم الرد عليها'),


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),

            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('name')->label('الاسم')->color('info'),
            TextEntry::make('email')->label('البريد الإلكتروني')->color('info'),
            TextEntry::make('created_at')->label('تاريخ الإرسال')->since()->color('info'),
            IconEntry::make('replied')
            ->boolean()
            ->trueIcon('heroicon-o-envelope-open')
            ->falseIcon('heroicon-o-envelope'),
            Section::make([
                TextEntry::make('message')->label('نص الرسالة')->columnSpanFull()->color('info'),
            ])
        ])->columns(4);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGuestMessages::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return GuestMessage::where('replied', 0)->count();
    }
    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'info';
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'لم يتم الرد عليها';
    }
}
