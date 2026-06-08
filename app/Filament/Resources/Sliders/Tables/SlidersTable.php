<?php

namespace App\Filament\Resources\Sliders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SlidersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),

                TextColumn::make('identifier')
                    ->prefix('#')
                    ->color('gray'),

                TextColumn::make('effect')
                    ->badge()
                    ->color('info'),

                IconColumn::make('autoplay')
                    ->boolean()
                    ->label('Auto'),

                TextColumn::make('autoplay_speed')
                    ->label('Speed')
                    ->suffix('ms')
                    ->color('gray')
                    ->toggleable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'active'   => 'success',
                        'inactive' => 'danger',
                        default    => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('items_count')
                    ->label('Slides')
                    ->counts('items')
                    ->badge()
                    ->color('warning'),

                TextColumn::make('pages_count')
                    ->label('Pages')
                    ->counts('pages')
                    ->badge()
                    ->color('info'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'active'   => 'Active',
                        'inactive' => 'Inactive',
                    ]),
                SelectFilter::make('effect')
                    ->options([
                        'slide' => 'Slide',
                        'fade'  => 'Fade',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
