<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckupAppointment extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'id_patient');
    }

    public function checkupSchedule()
    {
        return $this->belongsTo(CheckupSchedule::class, 'id_checkup_schedule', 'id');
    }

    public function checkupDetails()
    {
        return $this->hasMany(CheckupDetail::class, 'id_checkup', 'id');
    }

    public function checkup()
    {
        return $this->hasOne(Checkup::class, 'id_checkup_appointment', 'id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->whereHas('patient', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
        );
    }
}
