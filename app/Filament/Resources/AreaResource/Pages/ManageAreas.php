<?php

namespace App\Filament\Resources\AreaResource\Pages;

use App\Filament\Resources\AreaResource;
use App\Models\Area;
use App\Models\Bus;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Builder;

class ManageAreas extends ManageRecords
{
    protected static string $resource = AreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'الكل' => Tab::make()->badge(Area::all()->count()),
            'مغطاة' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('trips'))->badge(
                    Area::whereHas('trips')->count()
                )->badgeColor('success'),
            'غير مغطاة' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereDoesntHave('trips'))->badge(
                    Area::whereDoesntHave('trips')->count()
                )->badgeColor('info'),
        ];
    }
}
