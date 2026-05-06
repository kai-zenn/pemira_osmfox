<?php

namespace App\Filament\Resources\Candidates\Tables;

use App\Models\Candidate;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\RestoreAction;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class CandidatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor')
                    ->label('No.')
                    ->sortable()
                    ->badge(),
                ImageColumn::make('photo_ketua')
                    ->label('Foto')
                    ->circular()
                    ->disk('public')
                    ->defaultImageUrl(asset('log46.png')),
                TextColumn::make('nama_ketua')
                    ->label("Ketua")
                    ->searchable()
                    ->sortable()
                    ->description(fn (Candidate $r): string => $r->kelas_ketua),
                TextColumn::make('kelas_ketua')
                    ->label('Kelas Ketua')
                    ->badge(),
                ImageColumn::make('photo_wakil')
                    ->label('Foto')
                    ->circular()
                    ->disk('public')
                    ->defaultImageUrl(asset('log46.png')),
                TextColumn::make('nama_wakil')
                    ->label("Wakil")
                    ->searchable()
                    ->sortable()
                    ->description(fn (Candidate $r): string => $r->kelas_wakil),
                TextColumn::make('kelas_wakil')
                    ->label('Kelas Wakil')
                    ->badge(),
                TextColumn::make('visi')
                    ->label('Visi')
                    ->maxLength(180)
                    ->tooltip(fn (Candidate $r): string => $r->visi),
                Textarea::make('misi')
                    ->label('Misi')
                    ->required()
                    ->row(5)
                    ->maxLength(1200)
                    ->toggleable(isToggledHiddenByDefault: true),
                Textarea::make('program')
                    ->label('Program Kerja')
                    ->rows(5)
                    ->maxLength(1200)
                    ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->defaultSort('nomor')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
