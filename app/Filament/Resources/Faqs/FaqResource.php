<?php

namespace App\Filament\Resources\Faqs;

use App\Filament\Resources\Faqs\Pages\ManageFaqs;
use App\Models\Faq;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\RichEditor;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'question';

     public static function getModelLabel(): string
    {
        return __('Faq');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Faqs');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('question')
                    ->label(__('Question'))
                    ->required(),
                RichEditor::make('answer')
                    ->label(__('Answer'))
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('status')
                    ->label(__('Status'))
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('question')
                    ->label(__('Question')),
                TextEntry::make('answer')
                    ->label(__('Answer'))
                    ->html()
                    ->columnSpanFull(),
                IconEntry::make('status')
                    ->label(__('Status'))
                    ->boolean(),
                TextEntry::make('user.name')
                    ->label(__('User'))
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
            ->recordTitleAttribute('question')
            ->columns([
                TextColumn::make('question')
                    ->label(__('Question'))
                    ->searchable()
                    ->html(),
                IconColumn::make('status')
                    ->label(__('Status'))
                    ->boolean(),
                TextColumn::make('user.name')
                    ->label(__('User'))
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
            'index' => ManageFaqs::route('/'),
        ];
    }
}
