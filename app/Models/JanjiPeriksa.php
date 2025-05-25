<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JanjiPeriksa extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPeriksaFactory> */
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pasien', 'id');
    }

    public function jadwal_periksa()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal', 'id');
    }

    public function detail_periksa()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa', 'id');
    }

    public function periksa()
    {
        return $this->hasOne(Periksa::class, 'id_janji_periksa', 'id');
    }
}
