<?php

namespace App\Filament\Resources\Sections\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class SectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identity')
                    ->description('How this section is identified in the CMS and in the HTML output.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g. Hero Banner, Features, Team')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, $set, $get) {
                                if (blank($get('identifier'))) {
                                    $set('identifier', Str::slug($state));
                                }
                            }),

                        TextInput::make('identifier')
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->placeholder('auto-generated-from-name')
                            ->prefix('#')
                            ->helperText('Rendered as the HTML id on the section element.'),

                        Textarea::make('description')
                            ->rows(3)
                            ->placeholder('Short description shown as a subtitle under the section heading on the front end.')
                            ->columnSpanFull(),

                        Select::make('status')
                            ->options([
                                'active'   => 'Active',
                                'inactive' => 'Inactive (hidden from all pages)',
                            ])
                            ->required()
                            ->default('active')
                            ->native(false)
                            ->columnSpanFull(),
                    ]),

                Section::make('Appearance')
                    ->description('Optional styling applied directly to the section wrapper element.')
                    ->collapsed()
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        TextInput::make('background_color')
                            ->label('Background Color')
                            ->maxLength(50)
                            ->placeholder('#f9fafb')
                            ->helperText('Hex color or Tailwind class, e.g. bg-gray-50.'),

                        TextInput::make('css_class')
                            ->label('Extra CSS Classes')
                            ->maxLength(255)
                            ->placeholder('py-24 text-white')
                            ->helperText('Space-separated class names added to the section element.'),
                    ]),
            ]);
    }
}
