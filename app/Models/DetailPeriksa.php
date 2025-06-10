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

    protected $fillable = [
        'id_periksa',
        'id_obat'
    ];

    public function periksa()
    {
        return $this->belongsTo(Periksa::class, 'id_periksa', 'id');
    }

    public function obats()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }
}
