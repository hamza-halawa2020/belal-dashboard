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

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                RichEditor::make('description')
                ->columnSpanFull()
                    ->required(),
                TextInput::make('money_capital')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                   ->columnSpanFull()
                    ->required(),
                TextInput::make('rate_of_return')
                    ->required(),
                RichEditor::make('services')
                ->columnSpanFull()
                    ->required(),
                RichEditor::make('study_content')
                ->columnSpanFull()
                    ->required(),
                RichEditor::make('financial_metrics')
                   ->columnSpanFull()
                    ->required(),
                Toggle::make('status')
                    ->required(),
                Select::make('category_id')
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
                TextEntry::make('title'),
                TextEntry::make('description')
                ->html(),
                ImageEntry::make('image'),
                TextEntry::make('money_capital'),
                TextEntry::make('rate_of_return'),
                TextEntry::make('services')
                    ->html(),
                TextEntry::make('study_content')
                    ->html(),
                TextEntry::make('financial_metrics')
                    ->html(),
                IconEntry::make('status')
                    ->boolean(),
                TextEntry::make('user.name')
                    ->numeric(),
                TextEntry::make('category.title')
                    ->numeric(),
                TextEntry::make('created_at')
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
                    ->searchable(),
                TextColumn::make('description')
                    ->html()
                    ->searchable(),
                ImageColumn::make('image'),
                TextColumn::make('money_capital')
                    ->searchable(),
                TextColumn::make('rate_of_return')
                    ->searchable(),
                TextColumn::make('services')
                ->html()
                    ->searchable(),
                TextColumn::make('study_content')
                ->html()
                    ->searchable(),
                TextColumn::make('financial_metrics')
                ->html()
                    ->searchable(),
                IconColumn::make('status')
                    ->boolean(),
                TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('category.title')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
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
