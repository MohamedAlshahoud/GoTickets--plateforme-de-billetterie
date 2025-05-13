<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    // ✅ FORMULAIRE DE CRÉATION / MODIFICATION
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Titre')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('location')
                    ->label('Lieu')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('date')
                    ->label('Date')
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->nullable()
                    ->rows(4),
            ]);
    }

    // ✅ TABLEAU DES ÉVÉNEMENTS
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Titre')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('location')->label('Lieu')->sortable(),
                Tables\Columns\TextColumn::make('date')->label('Date')->date()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Créé le')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
