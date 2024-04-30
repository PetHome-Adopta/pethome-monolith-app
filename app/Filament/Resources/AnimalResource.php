<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnimalResource\Pages;
use App\Filament\Resources\AnimalResource\RelationManagers;
use App\Models\Animal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnimalResource extends Resource
{
    protected static ?string $model = Animal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(true),
                Forms\Components\Textarea::make('description')->rows(3),
                Forms\Components\TextInput::make('breed')->required(true),
                Forms\Components\TextInput::make('species')->required(true),
                Forms\Components\Select::make('sex')->options([
                    Animal::SEX_FEMALE => 'Hembra',
                    Animal::SEX_MALE => 'Macho',
                ]),
                Forms\Components\Select::make('status')->options([
                    Animal::STATUS_REGISTERED => 'Registrado',
                    Animal::STATUS_READY => 'Listo para adopción',
                    Animal::STATUS_ADOPTED => 'Adoptado',
                ]),
                Forms\Components\Checkbox::make('urgent'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('breed'),
                Tables\Columns\TextColumn::make('species'),
                Tables\Columns\TextColumn::make('sex'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\BooleanColumn::make('urgent'),
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
            'index' => Pages\ListAnimals::route('/'),
            'create' => Pages\CreateAnimal::route('/create'),
            'edit' => Pages\EditAnimal::route('/{record}/edit'),
        ];
    }
}
