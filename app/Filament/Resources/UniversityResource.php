<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UniversityResource\Pages;
use App\Filament\Resources\UniversityResource\RelationManagers;
use App\Models\University;
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

class UniversityResource extends Resource
{
    protected static ?string $model = University::class;

    protected static ?string $navigationGroup = 'الخدمات';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'الجامعات';
    protected static ?string $navigationIcon = 'icon-university';
    protected static ?string $modelLabel = 'جامعة';
    protected static ?string $pluralModelLabel = 'جامعات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('إسم الجامعة')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')->label('العنوان')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')->label('الصورة')->disk('public')->directory('ourUniversities')
                    ->required(),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make([
                ImageEntry::make('image')->hiddenLabel(),
            ])->columnSpan(1),
            Section::make([
                TextEntry::make('name')->label('إسم الجامعة')->color('primary'),
                TextEntry::make('address')->label('العنوان')->color('primary'),
                TextEntry::make('trips')->label('عدد الرحلات')->state(function (University $record): string {
                    return $record->trips()->count();
                })->color('primary'),
            ])->columnSpan(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('الصورة'),
                Tables\Columns\TextColumn::make('name')->label('إسم الجامعة')->searchable()->limit(20),
                Tables\Columns\TextColumn::make('address')->label('العنوان')->searchable()->limit(20),
                Tables\Columns\TextColumn::make('trips')->label('عدد الرحلات')->state(function (University $record): string {
                    return $record->trips()->count();
                }),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->since(),

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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUniversities::route('/'),
        ];
    }
}
