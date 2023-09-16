<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PopulationResource\Pages;
use App\Models\Population;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PopulationResource extends Resource
{
    protected static ?string $model = Population::class;

    protected static ?string $navigationGroup = 'Statistics';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('state')->badge(),
                TextEntry::make('pop')
                    ->numeric(),
                TextEntry::make('pop_18')
                    ->label('Population 18+')
                    ->numeric(),
                TextEntry::make('pop_60')
                    ->label('Population 60+')
                    ->tooltip('Also a subset of Population 18+')
                    ->numeric(),
                TextEntry::make('pop_12')
                    ->label('Population 12 - 17')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pop')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pop_18')
                    ->label('Population 18+')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pop_60')
                    ->label('Population 60+')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pop_12')
                    ->label('Population 12 - 17')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('state')
                    ->options(Population::STATE)
                    ->searchable()
                    ->attribute('state'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePopulations::route('/'),
        ];
    }
}
