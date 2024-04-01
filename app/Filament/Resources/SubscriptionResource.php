<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionResource\Pages;
use App\Filament\Resources\SubscriptionResource\RelationManagers;
use App\Models\Subscription;
use App\Models\Trip;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubscriptionResource extends Resource
{
    protected static ?string $model = Subscription::class;

    protected static ?string $navigationGroup = 'الخدمات';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'الإشتراكات';
    protected static ?string $navigationIcon = 'icon-subscription';
    protected static ?string $modelLabel = 'إشتراك';
    protected static ?string $pluralModelLabel = 'إشتراكات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ColumnGroup::make('الطالبة', [
                    ImageColumn::make('student.user.image')->circular()->label('الصورة'),
                    TextColumn::make('student.user.name')->label('الإسم')->limit(15),
                    TextColumn::make('trip.university.name')->label('الجامعة')->limit(20),

                ]),
                ColumnGroup::make('الحافلة', [
                    ImageColumn::make('trip.bus.image')->label('الصورة'),
                    TextColumn::make('trip.bus.number')->label('الرقم'),
                ]),

                ColumnGroup::make('الرحلة', [
                    TextColumn::make('trip.times_per_day')->label('عدد الرحلات في اليوم')->toggleable(true)->toggledHiddenByDefault()->badge()->color('success')
                        ->state(function (Subscription $record): string {
                            return $record->trip->times_per_day == 1 ? 'مرة في اليوم' : 'مرتان في اليوم';
                        }),
                    Tables\Columns\TextColumn::make('trip.first_going_time')->label('إنطلاق الرحلة  الأولى')->toggleable(true)->toggledHiddenByDefault()->state(function (Subscription $record): string {
                        return $record->trip->first_going_time ?? 'لا يوجد';
                    }),
                    Tables\Columns\TextColumn::make('trip.first_return_time')->label('عودة الرحلة  الأولى')->toggleable(true)->toggledHiddenByDefault()->state(function (Subscription $record): string {
                        return $record->trip->first_return_time ?? 'لا يوجد';
                    }),
                    Tables\Columns\TextColumn::make('trip.second_going_time')->label('إنطلاق الرحلة  الثانية')->toggleable(true)->toggledHiddenByDefault()->state(function (Subscription $record): string {
                        return $record->trip->second_going_time ?? 'لا يوجد';
                    }),
                    Tables\Columns\TextColumn::make('trip.second_return_time')->label('عودة الرحلة  الثانية')->toggleable(true)->toggledHiddenByDefault()->state(function (Subscription $record): string {
                        return $record->trip->second_return_time ?? 'لا يوجد';
                    }),
                ]),
                ColumnGroup::make('الاشتراك', [
                    TextColumn::make('plan')->label('مدة الاشتراك')->badge()->color('info')->icon('heroicon-s-clock'),
                    TextColumn::make('created_at')->label('بداية الاشتراك')->date('m/d'),
                    TextColumn::make('plan_expiration')->label('تاريخ الإنتهاء')->state(function (Subscription $record): string {
                        $plan = $record->plan;

                        match ($plan) {
                            '3 أشهر' => $months = 3,
                            '6 أشهر' => $months = 6,
                            '9 أشهر' => $months = 9,
                            '12 أشهر' => $months = 12,
                            default => $months = 0, // Handle unknown plan values
                        };

                        $now = Carbon::now();

                        // Add the calculated number of months to the current date
                        $expirationDate = $record->created_at->addMonths($months);

                        $remainingDays = $now->diffInDays($expirationDate);

                        $rest =  $expirationDate < $now ? " (انتهى) " :  " (متبقي {$remainingDays} يوم)";

                        return $expirationDate->format('m/d') . $rest;
                    }),
                ]),
                TextColumn::make('status')->label('الحالة')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'نشط' => 'success',
                        ' غير نشط' => 'danger',
                    })->icon(
                        fn (string $state): string => match ($state) {
                            'نشط' => 'heroicon-s-check-badge',
                            ' غير نشط' => 'heroicon-s-no-symbol',
                        }
                    ),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSubscriptions::route('/'),
        ];
    }
}
