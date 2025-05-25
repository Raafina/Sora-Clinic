<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPeriksa extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPeriksaFactory> */
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];

    public function janji_periksa()
    {
        return $this->belongsTo(JanjiPeriksa::class, 'id_periksa', 'id');
    }

    public function obat()
    {
        return $this->belongsTo(DetailPeriksa::class, 'id_obat', 'id');
    }
}
