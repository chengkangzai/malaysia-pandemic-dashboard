<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VaxRegStateResource\Pages;
use App\Models\VaxRegState;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VaxRegStateResource extends Resource
{
    protected static ?string $model = VaxRegState::class;
    protected static ?string $label = 'State';

    protected static ?string $navigationGroup = 'Vaccination Registration';
    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    public static function form(Form $form): Form
    {
        //        date: yyyy-mm-dd format; data correct as of 2359hrs on that date
        //state: Name of state (for the Malaysia file, state = Malaysia)
        //total: Number of unique registrants, with de-duplication done based on ID
        //phase2: Number of unique individuals eligible for Phase 2, i.e. individuals who are at least 1 of elderly, comorb, oku (note: not the sum of the 3)
        //mysj: Number of individuals registered via MySejahtera
        //call: Number of individuals registered via the call centre, who do not have an existing registration via MySejahtera
        //web: Number of individuals registered via the website (including on-behalf-of registrations done during outreach) who do not have an existing registration via MySejahtera or the call centre
        //children: Number of individuals below 18yo
        //elderly: Number of individuals aged 60yo and above
        //comorb: Number of individuals self-declaring at least 1 comorbidity
        //oku: Number of individuals self-declaring as OKU
        return $form
            ->schema([
                TextEntry::make('date')->date(),
                TextEntry::make('state'),
                TextEntry::make('total')->numeric(),
                TextEntry::make('phase2')
                    ->label('Eligible for Phase 2')
                    ->numeric(),

                Section::make('Registration Methods')
                    ->schema([
                        TextEntry::make('call')->numeric(),
                        TextEntry::make('mysj')
                            ->label('MySejahtera')
                            ->numeric(),
                        TextEntry::make('web')->numeric(),
                    ]),

                Section::make('Eligibility')
                    ->schema([
                        TextEntry::make('children')->numeric(),
                        TextEntry::make('elderly')->numeric(),
                        TextEntry::make('comorb')
                            ->label('Comorbidities')
                            ->numeric(),
                        TextEntry::make('oku')->numeric(),
                        TextEntry::make('children_solo')
                            ->label('Children without parents')
                            ->numeric(),
                        TextEntry::make('adolescents')->numeric(),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('date', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->toggleable()
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('state')
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->toggleable()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phase2')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mysj')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('call')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('web')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('children')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('elderly')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('comorb')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('oku')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('children_solo')
                    ->label('Children without parents')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('adolescents')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageVaxRegStates::route('/'),
        ];
    }
}
