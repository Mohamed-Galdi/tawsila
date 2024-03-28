<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TripResource\Pages;
use App\Filament\Resources\TripResource\RelationManagers;
use App\Models\Trip;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TripResource extends Resource
{
    protected static ?string $model = Trip::class;

    protected static ?string $navigationGroup = 'الخدمات';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'الرحلات';
    protected static ?string $navigationIcon = 'icon-trip';
    protected static ?string $modelLabel = 'رحلة';
    protected static ?string $pluralModelLabel = 'رحلات';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('area_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('university_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('bus_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('times_per_day')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('first_going_time')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('first_return_time')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('second_going_time')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('second_return_time')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('area_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('university_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bus_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('times_per_day')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_going_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_return_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('second_going_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('second_return_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ManageTrips::route('/'),
        ];
    }
}
