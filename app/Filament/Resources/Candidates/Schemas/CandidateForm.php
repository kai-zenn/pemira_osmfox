<?php

namespace App\Filament\Resources\Candidates\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CandidateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // ── Ketua ──
                Section::make('Calon Ketua')
                    ->schema([
                        TextInput::make('nama_ketua')
                            ->label('Nama Ketua')
                            ->required(),
                        TextInput::make('kelas_ketua')
                            ->label('Kelas Calon Ketua')
                            ->required()
                            ->placeholder('XI RPL'),
                        FileUpload::make('photo_ketua')
                            ->label('Foto Calon Ketua')
                            ->image()
                            ->imageEditor()
                            ->visibility('public')
                            ->directory('candidates/photos')
                            ->preserveFilenames()
                            ->disk('public')
                            ->nullable()
                    ])
                    ->columns(2),

                // ── Wakil ──
                Section::make('Calon Wakil Ketua')
                    ->schema([
                        TextInput::make('nama_wakil')
                            ->label('Nama Wakil')
                            ->required(),
                        TextInput::make('kelas_wakil')
                            ->label('Kelas Calon Wakil')
                            ->required()
                            ->placeholder('XI BR 1'),
                        FileUpload::make('photo_wakil')
                            ->label('Foto Calon Wakil')
                            ->image()
                            ->imageEditor()
                            ->visibility('public')
                            ->directory('candidates/photos')
                            ->preserveFilenames()
                            ->disk('public')
                            ->nullable()
                    ])
                    ->columns(2),

                // ── Visi Misi ──
                Section::make('Visi, Misi & Program Kerja')
                    ->schema([
                        TextInput::make('visi')
                            ->label('Visi')
                            ->required()
                            ->maxLength(400),
                        TextInput::make('misi')
                            ->label('Misi')
                            ->required()
                            ->helperText('Pisahkan setiap poin dengan baris baru')
                            ->maxLength(1200),
                        TextInput::make('program')
                            ->label('Program Kerja')
                            ->required()
                            ->maxLength(2000)
                            ->helperText('Pisahkan setiap program dengan baris baru'),
                        FileUpload::make('vision_mission_image')
                            ->label('Gambar Visi Misi (opsional)')
                            ->image()
                            ->visibility('public')
                            ->nullable()
                            ->disk('public')
                            ->directory('candidates/poster')
                    ]),
                Section::make('Identitas Paslon')
                    ->schema([
                        TextInput::make('nomor')
                            ->label('Nomor Urut')
                            ->required()
                            ->integer()
                            ->minValue(1)
                            ->unique(ignoreRecord: true)
                            ->placeholder('Contoh: 1')
                    ])
,            ]);
    }
}
