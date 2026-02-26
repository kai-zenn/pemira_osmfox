<?php

namespace App\Filament\Resources\Students\Tables;

use App\Filament\Imports\StudentImporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ImportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Filament\Actions\Action;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;

use function Laravel\Prompts\text;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nis')->label('NIS')->searchable()->sortable(),
                TextColumn::make('name')->label('Nama')->searchable()->sortable(),
                TextColumn::make('kelas')->label('Kelas')->searchable()->sortable(),
                TextColumn::make('angkatan')->label('Angkatan')->sortable(),
            ])
            ->filters([
                SelectFilter::make('kelas')->label('Kelas')->options(Student::distinct()->pluck('kelas', 'kelas')),
                SelectFilter::make('angkatan')->label('Angkatan')->options(Student::distinct()->pluck('angkatan', 'angkatan')),
                Filter::make('no_account')->label('Belum mempunyai akun')->query(fn (Builder $query) => $query->whereNull('user_id'))
            ])
            ->headerActions([
                ImportAction::make('importStudent')
                    ->importer(StudentImporter::class)
                    ->label('Import Data Siswa')
            ])
            ->recordActions([
                EditAction::make(),
                ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
