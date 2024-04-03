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
            'الكل' => Tab::make()->badge(Student::all()->count()),

            'لديها إشتراك' => Tab::make()
                ->modifyQueryUsing(function ($query) {
                    $query->whereHas('student', function ($query) {
                        $query->whereHas('subscription', function ($query) {
                            $query->where('status', '1');
                        });
                    });
                })
                ->badge(function () {
                    return Student::whereHas('subscription', function ($query) {
                        $query->where('status', '1');
                    })->count();
                })

                ->badgeColor('success'),



            'بدون إشتراك' => Tab::make()
                ->modifyQueryUsing(function ($query) {
                    $query->whereHas('student', function ($query) {
                        $query->whereDoesntHave('subscription', function ($query) {
                            $query->where('status', '1');
                        });
                    });
                })
                ->badge(function () {
                    return Student::whereDoesntHave('subscription', function ($query) {
                        $query->where('status', '1');
                    })->count();
                })
                ->badgeColor('danger'),
        ];
    }
}
