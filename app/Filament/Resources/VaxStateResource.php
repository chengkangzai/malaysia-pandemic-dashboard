<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VaxStateResource\Pages;
use App\Models\CasesState;
use App\Models\VaxState;
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

class VaxStateResource extends Resource
{
    protected static ?string $model = VaxState::class;

    protected static ?string $label = 'States Vaccinations';

    protected static ?string $navigationGroup = 'Vaccination';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function infolist(Infolist $infolist): Infolist
    {
        //date: yyyy-mm-dd format; data correct as of 2359hrs on that date
        //state: Name of state (present in state file, but not country file)
        //daily_partial: 1st doses (for double-dose vaccines) delivered between 0000 and 2359 on date
        //daily_full: 2nd doses (for single-dose vaccines) and 1-dose vaccines (e.g. Cansino) delivered between 0000 and 2359 on date.
        //daily_booster Booster/third doses delivered between 0000 and 2359 on date.
        //daily = daily_partial + daily_full + daily_booster
        //cumul_partial = sum of daily_partial + cansino for all T <= date, i.e. number of people with at least 1 dose
        //cumul_full = sum of daily_full for all T <= date, i.e. number of people who have completed their vaccination regimen
        //cumul_booster sum of daily_booster for all T <= date, i.e. number of people who have received a booster
        //cumul_partial_child = number of children (< 18yo) who have received their 1st dose (thus far, only Pfizer is used)
        //cumul_full_child = number of children (< 18yo) who have received their 2nd dose (thus far, only Pfizer is used)
        //cumul = cumul_partial + cumul_full + cumul_booster - cumulative cansino doses to date, i.e. total doses administerd
        //x1and x2 = 1st and 2nd doses of double-dose vaccine type x delivered between 0000 and 2359 on date, where x can be pfizer, sinovac or astra
        //x = doses of single-dose vaccine type x delivered between 0000 and 2359 on date, where x can be cansino
        //pending = doses delivered that are 'quarantined' in the Vaccine Management System due to errors and/or inconsistencies in vaccine bar code, batch number, et cetera; these problems are usually resolved soon and affect ~0.1% of all records on a rolling basis. pending records for dates far in the past are not unresolved errors, but rather reflect backdated manual uploads.
        //Methodological choices
        //The variable cumul shows the number of unique doses which have been administered. However, people are also interested in tracking the number of unique individuals who have been vaccinated - this is captured by the variable cumul_partial, which compromises people who received 1 dose of a double-dose vaccine, and those who received a single-dose vaccine. cumul_full is a perfect subset of cumul_partial - individuals who received a single-dose vaccine are also included here. This is why cumul does not equal cumul_partial + cumul_full - the number of single-dose vaccines administered must be deducted.
        //With substantial outreach efforts in areas with poor internet access, vaccinations (which are normally tracked in real time) have to be documented offline (think Excel sheets and paper forms). Given that outreach programs may last days at a time, records of these vaccinations may only be uploaded and consolidated a few days after the day on which they occured. Consequently, we may revise the dataset from time to time if more data is reported for dates already contained within the datasets. These revisions will typically cause vaccination counts to increase, though minor decreases may be observed if there are corrections to dosage dates after they are recorded and published under another day's data. Thus far, revsisions have been made on:
        return $infolist
            ->schema([
                TextEntry::make('date')->date(),
                TextEntry::make('state')->badge(),

                TextEntry::make('daily')
                    ->label('Total daily doses')
                    ->numeric(),

                TextEntry::make('cumul')
                    ->label('Total cumulative doses')
                    ->numeric(),

                Section::make('Daily Vaccination')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(4)
                    ->schema([
                        TextEntry::make('daily_partial')
                            ->label('1st doses')
                            ->numeric(),
                        TextEntry::make('daily_full')
                            ->label('2nd doses')
                            ->numeric(),
                        TextEntry::make('daily_partial_adol')
                            ->label('1st doses (adolescent)')
                            ->numeric(),
                        TextEntry::make('daily_full_adol')
                            ->label('2nd doses (adolescent)')
                            ->numeric(),
                        TextEntry::make('daily_partial_child')
                            ->label('1st doses (child)')
                            ->numeric(),
                        TextEntry::make('daily_full_child')
                            ->label('2nd doses (child)')
                            ->numeric(),
                        TextEntry::make('daily_booster')
                            ->label('Booster doses')
                            ->numeric(),

                        TextEntry::make('daily_booster2')
                            ->label('Total 2nd Booster')
                            ->numeric(),
                    ]),

                Section::make('Cumulative Vaccination')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(4)
                    ->schema([
                        TextEntry::make('cumul_partial')
                            ->label('1st doses')
                            ->numeric(),
                        TextEntry::make('cumul_full')
                            ->label('2nd doses')
                            ->numeric(),
                        TextEntry::make('cumul_partial_adol')
                            ->label('1st doses (adolescent)')
                            ->numeric(),
                        TextEntry::make('cumul_full_adol')
                            ->label('2nd doses (adolescent)')
                            ->numeric(),
                        TextEntry::make('cumul_partial_child')
                            ->label('1st doses (child)')
                            ->numeric(),
                        TextEntry::make('cumul_full_child')
                            ->label('2nd doses (child)')
                            ->numeric(),
                        TextEntry::make('cumul_booster')
                            ->label('Booster doses')
                            ->numeric(),
                        TextEntry::make('cumul_booster2')
                            ->label('Cumulative 2nd Booster')
                            ->numeric(),
                    ]),
                Section::make('1st Booster')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('daily_booster2_adol')
                            ->label('Adolescent')
                            ->numeric(),
                        TextEntry::make('daily_booster2_child')
                            ->label('Child')
                            ->numeric(),

                        TextEntry::make('cumul_booster2_adol')
                            ->label('Cumulative Adolescent')
                            ->numeric(),
                        TextEntry::make('cumul_booster2_child')
                            ->label('Cumulative Child')
                            ->numeric(),
                    ]),

                Section::make('2nd Booster')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('daily_booster_adol')
                            ->label('Booster (adolescent)')
                            ->numeric(),
                        TextEntry::make('daily_booster_child')
                            ->label('Booster (child)')
                            ->numeric(),
                        TextEntry::make('cumul_booster_adol')
                            ->label('Cumulative Booster (adolescent)')
                            ->numeric(),
                        TextEntry::make('cumul_booster_child')
                            ->label('Cumulative Booster (child)')
                            ->numeric(),
                    ]),

                Section::make('Pfizer')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(4)
                    ->schema([
                        TextEntry::make('pfizer1')
                            ->label('1st doses')
                            ->numeric(),
                        TextEntry::make('pfizer2')
                            ->label('2nd doses')
                            ->numeric(),
                        TextEntry::make('pfizer3')
                            ->label('1st Booster')
                            ->numeric(),
                        TextEntry::make('pfizer4')
                            ->label('2nd Booster')
                            ->numeric(),
                    ]),

                Section::make('Sinovac')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(4)
                    ->schema([
                        TextEntry::make('sinovac1')
                            ->label('1st doses')
                            ->numeric(),
                        TextEntry::make('sinovac2')
                            ->label('2nd doses')
                            ->numeric(),
                        TextEntry::make('sinovac3')
                            ->label('1st Booster')
                            ->numeric(),
                        TextEntry::make('sinovac4')
                            ->label('2nd Booster')
                            ->numeric(),
                    ]),

                Section::make('AstraZeneca')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(4)
                    ->schema([
                        TextEntry::make('astra1')
                            ->label('1st doses')
                            ->numeric(),
                        TextEntry::make('astra2')
                            ->label('2nd doses')
                            ->numeric(),
                        TextEntry::make('astra3')
                            ->label('1st Booster')
                            ->numeric(),
                        TextEntry::make('astra4')
                            ->label('2nd Booster')
                            ->numeric(),
                    ]),

                Section::make('Sinopharm')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(4)
                    ->schema([
                        TextEntry::make('sinopharm1')
                            ->label('1st doses')
                            ->numeric(),
                        TextEntry::make('sinopharm2')
                            ->label('2nd doses')
                            ->numeric(),
                        TextEntry::make('sinopharm3')
                            ->label('1st Booster')
                            ->numeric(),
                        TextEntry::make('sinopharm4')
                            ->label('2nd Booster')
                            ->numeric(),
                    ]),

                Section::make('Cansino')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(4)
                    ->schema([
                        TextEntry::make('cansino')
                            ->label('1st doses')
                            ->numeric(),
                        TextEntry::make('cansino3')
                            ->label('1st Booster')
                            ->numeric(),
                        TextEntry::make('cansino4')
                            ->label('2nd Booster')
                            ->numeric(),
                    ]),

                //                Section::make('Pending')
                //                    ->compact()
                //            ->collapsible()
                //            ->collapsed()
                //                    ->columns(4)
                //                    ->schema([
                //                        TextEntry::make('pending1')->numeric(),
                //                        TextEntry::make('pending2')->numeric(),
                //                        TextEntry::make('pending3')->numeric(),
                //                        TextEntry::make('pending4')->numeric(),
                //                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('daily_partial')
                    ->label('1st doses')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('daily_full')
                    ->label('2nd doses')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('daily')
                    ->label('Total daily doses')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('daily_partial_adol')
                    ->label('1st doses (adolescent)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('daily_full_adol')
                    ->label('2nd doses (adolescent)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('daily_partial_child')
                    ->label('1st doses (child)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('daily_full_child')
                    ->label('2nd doses (child)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('daily_booster')
                    ->label('Booster doses')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cumul_partial')
                    ->label('1st doses')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cumul_full')
                    ->label('2nd doses')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cumul')
                    ->label('Total cumulative doses')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cumul_partial_adol')
                    ->label('1st doses (adolescent)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cumul_full_adol')
                    ->label('2nd doses (adolescent)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cumul_partial_child')
                    ->label('1st doses (child)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cumul_full_child')
                    ->label('2nd doses (child)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cumul_booster')
                    ->label('Booster doses')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('pfizer1')
                    ->label('1st Pfizer')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('pfizer2')
                    ->label('2nd Pfizer')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('pfizer3')
                    ->label('1st Pfizer Booster')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('pfizer4')
                    ->label('2nd Pfizer Booster')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('sinovac1')
                    ->label('1st Sinovac')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('sinovac2')
                    ->label('2nd Sinovac')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('sinovac3')
                    ->label('1st Sinovac Booster')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('sinovac4')
                    ->label('2nd Sinovac Booster')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('astra1')
                    ->label('1st AstraZeneca')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('astra2')
                    ->label('2nd AstraZeneca')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('astra3')
                    ->label('1st AstraZeneca Booster')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('astra4')
                    ->label('2nd AstraZeneca Booster')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('sinopharm1')
                    ->label('1st Sinopharm')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('sinopharm2')
                    ->label('2nd Sinopharm')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('sinopharm3')
                    ->label('1st Sinopharm Booster')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cansino')
                    ->label('1st Cansino')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cansino3')
                    ->label('1st Cansino Booster')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('daily_booster2')
                    ->label('Total 2nd Booster')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('daily_booster_adol')
                    ->label('Daily 1st Booster (adolescent)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('daily_booster2_adol')
                    ->label('Daily 2nd Booster (adolescent)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('daily_booster_child')
                    ->label('Daily 1st Booster (child)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('daily_booster2_child')
                    ->label('Daily 2nd Booster (child)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cumul_booster2')
                    ->label('Cumulative 2nd Booster')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cumul_booster_adol')
                    ->label('Cumulative Booster (adolescent)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cumul_booster2_adol')
                    ->label('Cumulative 2nd Booster (adolescent)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cumul_booster_child')
                    ->label('Cumulative Booster (child)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('cumul_booster2_child')
                    ->label('Cumulative 2nd Booster (child)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ManageVaxStates::route('/'),
        ];
    }
}
