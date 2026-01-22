<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\Pages\ManageServices;
use App\Models\Service;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
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

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    
    public static function getModelLabel(): string
    {
        return __('Service');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Services');
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
                FileUpload::make('image')
                    ->label(__('Image'))
                    ->image()
                    ->required(),
                Toggle::make('status')
                    ->label(__('Status'))
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label(__('Title')),
                TextEntry::make('description')
                    ->label(__('Description'))
                    ->html(),
                ImageEntry::make('image')
                    ->label(__('Image')),
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
            'index' => ManageServices::route('/'),
        ];
    }
}
