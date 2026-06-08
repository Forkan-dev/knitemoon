<?php

namespace App\Filament\Resources\Sliders\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SliderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Slider Settings')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('name')->weight('semibold'),
                        TextEntry::make('identifier')->prefix('#')->color('gray'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn ($state) => match ($state) {
                                'active'   => 'success',
                                'inactive' => 'danger',
                                default    => 'gray',
                            }),
                        TextEntry::make('effect')->badge()->color('info'),
                        IconEntry::make('autoplay')
                            ->label('Autoplay')
                            ->boolean(),
                        TextEntry::make('autoplay_speed')
                            ->label('Speed')
                            ->suffix(' ms'),
                    ]),

                Section::make('Usage')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('items_count')
                            ->label('Total slides')
                            ->badge()
                            ->color('warning')
                            ->getStateUsing(fn ($record) => $record->items()->count()),
                        TextEntry::make('pages_count')
                            ->label('Assigned to pages')
                            ->badge()
                            ->color('info')
                            ->getStateUsing(fn ($record) => $record->pages()->count()),
                        TextEntry::make('created_at')->dateTime(),
                        TextEntry::make('updated_at')->dateTime(),
                    ]),
            ]);
    }
}
