<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    // akan dikembangkan nanti

    // public function electionPeriod()
    // {
    //     return $this->belongsTo(ElectionPeriod::class);
    // }

    // FUTURE: relasi ke votes saat fitur vote dikembangkan
    // public function votes()
    // {
    //     return $this->hasMany(Vote::class);
    // }

    // Helper untuk hitung suara nanti
    // public function getVoteCountAttribute(): int
    // {
    //     return $this->votes()->count();
    // }

    use SoftDeletes;

    protected $table = 'candidates';

    protected $fillable = [
        // 'election_period_id',
        'nomor',
        'nama_ketua',
        'kelas_ketua',
        'nama_wakil',
        'kelas_wakil',
        'visi',
        'misi',
        'program',
        'photo_ketua',
        'photo_wakil',
        'vision_mission_image',
    ];
}
