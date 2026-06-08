<?php

namespace App\Filament\Resources\Sliders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── Slider Settings ──────────────────────────────────────────
                Section::make('Slider Settings')
                    ->icon('heroicon-o-photo')
                    ->iconColor('primary')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-m-tag')
                            ->placeholder('e.g. Home Hero Slider')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Display name for this slider in the CMS')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, $set) => $set('identifier', Str::slug($state)))
                            ->validationMessages([
                                'required' => 'Slider name is required.',
                                'max'      => 'Name cannot exceed :max characters.',
                            ]),

                        TextInput::make('identifier')
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->prefix('#')
                            ->placeholder('auto-generated-from-name')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Used in Blade templates to target this specific slider')
                            ->validationMessages([
                                'unique' => 'This identifier is already in use.',
                                'max'    => 'Identifier cannot exceed :max characters.',
                            ]),

                        Select::make('effect')
                            ->options([
                                'slide' => 'Slide',
                                'fade'  => 'Fade',
                            ])
                            ->default('slide')
                            ->required()
                            ->native(false)
                            ->prefixIcon('heroicon-m-sparkles')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Transition animation between slides'),

                        Select::make('status')
                            ->options([
                                'active'   => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->default('active')
                            ->required()
                            ->native(false)
                            ->prefixIcon('heroicon-m-eye'),
                    ]),

                // ── Autoplay ─────────────────────────────────────────────────
                Section::make('Autoplay')
                    ->icon('heroicon-o-play-circle')
                    ->iconColor('info')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Toggle::make('autoplay')
                            ->label('Enable autoplay')
                            ->default(true)
                            ->live()
                            ->inline(false)
                            ->onColor('success')
                            ->offColor('danger')
                            ->onIcon('heroicon-m-play')
                            ->offIcon('heroicon-m-pause'),

                        TextInput::make('autoplay_speed')
                            ->label('Speed')
                            ->numeric()
                            ->default(5000)
                            ->prefixIcon('heroicon-m-clock')
                            ->suffix('ms')
                            ->hintIcon('heroicon-m-information-circle', tooltip: 'Time each slide is shown in milliseconds (e.g. 5000 = 5 seconds)')
                            ->visible(fn ($get) => $get('autoplay')),
                    ]),

            ]);
    }
}
