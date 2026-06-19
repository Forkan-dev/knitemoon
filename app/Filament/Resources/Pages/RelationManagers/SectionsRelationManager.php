<?php

namespace App\Filament\Resources\Pages\RelationManagers;

use Filament\Actions\AttachAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SectionsRelationManager extends RelationManager
{
    protected static string $relationship = 'sections';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $title = 'Sections';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Section Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g. Hero, Features'),

                        TextInput::make('identifier')
                            ->maxLength(255)
                            ->placeholder('e.g. hero, features')
                            ->helperText('Used as the HTML id attribute on the page.'),

                        Textarea::make('description')
                            ->rows(2)
                            ->placeholder('Short description shown under the section heading.')
                            ->columnSpanFull(),

                        TextInput::make('background_color')
                            ->maxLength(50)
                            ->placeholder('#ffffff or bg-gray-50'),

                        TextInput::make('css_class')
                            ->maxLength(255)
                            ->placeholder('extra-class another-class'),

                        Select::make('status')
                            ->options([
                                'active'   => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->default('active')
                            ->required()
                            ->native(false),
                    ]),

                Section::make('Page Placement')
                    ->description('Controls where this section appears on the current page.')
                    ->schema([
                        TextInput::make('order')
                            ->label('Order on this page')
                            ->numeric()
                            ->default(0)
                            ->suffix('↑↓')
                            ->helperText('Lower numbers render first. This is stored on the page–section link, not on the section itself.'),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')
                    ->label('#')
                    ->getStateUsing(fn ($record) => $record->pivot->order)
                    ->sortable()
                    ->width('60px'),

                TextColumn::make('name')
                    ->searchable()
                    ->weight('semibold'),

                TextColumn::make('identifier')
                    ->color('gray')
                    ->prefix('#'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'active'   => 'success',
                        'inactive' => 'danger',
                        default    => 'gray',
                    }),

                TextColumn::make('posts_count')
                    ->label('Posts')
                    ->counts('posts')
                    ->badge()
                    ->color('info'),
            ])
            ->defaultSort('pivot_order')
            ->reorderable('pivot_order')
            ->recordActions([
                EditAction::make(),
                DetachAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                AttachAction::make()
                    ->preloadRecordSelect()
                    ->schema(fn (AttachAction $action) => [
                        $action->getRecordSelect()
                            ->label('Select existing section')
                            ->searchable()
                            ->preload(),
                        TextInput::make('order')
                            ->label('Order on this page')
                            ->numeric()
                            ->default(0)
                            ->suffix('↑↓')
                            ->helperText('Lower numbers render first.'),
                    ]),
                CreateAction::make()
                    ->label('Create & attach new'),
                DetachBulkAction::make(),
            ]);
    }
}
