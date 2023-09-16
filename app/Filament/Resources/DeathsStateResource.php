<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeathsStateResource\Pages;
use App\Models\DeathsState;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DeathsStateResource extends Resource
{
    protected static ?string $model = DeathsState::class;

    protected static ?string $label = 'States Deaths';

    protected static ?string $navigationGroup = 'Deaths';

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('date')->badge()->date(),
                TextEntry::make('state')->badge(),

                TextEntry::make('deaths_new')
                    ->label('New Deaths')
                    ->numeric()
                    ->helperText(str('Deaths due to COVID-19 based on **reported to the public**')->markdown()->toHtmlString()),
                TextEntry::make('deaths_commutative')
                    ->label('Cumulative Deaths')
                    ->numeric(),
                TextEntry::make('deaths_new_dod')
                    ->label('New Deaths (DOD)')
                    ->numeric()
                    ->helperText(str('Deaths due to COVID-19 based on **date of death**')->markdown()->toHtmlString()),

                TextEntry::make('deaths_tat')
                    ->numeric()
                    ->helperText('Median days between date of death and date of report for all deaths reported on the day'),

                Section::make('Brought-in Death')
                    ->collapsible()
                    ->collapsed()
                    ->columns(2)
                    ->compact()
                    ->schema([
                        TextEntry::make('deaths_bid')
                            ->label('Brought-in dead')
                            ->numeric()
                            ->helperText('Deaths due to COVID-19 which were brought-in dead based on date reported to the public'),
                        TextEntry::make('deaths_bid_dod')
                            ->label('Brought-in dead (DOD)')
                            ->numeric()
                            ->helperText('Deaths due to COVID-19 which were brought-in dead based on date of death'),
                        TextEntry::make('deaths_bid_cumulative')
                            ->label('Cumulative Brought-in dead')
                            ->numeric()
                            ->helperText('Cumulative Brought-in dead'),
                    ]),

                Section::make('Deaths by Vaccination Status')
                    ->collapsible()
                    ->collapsed()
                    ->columns(2)
                    ->compact()
                    ->schema([
                        TextEntry::make('deaths_unvax')
                            ->label('Un-vaccinated')
                            ->numeric()
                            ->helperText('Deaths of unvaccinated individuals who died due to COVID-19 based on date of death'),
                        TextEntry::make('deaths_pvax')
                            ->label('Partially vaccinated')
                            ->numeric()
                            ->helperText('Deaths of partially-vaccinated individuals who died due to COVID-19 based on date of death'),
                        TextEntry::make('deaths_fvax')
                            ->label('Fully vaccinated')
                            ->numeric()
                            ->helperText('Deaths of fully-vaccinated individuals who died due to COVID-19 based on date of death'),
                        TextEntry::make('deaths_boost')
                            ->label('Booster dose')
                            ->numeric()
                            ->helperText('Deaths of individuals who received a booster dose and died due to COVID-19 based on date of death'),
                    ]),
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
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('deaths_new')
                    ->label('New Deaths')
                    ->tooltip('deaths due to COVID-19 based on date reported to public')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deaths_commutative')
                    ->label('Cumulative Deaths')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deaths_bid')
                    ->label('Brought-in dead')
                    ->tooltip('deaths due to COVID-19 which were brought-in dead based on date reported to public')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deaths_bid_cumulative')
                    ->label('Cumulative Brought-in dead')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('deaths_tat')
                    ->label('Turnaround Time')
                    ->tooltip('median days between date of death and date of report for all deaths reported on the day')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('deaths_new_dod')
                    ->tooltip('deaths due to COVID-19 based on date of death')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deaths_bid_dod')
                    ->tooltip('deaths due to COVID-19 which were brought-in dead based on date of death (perfect subset of deaths_new_dod)')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deaths_unvax')
                    ->tooltip('deaths of unvaccinated individuals who died due to COVID-19 based on date of death')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deaths_pvax')
                    ->tooltip('deaths of partially-vaccinated individuals who died due to COVID-19 based on date of death')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deaths_fvax')
                    ->tooltip('deaths of fully-vaccinated individuals who died due to COVID-19 based on date of death')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deaths_boost')
                    ->tooltip('deaths of individuals who received a booster dose and died due to COVID-19 based on date of death')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                Filter::make('date')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(fn(Builder $query, array $data): Builder => $query
                        ->when($data['created_from'],
                            fn(Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                        )
                        ->when($data['created_until'],
                            fn(Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
                        )),

                Tables\Filters\SelectFilter::make('state')
                    ->options(DeathsState::STATE)
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
                    ->query(fn(Builder $query, array $data): Builder => $query
                        ->when($data['range'],
                            fn(Builder $query, $range): Builder => $query->whereDate('date', '>=', now()->subDays($range)),
                        )),
            ], Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDeathsStates::route('/'),
        ];
    }
}
