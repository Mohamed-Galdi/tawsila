<?php

namespace App\Filament\Resources\UserMessageResource\Pages;

use App\Filament\Resources\UserMessageResource;
use App\Models\UserMessage;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ManageRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;



class ManageUserMessages extends ManageRecords
{
    protected static string $resource = UserMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Action::make('الصفحة الرئيسية')->url('/')->icon('heroicon-s-home')->color('gray')->label('الصفحة الرئيسية'),

        ];
    }
    public function getTabs(): array
    {
        return [
            'الكل' => Tab::make()->badge(UserMessage::all()->count())->badgeColor('info'),
            'تم الرد عليها' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('replied', true))->badge(
                    UserMessage::query()->where('replied', true)->count()
                )->badgeColor('success'),
            'لم يتم الرد عليها' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('replied', false))->badge(
                    UserMessage::query()->where('replied', false)->count()
                )->badgeColor('danger'),
           
        ];
    }
}
