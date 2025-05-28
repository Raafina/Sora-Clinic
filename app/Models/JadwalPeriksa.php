<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPeriksa extends Model
{
    // /** @use HasFactory<\Database\Factories\DetailPeriksaFactory> */
    use SoftDeletes;
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'id_dokter',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_dokter', 'id');
    }

    public function janji_periksa()
    {
        return $this->hasMany(JanjiPeriksa::class, 'id_jadwal', 'id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('hari', 'like', '%' . $search . '%')
        );
    }
}
