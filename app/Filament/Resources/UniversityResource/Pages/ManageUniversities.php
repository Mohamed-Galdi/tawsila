<?php

namespace App\Filament\Resources\UniversityResource\Pages;

use App\Filament\Resources\UniversityResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ManageRecords;

class ManageUniversities extends ManageRecords
{
    protected static string $resource = UniversityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('الصفحة الرئيسية')->url('/')->icon('heroicon-s-home')->color('gray')->label('الصفحة الرئيسية'),

        ];
    }
}
