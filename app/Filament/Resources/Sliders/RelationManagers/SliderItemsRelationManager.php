<?php

namespace App\Filament\Resources\Sliders\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SliderItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Slides';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Slide Image')
                    ->description('The background image is required for every slide.')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Background Image')
                            ->image()
                            ->disk('public')
                            ->imagePreviewHeight('200')
                            ->required()
                            ->helperText('Recommended 1920×700 px. Used as the full-width slide background.'),
                    ]),

                Section::make('Text Overlay')
                    ->description('Optional headline and sub-text shown on top of the image.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('heading')
                            ->maxLength(255)
                            ->placeholder('e.g. Premium Garment Manufacturing')
                            ->columnSpanFull(),

                        TextInput::make('subheading')
                            ->maxLength(255)
                            ->placeholder('e.g. Trusted by global brands for over 20 years')
                            ->columnSpanFull(),
                    ]),

                Section::make('Call to Action')
                    ->description('Optional button shown on the slide.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('button_text')
                            ->label('Button Label')
                            ->maxLength(100)
                            ->placeholder('Explore Products'),

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

                Section::make('Display')
                    ->columns(2)
                    ->schema([
                        TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->suffix('↑↓')
                            ->helperText('Lower numbers appear first.'),

                        Select::make('status')
                            ->options([
                                'active'   => 'Active (visible)',
                                'inactive' => 'Inactive (hidden)',
                            ])
                            ->default('active')
                            ->required()
                            ->native(false),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('public')
                    ->height(56)
                    ->extraImgAttributes(['class' => 'object-cover rounded']),

                TextColumn::make('heading')
                    ->searchable()
                    ->weight('semibold')
                    ->placeholder('No heading')
                    ->description(fn ($record) => $record->subheading),

                TextColumn::make('button_text')
                    ->label('CTA')
                    ->placeholder('—')
                    ->color('gray'),

                TextColumn::make('order')
                    ->label('#')
                    ->sortable()
                    ->width('60px'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'active'   => 'success',
                        'inactive' => 'danger',
                        default    => 'gray',
                    }),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'active'   => 'Active',
                        'inactive' => 'Inactive',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                CreateAction::make()->label('Add slide'),
                DeleteBulkAction::make(),
            ]);
    }
}
