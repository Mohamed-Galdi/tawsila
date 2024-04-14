<?php

namespace App\Filament\Resources\GuestMessageResource\Pages;

use App\Filament\Resources\GuestMessageResource;
use App\Models\GuestMessage;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ManageRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ManageGuestMessages extends ManageRecords
{
    protected static string $resource = GuestMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('الصفحة الرئيسية')->url('/')->icon('heroicon-s-home')->color('gray')->label('الصفحة الرئيسية'),
        ];
    }
    public function getTabs(): array
    {
        return [
                'الكل' => Tab::make()->badge(GuestMessage::all()->count())->badgeColor('info'),
                'تم الرد عليها' => Tab::make()
                    ->modifyQueryUsing(fn (Builder $query) => $query->where('replied', true))->badge(
                        GuestMessage::query()->where('replied', true)->count()
                    )->badgeColor('success'),
                'لم يتم الرد عليها' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('replied', false))->badge(
                    GuestMessage::query()->where('replied', false)->count()
                )->badgeColor('danger'),

            ];
    }
}
