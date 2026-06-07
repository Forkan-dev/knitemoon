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
                SchemaSection::make('Assignment')
                    ->description('Which section this post belongs to.')
                    ->schema([
                        Select::make('section_id')
                            ->label('Section')
                            ->options(Section::orderBy('name')->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->required()
                            ->native(false)
                            ->helperText('The section this post lives under. Sections are assigned to pages via the Pages resource.'),
                    ]),

                Tabs::make()
                    ->tabs([
                        Tab::make('Content')
                            ->icon('heroicon-o-document-text')
                            ->columns(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Post title')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function ($state, $set) {
                                        $set('slug', Str::slug($state));
                                    })
                                    ->columnSpanFull(),

                                TextInput::make('slug')
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255)
                                    ->prefix('/')
                                    ->placeholder('auto-generated-from-title')
                                    ->helperText('Auto-filled from title. Edit only if needed.'),

                                Select::make('status')
                                    ->options([
                                        'published' => 'Published',
                                        'draft'     => 'Draft',
                                    ])
                                    ->default('published')
                                    ->required()
                                    ->native(false),

                                Textarea::make('excerpt')
                                    ->rows(3)
                                    ->placeholder('Short summary shown in card previews. If blank, the body is used instead.')
                                    ->columnSpanFull(),

                                RichEditor::make('body')
                                    ->label('Body (Rich Text)')
                                    ->toolbarButtons([
                                        'bold', 'italic', 'underline', 'strike',
                                        'link', 'orderedList', 'bulletList',
                                        'blockquote', 'h2', 'h3', 'redo', 'undo',
                                    ])
                                    ->columnSpanFull(),

                                DateTimePicker::make('published_at')
                                    ->label('Publish at')
                                    ->native(false)
                                    ->helperText('Leave blank to publish immediately. Set a future date to schedule.')
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Media')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Featured Image')
                                    ->image()
                                    ->disk('public')
                                    ->imagePreviewHeight('200')
                                    ->helperText('Shown as the card thumbnail. If no image, the icon is used instead.'),

                                TextInput::make('icon')
                                    ->maxLength(100)
                                    ->placeholder('fa-star  or  ti ti-star')
                                    ->helperText('Font Awesome or Tabler icon class. Only used when no image is set.'),
                            ]),

                        Tab::make('Call to Action')
                            ->icon('heroicon-o-cursor-arrow-rays')
                            ->columns(2)
                            ->schema([
                                TextInput::make('button_text')
                                    ->label('Button Label')
                                    ->maxLength(100)
                                    ->placeholder('Learn More'),

                                Select::make('button_target')
                                    ->label('Open in')
                                    ->options([
                                        '_self'  => 'Same tab',
                                        '_blank' => 'New tab',
                                    ])
                                    ->default('_self')
                                    ->native(false),

                                TextInput::make('button_url')
                                    ->label('Button URL')
                                    ->url()
                                    ->maxLength(255)
                                    ->placeholder('https://… or /relative-path')
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Meta')
                            ->icon('heroicon-o-tag')
                            ->columns(3)
                            ->schema([
                                TextInput::make('badge')
                                    ->maxLength(50)
                                    ->placeholder('New, Popular, Featured'),

                                TextInput::make('tag')
                                    ->maxLength(50)
                                    ->placeholder('Used for grouping/filtering'),

                                TextInput::make('order')
                                    ->numeric()
                                    ->default(0)
                                    ->suffix('↑↓')
                                    ->helperText('Lower = shown first within section.'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
