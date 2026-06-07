<?php

namespace App\Filament\Resources\Sections\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SectionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identity')
                    ->columns(2)
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
                        TextEntry::make('description')->columnSpanFull(),
                    ]),

                Section::make('Appearance')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('background_color')->label('Background Color'),
                        TextEntry::make('css_class')->label('Extra CSS Classes'),
                    ]),

                Section::make('Usage')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('pages_count')
                            ->label('Pages using this section')
                            ->badge()
                            ->color('info')
                            ->getStateUsing(fn ($record) => $record->pages()->count()),
                        TextEntry::make('posts_count')
                            ->label('Total posts')
                            ->badge()
                            ->color('warning')
                            ->getStateUsing(fn ($record) => $record->posts()->count()),
                        TextEntry::make('created_at')->dateTime(),
                        TextEntry::make('updated_at')->dateTime(),
                    ]),
            ]);
    }
}
