<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Section;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section as SchemaSection;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── Assignment ───────────────────────────────────────────────
                SchemaSection::make('Assignment')
                    ->icon('heroicon-o-folder-open')
                    ->iconColor('primary')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('section_id')
                            ->label('Section')
                            ->options(Section::orderBy('name')->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->required()
                            ->native(false)
                            ->prefixIcon('heroicon-m-view-columns')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'The section this post belongs to — sections are assigned to pages via the Pages resource')
                            ->validationMessages([
                                'required' => 'A section must be selected.',
                            ]),
                    ]),

                // ── Tabs ─────────────────────────────────────────────────────
                Tabs::make()
                    ->tabs([
                        Tab::make('Content')
                            ->icon('heroicon-o-document-text')
                            ->columns(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-m-pencil')
                                    ->placeholder('Post title')
                                    ->hintIcon('heroicon-m-information-circle', tooltip: 'The main heading of this post')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state)))
                                    ->validationMessages([
                                        'required' => 'Post title is required.',
                                        'max'      => 'Title cannot exceed :max characters.',
                                    ])
                                    ->columnSpanFull(),

                                TextInput::make('slug')
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255)
                                    ->prefix('/')
                                    ->placeholder('auto-generated-from-title')
                                    ->hintIcon('heroicon-m-information-circle', tooltip: 'URL identifier — auto-filled from title, editable')
                                    ->validationMessages([
                                        'unique' => 'This slug is already in use.',
                                        'max'    => 'Slug cannot exceed :max characters.',
                                    ]),

                                Select::make('type')
                                    ->options([
                                        'general'     => 'General',
                                        'team'        => 'Team Member',
                                        'product'     => 'Product',
                                        'service'     => 'Service',
                                        'feature'     => 'Feature',
                                        'testimonial' => 'Testimonial',
                                        'faq'         => 'FAQ',
                                        'article'     => 'Article',
                                        'stat'        => 'Statistic',
                                        'gallery'     => 'Gallery',
                                    ])
                                    ->default('general')
                                    ->required()
                                    ->native(false)
                                    ->prefixIcon('heroicon-m-squares-2x2')
                                    ->hintIcon('heroicon-m-information-circle', tooltip: 'Defines what this post represents — the frontend renders it accordingly'),

                                Select::make('status')
                                    ->options([
                                        'published' => 'Published',
                                        'draft'     => 'Draft',
                                    ])
                                    ->default('published')
                                    ->required()
                                    ->native(false)
                                    ->prefixIcon('heroicon-m-eye'),

                                Textarea::make('excerpt')
                                    ->rows(3)
                                    ->placeholder('Short summary shown in card previews')
                                    ->hintIcon('heroicon-m-information-circle', tooltip: 'Shown in card previews — if blank, the body is used instead')
                                    ->columnSpanFull(),

                                RichEditor::make('body')
                                    ->label('Body')
                                    ->toolbarButtons([
                                        'bold', 'italic', 'underline', 'strike',
                                        'link', 'orderedList', 'bulletList',
                                        'blockquote', 'h2', 'h3', 'redo', 'undo',
                                    ])
                                    ->columnSpanFull(),

                                DateTimePicker::make('published_at')
                                    ->label('Publish at')
                                    ->native(false)
                                    ->prefixIcon('heroicon-m-calendar')
                                    ->hintIcon('heroicon-m-information-circle', tooltip: 'Leave blank to publish immediately — set a future date to schedule')
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Media')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Featured Image')
                                    ->image()
                                    ->disk('public')
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->maxSize(5120)
                                    ->imagePreviewHeight('200')
                                    ->panelLayout('integrated')
                                    ->hintIcon('heroicon-m-information-circle', tooltip: 'Shown as the card thumbnail — if no image, the icon field is used instead'),

                                TextInput::make('icon')
                                    ->maxLength(100)
                                    ->prefixIcon('heroicon-m-star')
                                    ->placeholder('fa-star  or  ti ti-star')
                                    ->hintIcon('heroicon-m-information-circle', tooltip: 'Font Awesome or Tabler icon class — only shown when no image is set'),
                            ]),

                        Tab::make('Call to Action')
                            ->icon('heroicon-o-cursor-arrow-rays')
                            ->columns(2)
                            ->schema([
                                TextInput::make('button_text')
                                    ->label('Button Label')
                                    ->maxLength(100)
                                    ->prefixIcon('heroicon-m-cursor-arrow-rays')
                                    ->placeholder('Learn More'),

                                Select::make('button_target')
                                    ->label('Open in')
                                    ->options([
                                        '_self'  => 'Same tab',
                                        '_blank' => 'New tab',
                                    ])
                                    ->default('_self')
                                    ->native(false)
                                    ->prefixIcon('heroicon-m-arrow-top-right-on-square'),

                                TextInput::make('button_url')
                                    ->label('Button URL')
                                    ->url()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-m-link')
                                    ->placeholder('https://… or /relative-path')
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Meta')
                            ->icon('heroicon-o-tag')
                            ->columns(3)
                            ->schema([
                                TextInput::make('badge')
                                    ->maxLength(50)
                                    ->prefixIcon('heroicon-m-sparkles')
                                    ->placeholder('New, Popular')
                                    ->hintIcon('heroicon-m-information-circle', tooltip: 'Label shown on the card (e.g. New, Featured)'),

                                TextInput::make('tag')
                                    ->maxLength(50)
                                    ->prefixIcon('heroicon-m-hashtag')
                                    ->placeholder('group-name')
                                    ->hintIcon('heroicon-m-information-circle', tooltip: 'Used for grouping or filtering posts'),

                                TextInput::make('order')
                                    ->numeric()
                                    ->default(0)
                                    ->prefixIcon('heroicon-m-bars-3-bottom-right')
                                    ->suffix('↑↓')
                                    ->hintIcon('heroicon-m-information-circle', tooltip: 'Lower number appears first within the section'),
                            ]),
                    ])
                    ->columnSpanFull(),

            ]);
    }
}
