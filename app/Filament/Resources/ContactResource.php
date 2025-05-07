<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactResource extends Resource
{
    // Le modèle associé
    protected static ?string $model = ContactMessage::class;

    // L'icône de navigation
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Formulaire de création/édition
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nom')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->maxLength(255),

                Forms\Components\TextInput::make('telephone')
                    ->label('Téléphone')
                    ->nullable()
                    ->maxLength(20),

                Forms\Components\TextInput::make('sujet')
                    ->label('Sujet')
                    ->required()
                    ->maxLength(100),

                Forms\Components\Textarea::make('message')
                    ->label('Message')
                    ->required()
                    ->minLength(10),
            ]);
    }

    // Tableau des messages de contact
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nom'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('sujet')->label('Sujet'),
                Tables\Columns\TextColumn::make('created_at')->label('Date d\'envoi')->dateTime(),
            ])
            ->filters([
                // Si tu veux ajouter des filtres personnalisés
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Permet d'éditer un message
                Tables\Actions\ViewAction::make(), // Permet de voir les détails du message
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(), // Permet de supprimer plusieurs messages à la fois
            ]);
    }

    // Définir les relations (si tu en as, mais ici ce n'est pas nécessaire pour l'instant)
    public static function getRelations(): array
    {
        return [
            // Relations si tu en as
        ];
    }

    // Définir les pages liées au Resource (index, create, edit, etc.)
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
