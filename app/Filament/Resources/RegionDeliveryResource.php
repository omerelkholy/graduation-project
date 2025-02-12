<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegionDeliveryResource\Pages;
use App\Filament\Resources\RegionDeliveryResource\RelationManagers;
use App\Models\RegionDelivery;
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
            'index' => Pages\ListRegionDeliveries::route('/'),
            'create' => Pages\CreateRegionDelivery::route('/create'),
            'edit' => Pages\EditRegionDelivery::route('/{record}/edit'),
        ];
    }
}
