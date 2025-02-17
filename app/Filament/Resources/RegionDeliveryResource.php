<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegionDeliveryResource\Pages;
use App\Filament\Resources\RegionDeliveryResource\RelationManagers;
use App\Models\Region;
use App\Models\RegionDelivery;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegionDeliveryResource extends Resource
{
    protected static ?string $model = RegionDelivery::class;

    protected static ?string $navigationIcon = 'heroicon-s-globe-americas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('region_id')
                ->options(Region::where('status', 'active')->pluck('name', 'id'))->searchable()->label('Region Name'),
                Forms\Components\Select::make('user_id')
                ->options(User::where('role', 'delivery_man')->pluck('name', 'id'))->searchable()->label("Delivery man's Name"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('region.name')->label('Region Name')->searchable()->alignCenter(),
                Tables\Columns\TextColumn::make('user.name')->label("Delivery-man's Name")->searchable()->alignCenter(),
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
            'index' => Pages\ListRegionDeliveries::route('/'),
            'create' => Pages\CreateRegionDelivery::route('/create'),
            'edit' => Pages\EditRegionDelivery::route('/{record}/edit'),
        ];
    }
}
