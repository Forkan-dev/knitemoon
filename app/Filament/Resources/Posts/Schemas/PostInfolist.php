<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Assignment & Status')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('section.name')->label('Section')->badge()->color('info'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn ($state) => match ($state) {
                                'published' => 'success',
                                'draft'     => 'warning',
                                default     => 'gray',
                            }),
                        TextEntry::make('published_at')->label('Published at')->dateTime()->placeholder('Immediately'),
                    ]),

                Section::make('Content')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('title')->weight('semibold')->columnSpanFull(),
                        TextEntry::make('slug')->prefix('/')->color('gray'),
                        TextEntry::make('excerpt')->columnSpanFull()->placeholder('No excerpt'),
                        TextEntry::make('body')->html()->columnSpanFull()->placeholder('No body content'),
                    ]),

                Section::make('Media')
                    ->columns(2)
                    ->schema([
                        ImageEntry::make('image')->disk('public')->height(160),
                        TextEntry::make('icon')->placeholder('No icon'),
                    ]),

                Section::make('Call to Action')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('button_text')->label('Label')->placeholder('—'),
                        TextEntry::make('button_url')->label('URL')->placeholder('—'),
                        TextEntry::make('button_target')->label('Target'),
                    ]),

                Section::make('Meta')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('badge')->placeholder('—'),
                        TextEntry::make('tag')->placeholder('—'),
                        TextEntry::make('order'),
                        TextEntry::make('created_at')->dateTime(),
                        TextEntry::make('updated_at')->dateTime(),
                    ]),
            ]);
    }
}
