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
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function checkupSchedule()
    {
        return $this->belongsTo(CheckupSchedule::class, 'id_jadwal_periksa', 'id');
    }

    public function checkupDetails()
    {
        return $this->hasMany(CheckupDetail::class, 'id_periksa', 'id');
    }

    public function checkup()
    {
        return $this->hasOne(Checkup::class, 'id_janji_periksa', 'id');
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
