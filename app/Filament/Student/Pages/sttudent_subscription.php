<?php

namespace App\Filament\Student\Pages;

use Filament\Pages\Page;

class sttudent_subscription extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-adjustments-vertical';
    protected static string $view = 'filament.student.pages.sttudent_subscription';
    protected static ?int  $navigationSort = 2;
    protected static ?string $title = ' الإشتراك';
    protected  ?string $heading = 'إعدادات الإشتراك ';
}
