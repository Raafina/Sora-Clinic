<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JanjiPeriksa extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPeriksaFactory> */
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function jadwalPeriksas()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal_periksa', 'id');
    }

    public function detailPeriksas()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa', 'id');
    }

    public function periksas()
    {
        return $this->hasOne(Periksa::class, 'id_janji_periksa', 'id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->whereHas('pasien', function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%');
            })
        );
    }
}
