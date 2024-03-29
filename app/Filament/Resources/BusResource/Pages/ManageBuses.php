<?php

namespace App\Filament\Resources\BusResource\Pages;

use App\Filament\Resources\BusResource;
use App\Models\Bus;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Builder;

class ManageBuses extends ManageRecords
{
    protected static string $resource = BusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'الكل' => Tab::make()->badge(Bus::all()->count()),
            'متوفر' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'متوفر'))->badge(
                    Bus::query()->where('status', 'متوفر')->count()
                )->badgeColor('success'),
            'ممتلئ' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'ممتلئ'))->badge(
                    Bus::query()->where('status', 'ممتلئ')->count()
                )->badgeColor('info'),
            'خارج الخدمة' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'خارج الخدمة'))->badge(
                    Bus::query()->where('status', 'خارج الخدمة')->count()
                )->badgeColor('danger'),
        ];
    }
}
