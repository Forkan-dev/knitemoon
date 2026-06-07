<?php

namespace App\Filament\Resources\Sections\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    protected static ?string $title = 'Posts';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
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
                                    ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state)))
                                    ->columnSpanFull(),

                                TextInput::make('slug')
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255)
                                    ->prefix('/')
                                    ->placeholder('auto-generated')
                                    ->helperText('Auto-filled from title.'),

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
                                    ->placeholder('Short summary for card previews.')
                                    ->columnSpanFull(),

                                RichEditor::make('body')
                                    ->toolbarButtons([
                                        'bold', 'italic', 'underline', 'strike',
                                        'link', 'orderedList', 'bulletList',
                                        'blockquote', 'h2', 'h3', 'redo', 'undo',
                                    ])
                                    ->columnSpanFull(),

                                DateTimePicker::make('published_at')
                                    ->label('Publish at')
                                    ->native(false)
                                    ->helperText('Leave blank to publish immediately.')
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Media')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Featured Image')
                                    ->image()
                                    ->disk('public')
                                    ->imagePreviewHeight('180'),

                                TextInput::make('icon')
                                    ->maxLength(100)
                                    ->placeholder('fa-star  or  ti ti-star')
                                    ->helperText('Used only when no image is set.'),
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
                                    ->placeholder('https://… or /path')
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Meta')
                            ->icon('heroicon-o-tag')
                            ->columns(3)
                            ->schema([
                                TextInput::make('badge')->maxLength(50)->placeholder('New, Popular'),
                                TextInput::make('tag')->maxLength(50)->placeholder('grouping tag'),
                                TextInput::make('order')->numeric()->default(0)->suffix('↑↓'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->disk('public')->circular()->toggleable(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold')
                    ->description(fn ($record) => $record->tag ? "#{$record->tag}" : null),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'published' => 'success',
                        'draft'     => 'warning',
                        default     => 'gray',
                    }),

                TextColumn::make('order')
                    ->label('#')
                    ->sortable()
                    ->width('60px'),

                TextColumn::make('published_at')
                    ->label('Published')
                    ->since()
                    ->placeholder('Immediately')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'published' => 'Published',
                        'draft'     => 'Draft',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                CreateAction::make(),
                DeleteBulkAction::make(),
            ]);
    }
}
