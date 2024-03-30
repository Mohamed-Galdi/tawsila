<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use App\Models\Student;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ManageStudents extends ManageRecords
{
    protected static string $resource = StudentResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
    public function getTabs(): array
    {
        return [
            'الكل' => Tab::make()->badge(User::where('role', 'student')->count()),
            'لديها إشتراك' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('student', function ($query) {
                    $query->whereNotNull('trip_id');
                }))->badge(
                    Student::query()->whereNot('trip_id', null)->count()
                )->badgeColor('success'),
            'بدون إشتراك' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('student', function ($query) {
                $query->whereNull('trip_id');
            }))->badge(
                    Student::query()->where('trip_id', null)->count()
                )->badgeColor('danger'),
        ];
    }
}
