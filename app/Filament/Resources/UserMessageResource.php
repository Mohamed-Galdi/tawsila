<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserMessageResource\Pages;
use App\Filament\Resources\UserMessageResource\RelationManagers;
use App\Models\UserMessage;
use Carbon\Carbon;
use Faker\Provider\UserAgent;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
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

    protected static ?string $navigationGroup = 'الرسائل';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'رسائل المستخدمين';
    protected static ?string $navigationIcon = 'user-message';
    protected static ?string $modelLabel = 'رسالة';
    protected static ?string $pluralModelLabel = 'رسائل';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('message')->disabled()->columnSpanFull()->label('نص الرسالة'),
                Textarea::make('reply')->columnSpanFull()->label(' الرد'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('المستخدم'),
                TextColumn::make('user.role')->label('الدور')->state(function (UserMessage $record): string {
                    return $record->user->role == 'student' ? 'طالبة' : 'سائق';
                }),
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
            ])->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make()->label('رد')->color('info')->modalSubmitActionLabel('إرسال الرد')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['replied'] = true;
                        $data['replied_at'] = now();
                        return $data;
                    }),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUserMessages::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return UserMessage::whereNull('reply')->count();
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
