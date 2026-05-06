<?php

namespace App\Filament\Resources\Candidates\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CandidateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Identitas Paslon')
                ->schema([
                    TextInput::make('nomor')
                        ->label('Nomor Urut')
                        ->required()
                        ->integer()
                        ->minValue(1)
                        ->unique(ignoreRecord: true)
                        ->placeholder('Contoh: 1'),
                ]),

            Section::make('Calon Ketua')
                ->schema([
                    TextInput::make('nama_ketua')
                        ->label('Nama Ketua')
                        ->required(),
                    TextInput::make('kelas_ketua')
                        ->label('Kelas')
                        ->required()
                        ->placeholder('XI RPL'),
                    FileUpload::make('photo_ketua')
                        ->label('Foto')
                        ->image()
                        ->imageEditor()
                        ->visibility('public')
                        ->directory('candidates/photos')
                        ->disk('public')
                        ->nullable()
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Section::make('Calon Wakil Ketua')
                ->schema([
                    TextInput::make('nama_wakil')
                        ->label('Nama Wakil')
                        ->required(),
                    TextInput::make('kelas_wakil')
                        ->label('Kelas')
                        ->required()
                        ->placeholder('XI BR 1'),
                    FileUpload::make('photo_wakil')
                        ->label('Foto')
                        ->image()
                        ->imageEditor()
                        ->visibility('public')
                        ->directory('candidates/photos')
                        ->disk('public')
                        ->nullable()
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Section::make('Visi, Misi & Program Kerja')
                ->schema([
                    Textarea::make('visi')
                        ->label('Visi')
                        ->required()
                        ->rows(3)
                        ->maxLength(400),
                    Textarea::make('misi')
                        ->label('Misi')
                        ->required()
                        ->rows(5)
                        ->helperText('Pisahkan setiap poin dengan baris baru')
                        ->maxLength(1200),
                    Textarea::make('program')   
                        ->label('Program Kerja')
                        ->required()
                        ->rows(5)
                        ->maxLength(2000)
                        ->helperText('Pisahkan setiap program dengan baris baru'),
                    FileUpload::make('vision_mission_image')
                        ->label('Gambar Visi Misi (opsional)')
                        ->image()
                        ->visibility('public')
                        ->nullable()
                        ->disk('public')
                        ->directory('candidates/poster')
                        ->columnSpanFull(),
                ]),
        ]);
    }
}
