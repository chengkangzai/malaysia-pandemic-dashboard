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
                TextEntry::make('cases_new')->numeric(),
                TextEntry::make('cases_cumulative')->numeric(),
                TextEntry::make('cases_recovered_cumulative')->numeric(),
                TextEntry::make('cases_recovered')->numeric(),
                TextEntry::make('cases_active')->numeric(),
                TextEntry::make('cases_cluster')->numeric(),

                Section::make('Vaccination Status')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(3)
                    ->schema([
                        TextEntry::make('cases_unvax')->numeric(),
                        TextEntry::make('cases_pvax')->numeric(),
                        TextEntry::make('cases_fvax')->numeric(),
                        TextEntry::make('cases_boost')->numeric(),
                    ]),

                Section::make('Age Group')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(3)
                    ->schema([
                        TextEntry::make('cases_child')->numeric(),
                        TextEntry::make('cases_adolescent')->numeric(),
                        TextEntry::make('cases_adult')->numeric(),
                        TextEntry::make('cases_elderly')->numeric(),
                    ]),

                Section::make('Age Range')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(3)
                    ->schema([
                        TextEntry::make('cases_0_4')->numeric(),
                        TextEntry::make('cases_5_11')->numeric(),
                        TextEntry::make('cases_12_17')->numeric(),
                        TextEntry::make('cases_18_29')->numeric(),
                        TextEntry::make('cases_30_59')->numeric(),
                        TextEntry::make('cases_60_69')->numeric(),
                        TextEntry::make('cases_70_79')->numeric(),
                        TextEntry::make('cases_80')->numeric(),
                    ]),

                Section::make('Cluster')
                    ->compact()
                    ->collapsible()
                    ->collapsed()
                    ->columns(3)
                    ->schema([
                        TextEntry::make('cases_import')->numeric(),
                        TextEntry::make('cluster_import')->numeric(),
                        TextEntry::make('cluster_religious')->numeric(),
                        TextEntry::make('cluster_community')->numeric(),
                        TextEntry::make('cluster_highRisk')->numeric(),
                        TextEntry::make('cluster_education')->numeric(),
                        TextEntry::make('cluster_detentionCentre')->numeric(),
                        TextEntry::make('cluster_workplace')->numeric(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_cluster')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_unvax')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_pvax')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_fvax')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_boost')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_child')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_adolescent')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_adult')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_elderly')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_0_4')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_5_11')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_12_17')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_18_29')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_30_59')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_60_69')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_70_79')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_80')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_import')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_religious')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_community')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_highRisk')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_education')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_detentionCentre')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cluster_workplace')
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->orderByDesc('date');
    }
}
