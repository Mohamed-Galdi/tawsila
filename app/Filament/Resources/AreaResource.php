<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AreaResource\Pages;
use App\Filament\Resources\AreaResource\RelationManagers;
use App\Models\Area;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AreaResource extends Resource
{
    protected static ?string $model = Area::class;

    protected static ?string $navigationGroup = 'الخدمات';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'المناطق';
    protected static ?string $navigationIcon = 'icon-area';
    protected static ?string $modelLabel = 'منطقة';
    protected static ?string $pluralModelLabel = 'مناطق';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('إسم المنطقة'),
                Forms\Components\Select::make('status')->label('الحالة')
                    ->required()
                    ->options(['مغطاة' => 'مغطاة', 'غير مغطاة' => 'غير مغطاة']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('إسم المنطقة')->searchable(),
                Tables\Columns\TextColumn::make('statusx')->label('الحالة')->badge()
                    ->state(function (Area $record): string {
                        return $record->trips()->count() == 0 ? 'غير مغطاة': 'مغطاة';
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'مغطاة' => 'success',
                        'غير مغطاة' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('trips')->label('عدد الرحلات')->state(function (Area $record): string {
                    return $record->trips()->count();
                }),
                Tables\Columns\TextColumn::make('created_at')->label('تاريخ الإضافة')->dateTime()->sortable()->since(),

            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ManageAreas::route('/'),
        ];
    }
}
