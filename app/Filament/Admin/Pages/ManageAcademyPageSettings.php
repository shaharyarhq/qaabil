<?php

namespace App\Filament\Admin\Pages;

use App\Settings\AcademyPageSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;

class ManageAcademyPageSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::AcademicCap;

    protected static string $settings = AcademyPageSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->lazy()
                    ->persistTabInQueryString()
                    ->persistTab()
                    ->columnSpanFull()
                    ->contained(false)
                    ->tabs([
                        Tab::make('Hero Slider')
                            ->schema([
                                Section::make()
                                    ->columnSpanFull()
                                    ->Schema([
                                        Repeater::make('hero.slides')
                                            ->label('Slides')
                                            ->collapsed()
                                            ->reorderable()
                                            ->cloneable()
                                            ->itemNumbers()
                                            ->maxItems(5)
                                            ->itemLabel(fn(array $state): ?string => $state['title'] ?? 'Slide')
                                            ->schema([

                                                FileUpload::make('image')
                                                    ->image()
                                                    ->label('Slide Image')
                                                    ->directory('images/academy-page/hero-slides')
                                                    ->disk('public')
                                                    ->visibility('public')
                                                    ->deleteUploadedFileUsing(function ($file) {
                                                        Storage::disk('public')->delete($file);
                                                    })
                                                    ->preserveFilenames()
                                                    ->nullable()
                                                    ->removeUploadedFileButtonPosition('right')
                                                    ->imageEditor()
                                                    ->downloadable()
                                                    ->columnSpanFull()
                                                    ->openable(),

                                                TextInput::make('alt')
                                                    ->label('Image Alt Text')
                                                    ->required(),

                                                TextInput::make('tag')
                                                    ->label('Tag')
                                                    ->required(),

                                                TextInput::make('title')
                                                    ->required()
                                                    ->columnSpanFull(),

                                                Textarea::make('subtitle')
                                                    ->label('Subtitle')
                                                    ->rows(2)
                                                    ->autosize()
                                                    ->columnSpanFull(),

                                                Group::make()
                                                    ->columnSpanFull()
                                                    ->columns(4)
                                                    ->schema([
                                                        TextInput::make('cta1_label')
                                                            ->label('Primary Button Label')
                                                            ->required(),

                                                        TextInput::make('cta1_href')
                                                            ->label('Primary Button URL')
                                                            // ->helperText('Use "#section-id", a full URL, or "route:contact" for named routes.')
                                                            ->required(),

                                                        TextInput::make('cta2_label')
                                                            ->label('Secondary Button Label')
                                                            ->required(),

                                                        TextInput::make('cta2_href')
                                                            ->label('Secondary Button URL')
                                                            // ->helperText('Use "#section-id", a full URL, or "route:contact" for named routes.')
                                                            ->required(),
                                                    ])

                                            ]),
                                    ]),
                            ]),
                        Tab::make('About')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->Schema([
                                        TextInput::make('about.heading')
                                            ->required(),

                                        TextInput::make('about.title')
                                            ->label('Title')
                                            ->required(),

                                        RichEditor::make('about.description')
                                            ->columnSpanFull(),

                                        Group::make()
                                            ->columnSpanFull()
                                            ->columns(4)
                                            ->schema([

                                                TextInput::make('about.cta1_label')
                                                    ->label('Primary Button Label')
                                                    ->required(),

                                                TextInput::make('about.cta1_href')
                                                    ->label('Primary Button URL'),

                                                TextInput::make('about.cta2_label')
                                                    ->label('Secondary Button Label')
                                                    ->required(),

                                                TextInput::make('about.cta2_href')
                                                    ->label('Secondary Button URL'),

                                            ]),

                                        FileUpload::make('about.image_main')
                                            ->image()
                                            ->label('Main Image')
                                            ->directory('images/academy-page/about-section')
                                            ->disk('public')
                                            ->visibility('public')
                                            ->deleteUploadedFileUsing(function ($file) {
                                                Storage::disk('public')->delete($file);
                                            })
                                            ->preserveFilenames()
                                            ->nullable()
                                            ->removeUploadedFileButtonPosition('right')
                                            ->imageEditor()
                                            ->downloadable()
                                            ->columnSpanFull()
                                            ->openable(),

                                        FileUpload::make('about.image_secondary')
                                            ->label('Secondary Image')
                                            ->image()
                                            ->directory('images/academy-page/hero-slides')
                                            ->disk('public')
                                            ->visibility('public')
                                            ->deleteUploadedFileUsing(function ($file) {
                                                Storage::disk('public')->delete($file);
                                            })
                                            ->preserveFilenames()
                                            ->nullable()
                                            ->removeUploadedFileButtonPosition('right')
                                            ->imageEditor()
                                            ->downloadable()
                                            ->columnSpanFull()
                                            ->openable(),
                                    ]),
                            ]),
                        Tab::make('What We Offer')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->Schema([
                                        TextInput::make('courses.heading')
                                            ->required(),

                                        TextInput::make('courses.title')
                                            ->label('Title')
                                            ->required(),

                                        RichEditor::make('courses.description')
                                            ->columnSpanFull(),

                                        Repeater::make('courses.items')
                                            ->label('Course Cards')
                                            ->collapsed()
                                            ->columnSpanFull()
                                            ->reorderable()
                                            ->cloneable()
                                            ->itemNumbers()
                                            ->columns(2)
                                            ->itemLabel(fn(array $state): ?string => $state['title'] ?? 'Offering')
                                            ->schema([

                                                TextInput::make('title')
                                                    ->required(),

                                                TextInput::make('subtitle')
                                                    ->label('Subheading'),

                                                Textarea::make('desc')
                                                    ->label('Description')
                                                    ->rows(2)
                                                    ->autosize()
                                                    ->columnSpanFull(),

                                                TextInput::make('icon')
                                                    ->label('Emoji Icon')
                                                    ->helperText('Used only if no icon image is set below.'),

                                                Toggle::make('dark')
                                                    ->label('Dark (highlighted) card style'),

                                                FileUpload::make('logo')
                                                    ->label('Logo Image')
                                                    ->image()
                                                    ->directory('images/academy-page/courses')
                                                    ->disk('public')
                                                    ->visibility('public')
                                                    ->deleteUploadedFileUsing(function ($file) {
                                                        Storage::disk('public')->delete($file);
                                                    })
                                                    ->preserveFilenames()
                                                    ->nullable()
                                                    ->removeUploadedFileButtonPosition('right')
                                                    ->imageEditor()
                                                    ->downloadable()
                                                    ->columnSpanFull()
                                                    ->openable(),

                                                TextInput::make('logo_height')->numeric(),

                                                TextInput::make('logo_width')->numeric(),

                                                Repeater::make('features')
                                                    ->label('Feature List')
                                                    ->simple(
                                                        TextInput::make('value')
                                                            ->required()
                                                    )
                                                    ->reorderable()
                                                    ->cloneable()
                                                    ->columnSpanFull(),

                                                TextInput::make('cta_label')
                                                    ->label('Button Label')
                                                    ->required(),

                                                TextInput::make('cta_href')
                                                    ->label('Button URL'),

                                            ]),
                                    ]),
                            ]),
                        Tab::make('Features')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->Schema([
                                        TextInput::make('features.heading')
                                            ->required(),

                                        TextInput::make('features.title')
                                            ->label('Title')
                                            ->required(),

                                        TextInput::make('features.description')
                                            ->columnSpanFull(),

                                        Repeater::make('features.items')
                                            ->label('Reasons')
                                            ->collapsed()
                                            ->reorderable()
                                            ->cloneable()
                                            ->itemNumbers()
                                            ->columnSpanFull()
                                            ->maxItems(6)
                                            ->columns(2)
                                            ->itemLabel(fn(array $state): ?string => $state['title'] ?? 'Reason')
                                            ->schema([

                                                TextInput::make('icon')
                                                    ->label('Emoji Icon')
                                                    ->required(),

                                                TextInput::make('title')
                                                    ->required(),

                                                Textarea::make('description')
                                                    ->rows(3)
                                                    ->autosize()
                                                    ->columnSpanFull(),

                                            ]),
                                    ]),
                            ]),
                        Tab::make('Gallery')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->Schema([
                                        TextInput::make('gallery.heading')
                                            ->required(),

                                        TextInput::make('gallery.title')
                                            ->label('Title')
                                            ->required(),

                                        Repeater::make('gallery.images')
                                            ->label('Images')
                                            ->collapsed()
                                            ->reorderable()
                                            ->cloneable()
                                            ->itemNumbers()
                                            ->columns(2)
                                            ->columnSpanFull()
                                            ->itemLabel(fn(array $state): ?string => $state['alt'] ?? 'Image')
                                            ->schema([

                                                FileUpload::make('image')
                                                    ->label('Image')
                                                    ->image()
                                                    ->directory('images/academy-page/gallery')
                                                    ->disk('public')
                                                    ->visibility('public')
                                                    ->deleteUploadedFileUsing(function ($file) {
                                                        Storage::disk('public')->delete($file);
                                                    })
                                                    ->preserveFilenames()
                                                    ->nullable()
                                                    ->removeUploadedFileButtonPosition('right')
                                                    ->imageEditor()
                                                    ->downloadable()
                                                    ->columnSpanFull()
                                                    ->openable(),

                                                TextInput::make('alt')
                                                    ->label('Alt Text')
                                                    ->required(),

                                            ]),
                                    ])
                            ]),
                        Tab::make('Tutors')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->Schema([
                                        TextInput::make('tutors.heading')
                                            ->required(),

                                        TextInput::make('tutors.title')
                                            ->label('Title')
                                            ->required(),

                                        Repeater::make('tutors.items')
                                            ->label('Tutors')
                                            ->collapsed()
                                            ->reorderable()
                                            ->cloneable()
                                            ->itemNumbers()
                                            ->columnSpanFull()
                                            ->columns(2)
                                            ->itemLabel(fn(array $state): ?string => $state['name'] ?? 'Tutor')
                                            ->schema([

                                                FileUpload::make('avatar_image')
                                                    ->label('Avatar Image')
                                                    ->image()
                                                    ->directory('images/academy-page/avatar_image')
                                                    ->disk('public')
                                                    ->visibility('public')
                                                    ->deleteUploadedFileUsing(function ($file) {
                                                        Storage::disk('public')->delete($file);
                                                    })
                                                    ->preserveFilenames()
                                                    ->nullable()
                                                    ->removeUploadedFileButtonPosition('right')
                                                    ->imageEditor()
                                                    ->downloadable()
                                                    ->columnSpanFull()
                                                    ->openable(),

                                                TextInput::make('name')
                                                    ->required(),

                                                TextInput::make('role')
                                                    ->label('Subject / Role')
                                                    ->required(),

                                                Textarea::make('bio')
                                                    ->rows(3)
                                                    ->autosize()
                                                    ->required()
                                                    ->columnSpanFull(),

                                                Repeater::make('tags')
                                                    ->label('Subject Tags')
                                                    ->simple(
                                                        TextInput::make('value')
                                                            ->required()
                                                    )
                                                    ->reorderable()
                                                    ->cloneable()
                                                    ->maxItems(4)
                                                    ->columnSpanFull(),

                                            ]),
                                    ]),
                            ]),
                        Tab::make('Testimonials')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->Schema([
                                        Repeater::make('testimonials.items')
                                            ->label('Testimonials')
                                            ->collapsed()
                                            ->reorderable()
                                            ->cloneable()
                                            ->itemNumbers()
                                            ->columns(2)
                                            ->columnSpanFull()
                                            ->itemLabel(fn(array $state): ?string => $state['name'] ?? 'Testimonial')
                                            ->schema([

                                                FileUpload::make('avatar_image')
                                                    ->label('Avatar Image')
                                                    ->image()
                                                    ->directory('images/academy-page/avatar_image')
                                                    ->disk('public')
                                                    ->visibility('public')
                                                    ->deleteUploadedFileUsing(function ($file) {
                                                        Storage::disk('public')->delete($file);
                                                    })
                                                    ->preserveFilenames()
                                                    ->nullable()
                                                    ->removeUploadedFileButtonPosition('right')
                                                    ->imageEditor()
                                                    ->downloadable()
                                                    ->columnSpanFull()
                                                    ->openable(),

                                                TextInput::make('name')
                                                    ->required(),

                                                TextInput::make('subject')
                                                    ->label('Subject')
                                                    ->required(),

                                                Textarea::make('quote')
                                                    ->rows(3)
                                                    ->autosize()
                                                    ->required()
                                                    ->columnSpanFull(),

                                            ]),
                                    ]),
                            ]),
                        Tab::make('Closing Manifesto')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->Schema([
                                        Textarea::make('manifesto.quote')
                                            ->rows(2)
                                            ->autosize()
                                            ->required()
                                            ->columnSpanFull(),

                                        TextInput::make('manifesto.button_label')
                                            ->required(),

                                        TextInput::make('manifesto.button_url')
                                            ->required(),

                                        TextInput::make('manifesto.whatsapp_url')
                                            ->required(),

                                        TextInput::make('manifesto.whatsapp_label')
                                            ->required(),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
