<?php

namespace App\Filament\Resources\FeasibilityStudies;

use App\Filament\Resources\FeasibilityStudies\Pages\ManageFeasibilityStudies;
use App\Models\FeasibilityStudy;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;

class FeasibilityStudyResource extends Resource
{
    protected static ?string $model = FeasibilityStudy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getModelLabel(): string
    {
        return __('FeasibilityStudy');
    }

    public static function getPluralModelLabel(): string
    {
        return __('FeasibilityStudies');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                ->label(__('Title'))
                    ->required(),
                RichEditor::make('description')
                ->label(__('Description'))
                ->columnSpanFull()
                    ->required(),
                TextInput::make('money_capital')
                ->label(__('Money Capital'))
                    ->required(),
                FileUpload::make('image')
                ->label(__('Image'))
                    ->image()
                   ->columnSpanFull()
                    ->required(),
                TextInput::make('rate_of_return')
                ->label(__('Rate of Return'))
                    ->required(),
                RichEditor::make('services')
                ->label(__('Services'))
                ->columnSpanFull()
                    ->required(),
                RichEditor::make('study_content')
                ->label(__('Study Content'))
                ->columnSpanFull()
                    ->required(),
                RichEditor::make('financial_metrics')
                ->label(__('Financial Metrics'))
                   ->columnSpanFull()
                    ->required(),
                Toggle::make('status')
                ->label(__('Status'))
                    ->required(),
                Select::make('category_id')
                ->label(__('Category'))
                ->required()
                ->relationship('category','title',
                    fn ($query) => $query->where('status', 1)
                )
                 ->searchable()
                ->preload(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                ->label(__('Title')),
                TextEntry::make('description')
                ->html()
                ->label(__('Description')),
                ImageEntry::make('image')
                ->label(__('Image')),
                TextEntry::make('money_capital')
                ->label(__('Money Capital')),
                TextEntry::make('rate_of_return')
                ->label(__('Rate of Return')),
                TextEntry::make('services')
                ->label(__('Services'))                                 
                    ->html(),
                TextEntry::make('study_content')
                ->label(__('Study Content'))
                    ->html(),
                TextEntry::make('financial_metrics')
                ->label(__('Financial Metrics'))
                    ->html(),
                IconEntry::make('status')
                    ->boolean(),
                TextEntry::make('user.name')
                ->label(__('User'))
                    ->numeric(),
                TextEntry::make('category.title')
                ->label(__('Category'))
                    ->numeric(),
                TextEntry::make('created_at')
                ->label(__('Created At'))
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')
                ->label(__('Title'))
                    ->searchable(),
                TextColumn::make('description')
                ->label(__('Description'))
                    ->html()
                    ->searchable(),
                ImageColumn::make('image')
                ->label(__('Image')),
                TextColumn::make('money_capital')
                ->label(__('Money Capital'))
                    ->searchable(),
                TextColumn::make('rate_of_return')
                ->label(__('Rate of Return'))
                    ->searchable(),
                TextColumn::make('services')
                ->html()
                ->label(__('Services'))
                    ->searchable(),
                TextColumn::make('study_content')
                ->label(__('Study Content'))
                ->html()
                    ->searchable(),
                TextColumn::make('financial_metrics')
                ->label(__('Financial Metrics'))
                ->html()
                    ->searchable(),
                IconColumn::make('status')
                ->label(__('Status'))
                    ->boolean(),
                TextColumn::make('user.name')
                ->label(__('User'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('category.title')
                ->label(__('Category'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageFeasibilityStudies::route('/'),
        ];
    }
}
