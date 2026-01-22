<?php

namespace App\Filament\Resources\Staff;

use App\Filament\Resources\Staff\Pages\ManageStaff;
use App\Models\Staff;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('Staff');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Staffs');
    }


    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('job_title')
                    ->label(__('Job Title'))
                    ->required(),
                    Toggle::make('status')
                    ->label(__('Status'))
                    ->required(),
                FileUpload::make('image')
                    ->label(__('Image'))
                    ->image()
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label(__('Name')),
                TextEntry::make('job_title')
                    ->label(__('Job Title')),
                ImageEntry::make('image')
                    ->label(__('Image')),
                TextEntry::make('user.name')
                    ->label(__('User'))
                    ->numeric(),
                IconEntry::make('status')
                    ->label(__('Status'))
                    ->boolean(),
                TextEntry::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->placeholder('-'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),
                IconColumn::make('status')
                    ->label(__('Status'))
                    ->boolean(),
                TextColumn::make('job_title')
                    ->label(__('Job Title'))
                    ->searchable(),
                ImageColumn::make('image')
                    ->label(__('Image')),
                TextColumn::make('user.name')
                    ->label(__('User'))
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
            'index' => ManageStaff::route('/'),
        ];
    }
}
