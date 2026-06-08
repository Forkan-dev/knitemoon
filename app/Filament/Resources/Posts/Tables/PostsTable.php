<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(fn () => 'https://ui-avatars.com/api/?name=Post&background=6366f1&color=fff')
                    ->toggleable(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold')
                    ->description(fn ($record) => $record->excerpt ? \Illuminate\Support\Str::limit($record->excerpt, 60) : null),

                TextColumn::make('type')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'team'        => 'info',
                        'product'     => 'success',
                        'service'     => 'primary',
                        'feature'     => 'warning',
                        'testimonial' => 'info',
                        'faq'         => 'gray',
                        'article'     => 'primary',
                        'stat'        => 'success',
                        'gallery'     => 'warning',
                        default       => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'team'        => 'Team Member',
                        'product'     => 'Product',
                        'service'     => 'Service',
                        'feature'     => 'Feature',
                        'testimonial' => 'Testimonial',
                        'faq'         => 'FAQ',
                        'article'     => 'Article',
                        'stat'        => 'Statistic',
                        'gallery'     => 'Gallery',
                        default       => 'General',
                    })
                    ->sortable(),

                TextColumn::make('section.name')
                    ->label('Section')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'published' => 'success',
                        'draft'     => 'warning',
                        default     => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('tag')
                    ->badge()
                    ->color('gray')
                    ->toggleable(),

                TextColumn::make('order')
                    ->label('#')
                    ->sortable()
                    ->width('60px'),

                TextColumn::make('published_at')
                    ->label('Published')
                    ->since()
                    ->placeholder('Immediately')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'published' => 'Published',
                        'draft'     => 'Draft',
                    ]),

                SelectFilter::make('type')
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
                    ]),

                SelectFilter::make('section')
                    ->relationship('section', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
