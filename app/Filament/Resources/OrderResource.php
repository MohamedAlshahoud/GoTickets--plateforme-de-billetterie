<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Commandes';
    protected static ?string $pluralLabel = 'Commandes';
    protected static ?string $modelLabel = 'Commande';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('total_price')
                    ->label('Prix total')
                    ->required()
                    ->numeric(),

                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'En attente',
                        'paid' => 'Payée',
                        'cancelled' => 'Annulée',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('ID'),
                TextColumn::make('user.name')->label('Utilisateur'),
                TextColumn::make('total_price')->money('eur', true)->label('Total'),
                TextColumn::make('status')->label('Statut')->badge(),
                TextColumn::make('created_at')->label('Créée le')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
