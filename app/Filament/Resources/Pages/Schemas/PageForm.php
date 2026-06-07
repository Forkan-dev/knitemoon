<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Page Details')
                    ->description('Basic information used to identify and display this page.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g. Home, About Us')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, $set) {
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->prefix('/')
                            ->placeholder('auto-generated-from-name')
                            ->helperText('URL segment — auto-filled from name, editable.'),

                        Select::make('status')
                            ->options([
                                'active'   => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->required()
                            ->default('active')
                            ->native(false),

                        TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->suffix('↑↓')
                            ->helperText('Lower = appears earlier in navigation.'),
                    ]),

                Section::make('SEO & Open Graph')
                    ->description('Metadata sent to search engines and social platforms.')
                    ->collapsed()
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('SEO Title')
                            ->maxLength(255)
                            ->placeholder('Page title shown in browser tab and Google')
                            ->columnSpanFull(),

                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3)
                            ->maxLength(160)
                            ->placeholder('Short summary for search engine results (max 160 chars)')
                            ->helperText('Keep under 160 characters.'),

                        TextInput::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->maxLength(255)
                            ->placeholder('keyword1, keyword2, keyword3'),

                        FileUpload::make('og_image')
                            ->label('Open Graph Image')
                            ->image()
                            ->disk('public')
                            ->imagePreviewHeight('120')
                            ->helperText('Recommended 1200×630 px — used when page is shared on social media.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
