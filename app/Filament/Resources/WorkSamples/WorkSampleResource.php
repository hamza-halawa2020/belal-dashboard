<?php

namespace App\Filament\Resources\WorkSamples;

use App\Filament\Resources\WorkSamples\Pages\ManageWorkSamples;
use App\Models\WorkSample;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
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
use Filament\Forms\Components\RichEditor;

class WorkSampleResource extends Resource
{
    protected static ?string $model = WorkSample::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->required(),
                TextInput::make('money_capital')
                    ->required(),
                TextInput::make('rate_of_return')
                    ->required(),
                RichEditor::make('services')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('study_content')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('financial_metrics')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('description')
                    ->html()
                    ->columnSpanFull(),
                ImageEntry::make('image'),
                TextEntry::make('money_capital'),
                TextEntry::make('rate_of_return'),
                TextEntry::make('services')
                    ->html()
                    ->columnSpanFull(),
                TextEntry::make('study_content')
                    ->html()
                    ->columnSpanFull(),
                TextEntry::make('financial_metrics')
                    ->html()
                    ->columnSpanFull(),
                IconEntry::make('status')
                    ->boolean(),
                TextEntry::make('user.name')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
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
                ImageColumn::make('image'),
                TextColumn::make('money_capital')
                    ->searchable(),
                TextColumn::make('rate_of_return')
                    ->searchable(),
                IconColumn::make('status')
                    ->boolean(),
                TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
            'index' => ManageWorkSamples::route('/'),
        ];
    }
}
