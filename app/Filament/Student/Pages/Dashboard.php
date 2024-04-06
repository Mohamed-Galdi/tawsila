<?php

namespace App\Filament\Student\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.student.pages.dashboard';

    // protected function getHeading(): string
    // {
    //     $company = auth()->user()->student->name;
    //     return "{$company}'s Dashboard";
    // }
    
};
