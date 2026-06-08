<?php

namespace App\Filament\Resources\Sections\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class SectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── Identity ─────────────────────────────────────────────────
                Section::make('Identity')
                    ->icon('heroicon-o-view-columns')
                    ->iconColor('primary')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-m-tag')
                            ->placeholder('e.g. Hero Banner, Features, Team')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Display name for this section in the CMS')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, $set, $get) {
                                if (blank($get('identifier'))) {
                                    $set('identifier', Str::slug($state));
                                }
                            })
                            ->validationMessages([
                                'required' => 'Section name is required.',
                                'max'      => 'Name cannot exceed :max characters.',
                            ]),

                        TextInput::make('identifier')
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->prefix('#')
                            ->placeholder('auto-generated-from-name')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Rendered as the HTML id on the section element — leave blank to auto-fill')
                            ->validationMessages([
                                'unique' => 'This identifier is already in use.',
                                'max'    => 'Identifier cannot exceed :max characters.',
                            ]),

                        Textarea::make('description')
                            ->rows(2)
                            ->placeholder('Short subtitle shown under the section heading on the front end')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Optional subtitle displayed beneath the section heading in the rendered page')
                            ->columnSpanFull(),

                        Select::make('status')
                            ->options([
                                'active'   => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->required()
                            ->default('active')
                            ->native(false)
                            ->prefixIcon('heroicon-m-eye')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Inactive sections are hidden from all pages')
                            ->columnSpanFull(),
                    ]),

                // ── Appearance ───────────────────────────────────────────────
                Section::make('Appearance')
                    ->icon('heroicon-o-paint-brush')
                    ->iconColor('warning')
                    ->columnSpanFull()
                    ->collapsed()
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        TextInput::make('background_color')
                            ->label('Background Color')
                            ->maxLength(50)
                            ->prefixIcon('heroicon-m-swatch')
                            ->placeholder('#f9fafb')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Hex color or Tailwind class applied to the section wrapper (e.g. bg-gray-50)'),

                        TextInput::make('css_class')
                            ->label('Extra CSS Classes')
                            ->maxLength(255)
                            ->prefixIcon('heroicon-m-code-bracket')
                            ->placeholder('py-24 text-white')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Space-separated class names added to the section element'),
                    ]),

            ]);
    }
}
