<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusResource\Pages;
use App\Filament\Resources\BusResource\RelationManagers;
use App\Models\Bus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BusResource extends Resource
{
    protected static ?string $model = Bus::class;

    protected static ?string $navigationGroup = 'الخدمات';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'الحافلات';
    protected static ?string $navigationIcon = 'icon-bus';
    protected static ?string $modelLabel = 'حافلة';
    protected static ?string $pluralModelLabel = 'حافلات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number')->label('رقم الحافلة')->required()->maxLength(255),
                Forms\Components\Select::make('status')->label('الحالة')->required()->options(['متوفر' => 'متوفر', 'خارج الخدمة' => 'خارج الخدمة', 'ممتلئ' => 'ممتلئ'])->native(false),
                Forms\Components\TextInput::make('total_seats')->label('مجموع المقاعد')->required()->numeric(),
                Forms\Components\TextInput::make('available_seats')->label('المقاعد المتوفرة')->required()->numeric(),
                Forms\Components\FileUpload::make('image')->label('الصورة')->disk('public')->directory('busImages')->image()->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')->label('رقم الحافلة'),
                Tables\Columns\ImageColumn::make('image')->label('الصورة'),
                Tables\Columns\TextColumn::make('total_seats')->label('مجموع المقاعد'),
                Tables\Columns\TextColumn::make('available_seats')->label('المقاعد المتوفرة'),
                Tables\Columns\TextColumn::make('status')->label('الحالة')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'متوفر' => 'success',
                        'خارج الخدمة' => 'danger',
                        'ممتلئ' => 'info',
                    }),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->label('تاريخ الإضافة')->since(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make([
                ImageEntry::make('image')->hiddenLabel()->height(300)->width(350),
            ])->columnSpan(1),
            Section::make([
                TextEntry::make('number')->label('رقم الحافلة')->color('primary'),
                TextEntry::make('status')->label('الحالة')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'متوفر' => 'success',
                        'خارج الخدمة' => 'danger',
                        'ممتلئ' => 'info',
                    }),
                TextEntry::make('total_seats')->label('مجموع المقاعد')->color('primary'),
                TextEntry::make('available_seats')->label('المقاعد المتوفرة')->color('primary'),
            ])->columnSpan(1),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBuses::route('/'),
        ];
    }
}
