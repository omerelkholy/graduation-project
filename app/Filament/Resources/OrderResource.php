<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Region;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-s-truck';

    public static function form(Form $form): Form
    {
//        dd(Order::find(2));
        return $form
            ->schema([
                Forms\Components\Repeater::make('products')->label('Product')
                    ->schema([
                        Forms\Components\TextInput::make('product_name'),
                        Forms\Components\TextInput::make('product_weight'),
                        Forms\Components\TextInput::make('product_quantity'),
                    ])->columns(2),
                Forms\Components\Select::make('user_id')->label('User')
                ->options(User::where('role', 'merchant')->pluck('name', 'id'))->searchable(),
                Forms\Components\Select::make('region_id')->label('Region')
                ->options(Region::where('status', 'active')->pluck('name','id'))->searchable(),
                Forms\Components\TextInput::make('client_name')->label('Client Name')->required(),
                Forms\Components\TextInput::make('client_phone')->label('Client Phone')->required(),
                Forms\Components\TextInput::make('client_city')->label('Client City')->required(),
                Forms\Components\Checkbox::make('village') ->label('Village'),
                Forms\Components\Select::make('shipping_type')->label('Shipping Type')
                ->options([
                    'normal'=>'Normal',
                    'shipping_in_24_hours'=>'Shipping in 24 hours'
                ]),
                Forms\Components\Select::make('payment_type')->label('Payment Type')
                ->options([
                    'on_delivery'=>'On Delivery',
                    'online_payment'=>'Online Payment',
                    'before_shipping'=>'Before Shipping'
                ]),
                Forms\Components\Select::make('status')->label('Status')
                ->options([
                    'pending'=>'Pending',
                    'rejected'=>'Rejected',
                    'processing'=>'Processing',
                    'on_shipping'=>'On Shipping',
                    'shipped'=>'Shipped'
                ]),
                // mohamed edite




            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('client_name')->sortable(),
                Tables\Columns\TextColumn::make('client_phone')->sortable(),
                Tables\Columns\TextColumn::make('client_city')->sortable(),
                Tables\Columns\TextColumn::make('shipping_type')->sortable(),
                Tables\Columns\TextColumn::make('payment_type')->sortable(),
                Tables\Columns\TextColumn::make('status')->sortable(),
                Tables\columns\TextColumn::make('total_price')->sortable(),
                Tables\columns\TextColumn::make('total_weight')-> sortable(),

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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
