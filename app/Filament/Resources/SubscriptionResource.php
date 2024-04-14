<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionResource\Pages;
use App\Filament\Resources\SubscriptionResource\RelationManagers;
use App\Models\Student;
use App\Models\Subscription;
use App\Models\Trip;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\Group;
use Filament\Forms\Components\Group as FormGroup;
use Filament\Forms\Components\ToggleButtons;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
                Select::make('student_id')->native(false)->label('الطالبة')->options(Student::doesntHave('subscription')->get()->mapWithKeys(function ($student) {
                    return [$student->id => $student->user->name];
                })->toArray())->hidden(function (string $operation) {
                    return $operation == 'edit';
                })->columnSpan(1),

                Select::make('trip')->Relationship('trip')->native(false)->label('الرحلة')->columnSpan(function (string $operation) {
                    return $operation == 'edit' ? 3 : 2;
                })
                    ->getOptionLabelFromRecordUsing(function ($record) {
                        $areaNames = [];
                        foreach ($record->areas as $area) {
                            $areaNames[] = $area->name;
                        }
                        return '[' . implode(', ', $areaNames) . ']' . ' -------> ' . $record->university->name;
                    }),
                ToggleButtons::make('plan')->label('مدة الاشتراك')
                    ->options([
                        '3 أشهر' => '3 أشهر',
                        '6 أشهر' => '6 أشهر',
                        '9 أشهر' => '9 أشهر',
                        '12 أشهر' => '12 أشهر',
                    ])
                    ->colors([
                        '3 أشهر' => 'info',
                        '6 أشهر' => 'info',
                        '9 أشهر' => 'info',
                        '12 أشهر' => 'info',
                    ])
                    ->icons([
                        '3 أشهر' => 'heroicon-s-clock',
                        '6 أشهر' => 'heroicon-s-clock',
                        '9 أشهر' => 'heroicon-s-clock',
                        '12 أشهر' => 'heroicon-s-clock',
                    ])
                    ->columns(5)->columnSpanFull()
            ])->columns(3);
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
                    ImageColumn::make('trip.bus.image')->label('صورة الحافلة ')->toggleable(true)->toggledHiddenByDefault(),
                    TextColumn::make('trip.bus.number')->label('رقم الحافلة ')->toggleable(true)->toggledHiddenByDefault(),
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
                    TextColumn::make('created_at')->label('البدء')->date('m/d'),
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
                TextColumn::make('stats')->label('الحالة')->badge()
                    ->state(function (Subscription $record): string {
                        return match ($record->status) {
                            '1' => 'نشط',
                            '0' => 'غير نشط',
                        };
                    })
                    ->color((function (Subscription $record): string {
                        return match ($record->status) {
                            '1' => 'success',
                            '0' => 'danger',
                        };
                    }))
                    ->icon((function (Subscription $record): string {
                        return match ($record->status) {
                            '1' => 'heroicon-s-check-badge',
                            '0' => 'heroicon-s-no-symbol',
                        };
                    })),
                ToggleColumn::make('status')->label('تغيير'),


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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([

            Section::make([
                Fieldset::make('الطالبة')->schema([
                    ImageEntry::make('student.user.image')->hiddenLabel()->height(50)->width(50)->circular(),
                    TextEntry::make('student.user.name')->hiddenLabel()->alignCenter(),
                ])->columnSpan(1)->columns(1),
                Fieldset::make('الحافلة')->schema([
                    ImageEntry::make('trip.bus.image')->height(60)->width(60)->hiddenLabel()->alignCenter(),
                    TextEntry::make('trip.bus.number')->hiddenLabel(),
                ])->columnSpan(1)->columns(1),
                Fieldset::make('الاشتراك')->schema([
                    TextEntry::make('plan')->label('مدة الاشتراك')->badge()->color('info')->icon('heroicon-s-clock')->columnSpan(1),
                    TextEntry::make('created_at')->label('بداية الاشتراك')->date('m/d')->columnSpan(1),
                    TextEntry::make('plan_expiration')->label('تاريخ الإنتهاء')->state(function (Subscription $record): string {
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
                    })->columnSpan(1),
                    TextEntry::make('status')->label('الحالة')->badge()
                        ->state(function (Subscription $record): string {
                            return match ($record->status) {
                                '1' => 'نشط',
                                '0' => 'غير نشط',
                            };
                        })
                        ->color((function (Subscription $record): string {
                            return match ($record->status) {
                                '1' => 'success',
                                '0' => 'danger',
                            };
                        }))
                        ->icon((function (Subscription $record): string {
                            return match ($record->status) {
                                '1' => 'heroicon-s-check-badge',
                                '0' => 'heroicon-s-no-symbol',
                            };
                        })),
                ])->columns(2)->columnSpan(3),
            ])->columns(5),
            // Fieldset::make('الاشتراك')->schema([
            //     TextEntry::make('plan')->label('مدة الاشتراك')->badge()->color('info')->icon('heroicon-s-clock')->columnSpan(1),
            //     TextEntry::make('created_at')->label('بداية الاشتراك')->date('m/d')->columnSpan(1),
            //     TextEntry::make('plan_expiration')->label('تاريخ الإنتهاء')->state(function (Subscription $record): string {
            //         $plan = $record->plan;

            //         match ($plan) {
            //             '3 أشهر' => $months = 3,
            //             '6 أشهر' => $months = 6,
            //             '9 أشهر' => $months = 9,
            //             '12 أشهر' => $months = 12,
            //             default => $months = 0, // Handle unknown plan values
            //         };

            //         $now = Carbon::now();

            //         // Add the calculated number of months to the current date
            //         $expirationDate = $record->created_at->addMonths($months);

            //         $remainingDays = $now->diffInDays($expirationDate);

            //         $rest =  $expirationDate < $now ? " (انتهى) " :  " (متبقي {$remainingDays} يوم)";

            //         return $expirationDate->format('m/d') . $rest;
            //     })->columnSpan(1),
            //     TextEntry::make('status')->label('الحالة')->badge()
            //         ->color(fn (string $state): string => match ($state) {
            //             'نشط' => 'success',
            //             ' غير نشط' => 'danger',
            //         })->icon(
            //             fn (string $state): string => match ($state) {
            //                 'نشط' => 'heroicon-s-check-badge',
            //                 ' غير نشط' => 'heroicon-s-no-symbol',
            //             }
            //         )->columnSpan(1),
            // ])->columns(4),
            Fieldset::make('الرحلة')->schema([
                TextEntry::make('trip.times_per_day')->label('عدد الرحلات في اليوم')->badge()->color('success')
                    ->state(function (Subscription $record): string {
                        return $record->trip->times_per_day == 1 ? 'مرة في اليوم' : 'مرتان في اليوم';
                    }),
                TextEntry::make('trip.first_going_time')->label('إنطلاق الرحلة  الأولى')->state(function (Subscription $record): string {
                    return $record->trip->first_going_time ?? 'لا يوجد';
                }),
                TextEntry::make('trip.first_return_time')->label('عودة الرحلة  الأولى')->state(function (Subscription $record): string {
                    return $record->trip->first_return_time ?? 'لا يوجد';
                }),
                TextEntry::make('trip.second_going_time')->label('إنطلاق الرحلة  الثانية')->state(function (Subscription $record): string {
                    return $record->trip->second_going_time ?? 'لا يوجد';
                }),
                TextEntry::make('trip.second_return_time')->label('عودة الرحلة  الثانية')->state(function (Subscription $record): string {
                    return $record->trip->second_return_time ?? 'لا يوجد';
                }),
                Fieldset::make('الجامعة')->schema([
                    ImageEntry::make('trip.university.image')->height(50)->hiddenLabel(),
                    TextEntry::make('trip.university.name')->hiddenLabel(),
                    TextEntry::make('trip.university.address')->hiddenLabel(),
                ])->columnSpan(2)->columns(1),
                Fieldset::make('المناطق')->schema([
                    TextEntry::make('trip.areas.name')->hiddenLabel()->badge()->color('info'),
                ])->columnSpan(2),
            ])->columns(5)

        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSubscriptions::route('/'),
        ];
    }
}
