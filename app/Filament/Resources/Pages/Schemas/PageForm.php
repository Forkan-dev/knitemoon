<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Models\Slider;
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

                // ── Hero Slider ──────────────────────────────────────────────
                Section::make('Hero Slider')
                    ->icon('heroicon-o-photo')
                    ->iconColor('warning')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('slider_id')
                            ->label('Assigned Slider')
                            ->options(
                                Slider::where('status', 'active')
                                    ->orderBy('name')
                                    ->pluck('name', 'id')
                            )
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->native(false)
                            ->prefixIcon('heroicon-m-film')
                            ->placeholder('No slider — page starts with sections')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Hero carousel displayed at the top of this page before content sections'),
                    ]),

                // ── Page Details ─────────────────────────────────────────────
                Section::make('Page Details')
                    ->icon('heroicon-o-document-text')
                    ->iconColor('primary')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-m-tag')
                            ->placeholder('e.g. Home, About Us')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Display name shown in menus and headings')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state)))
                            ->validationMessages([
                                'required' => 'Page name is required.',
                                'max'      => 'Name cannot exceed :max characters.',
                            ]),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->prefix('/')
                            ->placeholder('auto-generated-from-name')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'URL path — auto-filled from name, editable')
                            ->validationMessages([
                                'required' => 'Slug is required.',
                                'unique'   => 'This slug is already in use.',
                                'max'      => 'Slug cannot exceed :max characters.',
                            ]),

                        Select::make('status')
                            ->options([
                                'active'   => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->required()
                            ->default('active')
                            ->native(false)
                            ->prefixIcon('heroicon-m-eye'),

                        TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->prefixIcon('heroicon-m-bars-3-bottom-right')
                            ->suffix('↑↓')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Lower number appears earlier in navigation'),
                    ]),

                // ── SEO & Open Graph ─────────────────────────────────────────
                Section::make('SEO & Open Graph')
                    ->icon('heroicon-o-magnifying-glass')
                    ->iconColor('info')
                    ->columnSpanFull()
                    ->collapsed()
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('SEO Title')
                            ->maxLength(255)
                            ->prefixIcon('heroicon-m-window')
                            ->placeholder('Browser tab and Google title')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Shown in the browser tab and search engine results')
                            ->columnSpanFull(),

                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3)
                            ->maxLength(160)
                            ->live()
                            ->placeholder('Brief summary for search engine results')
                            ->hint(fn ($state) => strlen($state ?? '') . ' / 160')
                            ->hintColor(fn ($state) => match (true) {
                                strlen($state ?? '') > 160 => 'danger',
                                strlen($state ?? '') > 140 => 'warning',
                                default                    => 'gray',
                            })
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Recommended max 160 characters for best display in search results')
                            ->validationMessages([
                                'max' => 'Meta description cannot exceed 160 characters.',
                            ]),

                        TextInput::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->maxLength(255)
                            ->prefixIcon('heroicon-m-hashtag')
                            ->placeholder('keyword1, keyword2, keyword3')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Comma-separated keywords for legacy SEO support'),

                        FileUpload::make('og_image')
                            ->label('Open Graph Image')
                            ->image()
                            ->disk('public')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(5120)
                            ->imagePreviewHeight('120')
                            ->panelLayout('integrated')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Recommended 1200×630 px — shown when this page is shared on social media')
                            ->columnSpanFull(),
                    ]),

            ]);
    }
}
