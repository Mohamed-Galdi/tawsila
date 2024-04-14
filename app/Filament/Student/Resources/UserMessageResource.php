<?php

namespace App\Filament\Student\Resources;

use App\Filament\Student\Resources\UserMessageResource\Pages;
use App\Filament\Student\Resources\UserMessageResource\RelationManagers;
use App\Models\UserMessage;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserMessageResource extends Resource
{
    protected static ?string $model = UserMessage::class;

    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'رسائل الدعم';
    protected static ?string $navigationIcon = 'heroicon-s-inbox-arrow-down';
    protected static ?string $modelLabel = 'رسالة';
    protected static ?string $pluralModelLabel = 'رسائل';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('message')->required()->hiddenLabel()->columnSpanFull(),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make([
                TextEntry::make('message')->label(' الرسالة')->color('info'),
            ]),
            Section::make([
                TextEntry::make('reply')->label('الرد')->color('info')->state(function (UserMessage $record): string {
                    return $record->reply ?? 'لم يتم الرد بعد';
                }),
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('message')->label('نص الرسالة')->limit(20),
                TextColumn::make('created_at')->label('تاريخ الإرسال')->since(),
                TextColumn::make('reply')->label('الرد')->limit(20)->state(function (UserMessage $record): string {
                    return $record->reply ?? 'لم يتم الرد بعد';
                }),
                TextColumn::make('replied_at')
                    ->label('تاريخ الرد')
                    ->state(function (UserMessage $record): string {
                        if ($record->reply) {
                            return Carbon::parse($record->replied_at)->diffForHumans();
                        } else {
                            return 'لم يتم الرد بعد';
                        }
                    }),
                IconColumn::make('replied')->label('الحالة')
                    ->boolean()
                    ->trueIcon('heroicon-o-envelope-open')
                    ->falseIcon('heroicon-o-envelope')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUserMessages::route('/'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return UserMessage::where('user_id', auth()->user()->id)->count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'info';
    }
}
