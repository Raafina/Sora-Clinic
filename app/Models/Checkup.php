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
        'id_checkup_appointment',
        'checkup_date',
        'note',
        'checkup_fee',
    ];

    protected $casts = [
        'checkup_date' => 'datetime',
    ];

    public function checkupAppointment()
    {
        return $this->belongsTo(CheckupAppointment::class, 'id_checkup_appointment', 'id');
    }

    public function checkupDetails()
    {
        return $this->hasMany(CheckupDetail::class, 'id_checkup');
    }
}
