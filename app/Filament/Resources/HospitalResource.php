<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HospitalResource\Pages;
use App\Models\DeathsState;
use App\Models\Hospital;
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

class HospitalResource extends Resource
{
    protected static ?string $model = Hospital::class;

    protected static ?string $label = 'Hospitals';

    protected static ?string $navigationGroup = 'Medical Facilities';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('date')->badge()->date(),
                TextEntry::make('state')->badge(),

                Section::make('Beds')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('beds')
                            ->label('Total beds')
                            ->numeric(),
                        TextEntry::make('beds_covid')
                            ->label('Total beds for COVID-19')
                            ->numeric(),
                        TextEntry::make('beds_noncrit')
                            ->label('Total beds for non-critical care')
                            ->numeric(),
                    ]),

                Section::make('Admitted')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('admitted_pui')
                            ->label('Admitted PUI')
                            ->tooltip('Number of individuals under investigation admitted to hospitals')
                            ->numeric(),
                        TextEntry::make('admitted_covid')
                            ->label('Admitted COVID-19')
                            ->tooltip('Number of individuals COVID-19 positive admitted to hospitals')
                            ->numeric(),
                        TextEntry::make('admitted_total')
                            ->label('Total Admitted')
                            ->tooltip('Total number of individuals admitted to hospitals')
                            ->numeric(),
                    ]),

                Section::make('Discharged')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('discharged_pui')
                            ->label('Discharged PUI')
                            ->tooltip('Number of individuals under investigation discharged from hospitals')
                            ->numeric(),
                        TextEntry::make('discharged_covid')
                            ->label('Discharged COVID-19')
                            ->tooltip('Number of individuals COVID-19 positive discharged from hospitals')
                            ->numeric(),
                        TextEntry::make('discharged_total')
                            ->label('Total Discharged')
                            ->tooltip('Total number of individuals discharged from hospitals')
                            ->numeric(),
                    ]),

                Section::make('Individuals in Hospital')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('hosp_covid')
                            ->label('COVID-19')
                            ->tooltip('Total number of individuals COVID-19 positive in hospitals')
                            ->numeric(),
                        TextEntry::make('hosp_pui')
                            ->label('Under Investigation')
                            ->tooltip('Total number of individuals under investigation in hospitals')
                            ->numeric(),
                        TextEntry::make('hosp_noncovid')
                            ->label('Non COVID-19')
                            ->tooltip('Total number of individuals non-COVID in hospitals')
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
                Tables\Columns\TextColumn::make('beds')
                    ->toggleable()
                    ->label('Total beds')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('beds_covid')
                    ->label('beds for COVID-19')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('beds_noncrit')
                    ->label('beds for non-critical care')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('admitted_pui')
                    ->label('Under Investigation Admitted')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('admitted_covid')
                    ->label('COVID-19 Admitted')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('admitted_total')
                    ->toggleable()
                    ->label('Total Admitted')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discharged_pui')
                    ->label('Under Investigation Discharged')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discharged_covid')
                    ->label('COVID-19 Discharged')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discharged_total')
                    ->toggleable()
                    ->label('Total Discharged')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hosp_covid')
                    ->toggleable()
                    ->label('COVID-19')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hosp_pui')
                    ->toggleable()
                    ->label('Under Investigation')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hosp_noncovid')
                    ->toggleable()
                    ->label('Non COVID-19')
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
            'index' => Pages\ManageHospitals::route('/'),
        ];
    }
}
