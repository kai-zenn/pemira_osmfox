<?php

namespace App\Filament\Resources\Students;

use App\Filament\Resources\Students\Pages\CreateStudent;
use App\Filament\Resources\Students\Pages\EditStudent;
use App\Filament\Resources\Students\Pages\ListStudents;
use App\Filament\Resources\Students\Schemas\StudentForm;
use App\Filament\Resources\Students\Tables\StudentsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\User;
use Filament\Notifications\Notification;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'student';
    protected static ?string $navigationLabel = 'Data Siswa';
    // protected static ?string $navigationGroup = 'Manajemen Siswa';

    public static function form(Schema $schema): Schema
    {
        return StudentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected static function generateAccount(Student $record): void
    {
        if ($record->user_id) return;

        $user = User::create([
            'student_id' => $record->id,
            'nis' => $record->nis,
            'password' => Hash::make($record->nis),
        ]);

        $user->assignRole('student');

        $record->update([
            'user_id' => $user->id,
        ]);

        Notification::make()
            ->title('Akun berhasil dibuat')
            ->body('Akun untuk siswa ' . $record->name . ' berhasil dibuat dengan password defaultnya adalah NIS siswa')
            ->success()
            ->send();
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStudents::route('/'),
            'create' => CreateStudent::route('/create'),
            'edit' => EditStudent::route('/{record}/edit'),
        ];
    }
}
