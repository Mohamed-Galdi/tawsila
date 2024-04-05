<?php

namespace App\Filament\Widgets;

use App\Models\Driver;
use Filament\Widgets\ChartWidget;

class Drivers extends ChartWidget
{
    protected static ?string $heading = 'السائقون';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => '  ',
                    'data' => [Driver::where('status', 'تم التوثيق')->count(), Driver::where('status', 'قيد المراجعة')->count(), Driver::where('status', 'مرفوض')->count(),],
                    'backgroundColor' => [
                        '#22c55e',
                        '#0ea5e9',
                        '#ef4444'
                    ],
                ],
            ],
            'labels' => ['تم التوثيق', 'قيد المراجعة', 'مرفوض'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
    public static function getSort(): int
    {
        return 5;
    }
}
