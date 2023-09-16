<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClusterResource\Pages;
use App\Models\Cluster;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ClusterResource extends Resource
{
    protected static ?string $model = Cluster::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    protected static ?string $navigationGroup = 'Covid-19 Cluster';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(3)
            ->schema([
                TextEntry::make('cluster')->label('Cluster Name'),
                TextEntry::make('state')->badge()->separator(','),
                TextEntry::make('district')->badge()->separator(','),
                TextEntry::make('date_announced')->date(),
                TextEntry::make('date_last_onset')->date(),
                TextEntry::make('category'),
                TextEntry::make('status'),
                TextEntry::make('summary_bm')->columnSpanFull(),
                TextEntry::make('summary_en')->columnSpanFull(),
                Section::make('Cases')
                    ->schema([
                        TextEntry::make('cases_new')->numeric(),
                        TextEntry::make('cases_total')->numeric(),
                        TextEntry::make('cases_active')->numeric(),
                    ]),
                Section::make('Others')
                    ->schema([
                        TextEntry::make('tests')->numeric(),
                        TextEntry::make('icu')->numeric(),
                        TextEntry::make('deaths')->numeric(),
                        TextEntry::make('recovered')->numeric(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('date_announced', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('cluster')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_announced')
                    ->icon('heroicon-o-speaker-wave')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_last_onset')
                    ->icon('heroicon-o-eye')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->color('info')
                    ->badge()
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->icon(fn (string $state): string => match ($state) {
                        'ended' => 'heroicon-o-check-circle',
                        default => 'heroicon-o-exclamation-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'ended' => 'success',
                        default => 'danger',
                    })
                    ->tooltip(fn (string $state): string => match ($state) {
                        'ended' => 'Ended',
                        default => 'Active',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')->searchable()->badge()->separator(','),
                Tables\Columns\TextColumn::make('cases_new')
                    ->label('New Cases')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_total')
                    ->label('Total Cases')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cases_active')
                    ->label('Active Cases')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tests')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('icu')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deaths')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('recovered')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                Filter::make('date_announced')
                    ->label('Announced Date')
                    ->form([
                        DatePicker::make('announced_from'),
                        DatePicker::make('announced_until'),
                    ])
                    ->query(fn (Builder $query, array $data): Builder => $query
                        ->when($data['announced_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('date_announced', '>=', $date),
                        )
                        ->when($data['announced_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('date_announced', '<=', $date),
                        )),

                Filter::make('date_last_onset')
                    ->label('Last Onset Date')
                    ->form([
                        DatePicker::make('last_on_set_from'),
                        DatePicker::make('last_on_set_until'),
                    ])
                    ->query(fn (Builder $query, array $data): Builder => $query
                        ->when($data['last_on_set_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('date_last_onset', '>=', $date),
                        )
                        ->when($data['last_on_set_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('date_last_onset', '<=', $date),
                        )),

                Tables\Filters\SelectFilter::make('category')
                    ->label('Category')
                    ->attribute('category')
                    ->options(fn () => Cluster::distinct()->select('category')->pluck('category', 'category')),

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
            'index' => Pages\ManageClusters::route('/'),
        ];
    }
}
