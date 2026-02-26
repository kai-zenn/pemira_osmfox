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
                Action::make('generate_account')
                    ->label('Buat Akun')
                    ->icon('heroicon-o-user-plus')
                    ->color('success')
                    ->visible(fn (Student $record) => $record->user_id === null)
                    ->action(function (Student $record) {
                        // mengubah password menjadi hexadecimal random
                        $password = Hash::make($record->nis); // menggunakan nis sebagai password default

                        // Create a new user account for the student
                        $user = $record->user()->create([
                            'name' => $record->name,
                            'email' => $record->nis . '@example.com', // menggunakan nis murid sebagai default alamat email
                            'password' => Hash::make($password),
                        ]);

                        // Show a success message with the generated password
                        Action::message("Akun berhasil dibuat! Email: {$user->email}, Password: {$password}");
                    })
                ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
