<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero Slider')
                    ->schema([
                        TextEntry::make('slider.name')
                            ->label('Assigned slider')
                            ->badge()
                            ->color('info')
                            ->placeholder('No slider assigned'),
                    ]),

                Section::make('Page Details')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('slug')->prefix('/'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn ($state) => match ($state) {
                                'active'   => 'success',
                                'inactive' => 'danger',
                                default    => 'gray',
                            }),
                        TextEntry::make('order'),
                        TextEntry::make('created_at')->dateTime(),
                        TextEntry::make('updated_at')->dateTime(),
                    ]),

                Section::make('SEO & Open Graph')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('title')->label('SEO Title')->columnSpanFull(),
                        TextEntry::make('meta_description')->label('Meta Description'),
                        TextEntry::make('meta_keywords')->label('Meta Keywords'),
                        TextEntry::make('og_image')->label('OG Image')->columnSpanFull(),
                    ]),
            ]);
    }
}
