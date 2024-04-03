<?php

namespace App\Filament\Widgets;

use App\Models\Area;
use App\Models\Bus;
use App\Models\Subscription;
use App\Models\University;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(' الإشتراكات ', Subscription::all()->count())->description('32% زيادة')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart(
                    [0, 5, 12, 8, 9, 11, 13, 11, 9, 6, 18, 9, 10, 13]

                )
                ->color('success'),
            Stat::make(' مجموع  الحافلات ', Bus::all()->count())->description('18% زيادة')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart(
                    [27, 14, 29, 19, 9, 7, 20, 2, 30, 25, 3, 28, 30]
                )
                ->color('warning'),
            Stat::make(' مجموع  الجامعات ', University::all()->count())->description('26% زيادة')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart(
                    [16, 12, 30, 13, 29, 14, 28, 23, 25, 26, 20]
                )
                ->color('info'),


        ];
    }
}
