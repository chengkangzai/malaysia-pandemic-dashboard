<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ICUResource\Pages;
use App\Models\DeathsState;
use App\Models\ICU;
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

class ICUResource extends Resource
{
    protected static ?string $model = ICU::class;

    protected static ?string $label = 'Intensive care unit';

    protected static ?string $pluralLabel = 'Intensive care units';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Medical Facilities';

    public static function infolist(Infolist $infolist): Infolist
    {
//date: yyyy-mm-dd format; data correct as of 2359hrs on that date
//state: name of state, with similar qualification on exhaustiveness of date-state combos as PKRC data
//beds_icu: total gazetted ICU beds
//beds_icu_rep: total beds aside from (3) which are temporarily or permanently designated to be under the care of Anaesthesiology & Critical Care departments
//beds_icu_total: total critical care beds available (with related medical infrastructure)
//beds_icu_covid: total critical care beds dedicated for COVID-19
//vent: total available ventilators
//vent_port: total available portable ventilators
//icu_x: total number of individuals in category x under intensive care, where x can be suspected/probable, COVID-19 positive, or non-COVID; this is a stock variable
//vent_x: total number of individuals in category x on mechanical ventilation, where x can be suspected/probable, COVID-19 positive, or non-COVID; this is a stock variable
        return $infolist
            ->schema([
                TextEntry::make('date')->badge()->date(),
                TextEntry::make('state')->badge(),

                Section::make('ICU Beds')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('bed_icu')
                            ->label('Total ICU beds')
                            ->tooltip('Total gazetted ICU beds')
                            ->numeric(),
                        TextEntry::make('bed_icu_rep')
                            ->label('Total ICU beds (repurposed)')
                            ->tooltip('Total beds aside gazetted bed which are temporarily or permanently designated to be under the care of Anaesthesiology & Critical Care departments')
                            ->numeric(),
                        TextEntry::make('bed_icu_covid')
                            ->label('Total ICU beds (COVID-19)')
                            ->tooltip('Total critical care beds dedicated for COVID-19')
                            ->numeric(),
                        TextEntry::make('bed_icu_total')
                            ->label('Total ICU beds (total)')
                            ->tooltip('Total critical care beds available (with related medical infrastructure)')
                            ->numeric(),
                    ]),

                Section::make('Available Ventilators')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('vent')
                            ->label('Ventilators')
                            ->numeric(),
                        TextEntry::make('vent_port')
                            ->label('Portable ventilators')
                            ->numeric(),
                    ]),

                Section::make('Ventilators in Use')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('vent_covid')
                            ->label('COVID-19')
                            ->numeric(),
                        TextEntry::make('vent_pui')
                            ->label('Person under investigation')
                            ->numeric(),
                        TextEntry::make('vent_noncovid')
                            ->label('Non-COVID-19')
                            ->numeric(),
                        TextEntry::make('vent_used')
                            ->label('Total Used')
                            ->numeric(),
                        TextEntry::make('vent_port_used')
                            ->label('Total Used (portable)')
                            ->numeric(),
                    ]),

                Section::make('ICU Patients')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('icu_covid')
                            ->label('COVID-19')
                            ->numeric(),
                        TextEntry::make('icu_pui')
                            ->label('Person under investigation')
                            ->numeric(),
                        TextEntry::make('icu_noncovid')
                            ->label('Non-COVID-19')
                            ->numeric(),
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
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('bed_icu')
                    ->toggleable()
                    ->label('Total ICU beds')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bed_icu_rep')
                    ->label('Total ICU beds (repurposed)')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bed_icu_total')
                    ->label('Total ICU beds (total)')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bed_icu_covid')
                    ->label('Total ICU beds (COVID-19)')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vent')
                    ->toggleable()
                    ->label('Total Ventilators')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vent_port')
                    ->toggleable()
                    ->label('Total Portable ventilators')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('icu_covid')
                    ->label('COVID-19')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('icu_pui')
                    ->label('Person under investigation')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('icu_noncovid')
                    ->label('Non-COVID-19')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vent_covid')
                    ->label('Ventilators (COVID-19)')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vent_pui')
                    ->label('Ventilators (Person under investigation)')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vent_noncovid')
                    ->label('Ventilators (Non-COVID-19)')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vent_used')
                    ->toggleable()
                    ->label('Total Ventilators in Use')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vent_port_used')
                    ->toggleable()
                    ->label('Total Portable Ventilators in Use')
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
            'index' => Pages\ManageICUS::route('/'),
        ];
    }
}
