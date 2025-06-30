<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckupDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'id_periksa',
        'id_obat'
    ];

    public function checkup()
    {
        return $this->belongsTo(Checkup::class, 'id_periksa', 'id');
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'id_obat', 'id');
    }
}
