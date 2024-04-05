<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\ChartWidget;

class Students extends ChartWidget
{
    protected static ?string $heading = 'الطالبات';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => '  ',
                    'data' =>
                    [
                        Student::whereHas('subscription', function ($query) {
                            $query->where('status', '1');
                        })->count(),
                        Student::whereDoesntHave('subscription', function ($query) {
                            $query->where('status', '1');
                        })->count(),
                    ],
                    'backgroundColor' => [
                        '#22c55e',
                        '#f59e0b',
                    ],
                ],
            ],
            'labels' => ['لديها إشتراك', 'بدون إشتراك'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
    public static function getSort(): int
    {
        return 6;
    }
}
