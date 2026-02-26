<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nis')
                    ->label('NIS')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->numeric()
                    ->maxLength(5),
                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),
                TextInput::make('kelas')
                    ->label('Kelas')
                    ->required()
                    ->numeric()
                    ->maxValue(13),
                TextInput::make('angkatan')
                    ->label('Angkatan')
                    ->required()
            ]);
    }
}
