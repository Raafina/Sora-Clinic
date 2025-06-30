<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkup extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'id_janji_periksa',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
    ];

    protected $casts = [
        'tgl_periksa' => 'datetime',
    ];

    public function checkupAppointment()
    {
        return $this->belongsTo(CheckupAppointment::class, 'id_janji_periksa', 'id');
    }

    public function checkupDetails()
    {
        return $this->hasMany(CheckupDetail::class, 'id_periksa');
    }
}
