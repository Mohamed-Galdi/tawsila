<?php

namespace App\Filament\Resources\DriverResource\Pages;

use App\Filament\Resources\DriverResource;
use App\Models\Driver;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ManageDrivers extends ManageRecords
{
    protected static string $resource = DriverResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
    public function getTabs(): array
    {
        return [
            'الكل' => Tab::make()->badge(User::where('role', 'driver')->count()),
            'قيد المراجعة' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('driver', function ($query) {
                    $query->where('status', 'قيد المراجعة');
                }))->badge(
                    Driver::query()->where('status', 'قيد المراجعة')->count()
                )->badgeColor('info'),

            'تم التوثيق' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('driver', function ($query) {
                    $query->where('status', 'تم التوثيق');
                }))->badge(
                    Driver::query()->where('status', 'تم التوثيق')->count()
                )->badgeColor('success'),
           
            ' مرفوض' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('driver', function ($query) {
                    $query->where('status', ' مرفوض');
                }))->badge(
                    Driver::query()->where('status', ' مرفوض')->count()
                )->badgeColor('danger'),

        ];
    }
}
