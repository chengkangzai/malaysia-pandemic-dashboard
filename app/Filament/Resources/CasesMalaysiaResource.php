<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CasesMalaysiaResource\Pages;
use App\Models\CasesMalaysia;
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

class CasesMalaysiaResource extends Resource
{
    protected static ?string $model = CasesMalaysia::class;

    protected static ?string $label = 'National Cases';

    protected static ?string $navigationIcon = 'heroicon-o-bug-ant';

    protected static ?string $navigationGroup = 'Covid-19 Cases';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(3)
            ->schema([
                TextEntry::make('date')->badge()->date(),

                TextEntry::make('cases_new')
                    ->label('New Cases')
                    ->numeric(),
                TextEntry::make('cases_cumulative')
                    ->label('Cumulative Cases')
                    ->numeric(),
                TextEntry::make('cases_recovered')
                    ->label('Recovered (New)')
                    ->numeric(),
                TextEntry::make('cases_recovered_cumulative')
                    ->label('Cumulative Recovered')
                    ->numeric(),
                TextEntry::make('cases_active')
                    ->label('Active Cases')
                    ->numeric(),
                TextEntry::make('cases_cluster')
                    ->label('Cluster Cases')
                    ->numeric(),
                TextEntry::make('cases_import')
                    ->label('Imported Cases')
                    ->numeric(),

                Section::make('Vaccination Status')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(3)
                    ->schema([
                        TextEntry::make('cases_unvax')
                            ->label('Unvaccinated')
                            ->numeric(),
                        TextEntry::make('cases_pvax')
                            ->label('Partially Vaccinated')
                            ->numeric(),
                        TextEntry::make('cases_fvax')
                            ->label('Fully Vaccinated')
                            ->numeric(),
                        TextEntry::make('cases_boost')
                            ->label('Booster Dose')
                            ->numeric(),
                    ]),

                Section::make('Age Group')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(3)
                    ->schema([
                        TextEntry::make('cases_child')
                            ->label('Children')
                            ->numeric(),
                        TextEntry::make('cases_adolescent')
                            ->label('Adolescents')
                            ->numeric(),
                        TextEntry::make('cases_adult')
                            ->label('Adults')
                            ->numeric(),
                        TextEntry::make('cases_elderly')
                            ->label('Elderly')
                            ->numeric(),
                    ]),

                Section::make('Age Range')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(3)
                    ->schema([
                        TextEntry::make('cases_0_4')
                            ->label('0-4 Years Old')
                            ->numeric(),
                        TextEntry::make('cases_5_11')
                            ->label('5-11 Years Old')
                            ->numeric(),
                        TextEntry::make('cases_12_17')
                            ->label('12-17 Years Old')
                            ->numeric(),
                        TextEntry::make('cases_18_29')
                            ->label('18-29 Years Old')
                            ->numeric(),
                        TextEntry::make('cases_30_59')
                            ->label('30-59 Years Old')
                            ->numeric(),
                        TextEntry::make('cases_60_69')
                            ->label('60-69 Years Old')
                            ->numeric(),
                        TextEntry::make('cases_70_79')
                            ->label('70-79 Years Old')
                            ->numeric(),
                        TextEntry::make('cases_80')
                            ->label('80 Years Old and Above')
                            ->numeric(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('date', 'desc')
            ->columnToggleFormColumns(2)
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_new')
                    ->label('Cases (New)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_cumulative')
                    ->label('Cases (Cumulative)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_recovered')
                    ->label('Recovered (New)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_recovered_cumulative')
                    ->label('Recovered (Cumulative)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_active')
                    ->label('Active Cases')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_import')
                    ->label('Imported Cases')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_cluster')
                    ->label('Cluster Cases')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_unvax')
                    ->label('Unvaccinated Cases')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_pvax')
                    ->label('Partially Vaccinated Cases')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_fvax')
                    ->label('Fully Vaccinated Cases')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_boost')
                    ->label('Booster Dose Cases')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_child')
                    ->label('Children')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_adolescent')
                    ->label('Adolescents')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_adult')
                    ->label('Adults')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_elderly')
                    ->label('Elderly')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_0_4')
                    ->label('0-4 Years Old')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_5_11')
                    ->label('5-11 Years Old')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_12_17')
                    ->label('12-17 Years Old')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_18_29')
                    ->label('18-29 Years Old')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_30_59')
                    ->label('30-59 Years Old')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_60_69')
                    ->label('60-69 Years Old')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_70_79')
                    ->label('70-79 Years Old')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_80')
                    ->label('80 Years Old and Above')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_import')
                    ->label('Imported Cluster')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_religious')
                    ->label('Religious Cluster')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_community')
                    ->label('Community Cluster')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_highRisk')
                    ->label('High Risk Group Cluster')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_education')
                    ->label('Education Cluster')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_detentionCentre')
                    ->label('Detention Centre Cluster')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_workplace')
                    ->label('Workplace Cluster')
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
                    ->query(fn (Builder $query, array $data): Builder => $query
                        ->when($data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                        )
                        ->when($data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
                        )),

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
                        )
                    ),
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
            'index' => Pages\ManageCasesMalaysias::route('/'),
        ];
    }
}
