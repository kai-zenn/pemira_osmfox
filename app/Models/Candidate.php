<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    // akan dikembangkan nanti
    // public function votes(): HasMany
    // {
    //     return $this->hasMany(Vote::class);
    // }

    protected $table = 'Candidates';

    protected $fillable = [
        'nomor',
        'nama',
        'kelas',
        'visi',
        'misi',
        'vision_mission_image',
        'photo_path',
    ];
}
