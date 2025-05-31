<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderItemResource\Pages;
use App\Models\OrderItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class OrderItemResource extends Resource
{
    protected static ?string $model = OrderItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Articles de commande';
    protected static ?string $pluralLabel = 'Articles de commande';
    protected static ?string $modelLabel = 'Article de commande';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('order_id')
                    ->relationship('order', 'id')
                    ->label('Commande')
                    ->required(),

                Select::make('event_id')
                    ->relationship('event', 'title')
                    ->label('Événement')
                    ->required(),

                TextInput::make('quantity')
                    ->label('Quantité')
                    ->numeric()
                    ->required(),

                TextInput::make('price')
                    ->label('Prix unitaire (€)')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.id')->label('Commande')->sortable(),
                TextColumn::make('event.title')->label('Événement')->sortable(),
                TextColumn::make('quantity')->label('Quantité'),
                TextColumn::make('price')->label('Prix unitaire')->money('eur', true),
                TextColumn::make('created_at')->label('Ajouté le')->dateTime(),
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrderItems::route('/'),
            'create' => Pages\CreateOrderItem::route('/create'),
            'edit' => Pages\EditOrderItem::route('/{record}/edit'),
        ];
    }
}
