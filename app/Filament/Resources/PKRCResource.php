<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PKRCResource\Pages;
use App\Models\DeathsState;
use App\Models\PKRC;
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

class PKRCResource extends Resource
{
    protected static ?string $model = PKRC::class;

    protected static ?string $label = 'Quarantine & Treatment Centre';

    protected static ?string $pluralLabel = 'Quarantine & Treatment Centre';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Medical Facilities';

    public static function infolist(Infolist $infolist): Infolist
    {
        //date: yyyy-mm-dd format; data correct as of 2359hrs on that date
        //state: name of state; note that (unlike with other datasets), it is not necessary that there be an observation for every state on every date. for instance, there are no PKRCs in W.P. Kuala Lumpur and W.P Putrajaya.
        //beds: total PKRC beds (with related medical infrastructure)
        //admitted_x: number of individuals in category x admitted to PKRCs, where x can be suspected/probable, COVID-19 positive, or non-COVID
        //discharged_x: number of individuals in category x discharged from PKRCs
        //pkrc_x: total number of individuals in category x in PKRCs; this is a stock variable altered by flows from admissions and discharges
        return $infolist
            ->schema([
                TextEntry::make('date')->badge()->date(),
                TextEntry::make('state')->badge(),
                TextEntry::make('beds')
                    ->label('Total beds')
                    ->helperText('With related medical infrastructure')
                    ->numeric(),

                Section::make('Admitted')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('admitted_pui')
                            ->tooltip('Number of individuals under investigation admitted to PKRC')
                            ->numeric(),
                        TextEntry::make('admitted_covid')
                            ->tooltip('Number of individuals COVID-19 positive admitted to PKRC')
                            ->numeric(),
                        TextEntry::make('admitted_total')
                            ->tooltip('Total number of individuals admitted to PKRC')
                            ->numeric(),
                    ]),

                Section::make('Discharged')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('discharge_pui')
                            ->tooltip('Number of individuals under investigation discharged from PKRC')
                            ->numeric(),
                        TextEntry::make('discharge_covid')
                            ->tooltip('Number of individuals COVID-19 positive discharged from PKRC')
                            ->numeric(),
                        TextEntry::make('discharge_total')
                            ->tooltip('Total number of individuals discharged from PKRC')
                            ->numeric(),
                    ]),

                Section::make('Individuals in PKRC')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('pkrc_covid')
                            ->tooltip('Total number of individuals COVID-19 positive in PKRC')
                            ->numeric(),
                        TextEntry::make('pkrc_pui')
                            ->tooltip('Total number of individuals under investigation in PKRC')
                            ->numeric(),
                        TextEntry::make('pkrc_noncovid')
                            ->tooltip('Total number of individuals non-COVID in PKRC')
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
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('admitted_pui')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('admitted_covid')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('admitted_total')
                    ->toggleable()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discharge_pui')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discharge_covid')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discharge_total')
                    ->toggleable()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pkrc_covid')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pkrc_pui')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pkrc_noncovid')
                    ->toggleable()
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('state')
                    ->options(DeathsState::STATE)
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
            'index' => Pages\ManagePKRCS::route('/'),
        ];
    }
}
