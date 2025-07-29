<?php

namespace App\Filament\Resources;

use App\Enums\FormStatusEnum;
use App\Enums\FormTypeEnum;
use App\Filament\Resources\FormResource\Pages;
use App\Filament\Resources\FormResource\RelationManagers;
use App\Models\Form as FormModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FormResource extends Resource
{
    protected static ?string $model = FormModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Formularios';
    protected static ?string $pluralModelLabel = 'Formularios';
    protected static ?string $modelLabel = 'Formulario';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('form_type')
                    ->label('Tipo de Formulario')
                    ->options(collect(FormTypeEnum::cases())->mapWithKeys(fn($case) => [$case->value => $case->label()])->toArray())
                    ->required(),

                Forms\Components\Select::make('client_id')
                    ->label('Cliente')
                    ->relationship('client', 'name')
                    ->required()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->label('Nombre')
                            ->required(),
                        Forms\Components\TextInput::make('defaultEmail')
                            ->label('Email')
                            ->email()
                            ->required(),
                    ]),

                Forms\Components\TextInput::make('description')
                    ->label('Descripción')
                    ->maxLength(500),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client.name')
                    ->label('Cliente')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Descripción')
                    ->limit(50)
                    ->wrap()
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('formTemplate.type')
                    ->label('Tipo')
                    ->formatStateUsing(fn($state) => $state?->label() ?? '')
                    ->sortable()
                    ->searchable(),


                Tables\Columns\TextColumn::make('createdBy.name')
                    ->label('Creado por')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Estado'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime('d F Y')
                    ->sortable()
                    ->searchable(),


            ])
            ->filters([
                Tables\Filters\SelectFilter::make('client_id')
                    ->label('Cliente')
                    ->relationship('client', 'name'),
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('Usuario')
                    ->relationship('user', 'name'),
                Tables\Filters\SelectFilter::make('form_type')
                    ->label('Tipo')
                    ->options(collect(\App\Enums\FormTypeEnum::cases())->mapWithKeys(fn($case) => [$case->value => $case->label()])->toArray()),
                Tables\Filters\SelectFilter::make('status')
                    ->label('Estado')
                    ->options(collect(\App\Enums\FormStatusEnum::cases())->mapWithKeys(fn($case) => [$case->value => $case->label()])->toArray()),
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
            'index' => Pages\ListForms::route('/'),
            'create' => Pages\CreateForm::route('/create'),
            'edit' => Pages\EditFormCustomPage::route('/{record}/edit'),
        ];
    }
}
