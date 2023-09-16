<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestStateResource\Pages;
use App\Models\CasesState;
use App\Models\TestState;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TestStateResource extends Resource
{
    protected static ?string $model = TestState::class;

    protected static ?string $navigationIcon = 'heroicon-o-check';

    protected static ?string $navigationGroup = 'Tests';

    protected static ?string $label = 'State Test';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('date')->date(),
                TextEntry::make('state')->badge(),
                TextEntry::make('rtk_ag')
                    ->label('Rapid Test Kit Antigen')
                    ->numeric(),
                TextEntry::make('pcr')
                    ->label('Polymerase Chain Reaction')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('date', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rtk_ag')
                    ->label('Rapid Test Kit Antigen')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pcr')
                    ->label('Polymerase Chain Reaction')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                Filter::make('date')
                    ->form([
                        DatePicker::make('from'),
                        DatePicker::make('until'),
                    ])
                    ->query(fn (Builder $query, array $data): Builder => $query
                        ->when($data['from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                        )
                        ->when($data['until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
                        )),

                Tables\Filters\SelectFilter::make('state')
                    ->options(CasesState::STATE)
                    ->searchable()
                    ->attribute('state'),

                Tables\Filters\SelectFilter::make('date_range')
                    ->form([
                        Select::make('range')
                            ->options([
                                7 => '7 Days',
                                14 => '14 Days',
                                30 => '1 Month',
                            ]),
                    ])
                    ->query(fn (Builder $query, array $data): Builder => $query
                        ->when($data['range'],
                            fn (Builder $query, $range): Builder => $query->whereDate('date', '>=', now()->subDays($range)),
                        )),
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
            'index' => Pages\ManageTestStates::route('/'),
        ];
    }
}
