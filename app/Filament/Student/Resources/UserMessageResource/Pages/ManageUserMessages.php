<?php

namespace App\Filament\Student\Resources\UserMessageResource\Pages;

use App\Filament\Student\Resources\UserMessageResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ManageRecords;

class ManageUserMessages extends ManageRecords
{
    protected static string $resource = UserMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->createAnother(false)->mutateFormDataUsing(function (array $data): array {
                $data['user_id'] = auth()->user()->id;
                return $data;
            }),
            Action::make('الصفحة الرئيسية')->url('/')->icon('heroicon-s-home')->color('gray')->label('الصفحة الرئيسية'),

        ];
    }
}
