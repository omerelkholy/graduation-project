<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderDeliveryResource\Pages;
use App\Filament\Resources\OrderDeliveryResource\RelationManagers;
use App\Models\OrderDelivery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderDeliveryResource extends Resource
{
    protected static ?string $model = OrderDelivery::class;

    protected static ?string $navigationIcon = 'heroicon-m-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrderDeliveries::route('/'),
            'create' => Pages\CreateOrderDelivery::route('/create'),
            'edit' => Pages\EditOrderDelivery::route('/{record}/edit'),
        ];
    }
}
