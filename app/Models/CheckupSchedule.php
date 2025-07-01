<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckupSchedule extends Model
{
    use SoftDeletes;
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'id_doctor',
        'day',
        'start_time',
        'end_time',
        'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'id_doctor', 'id');
    }

    public function checkupAppointments()
    {
        return $this->hasMany(CheckupAppointment::class, 'id_checkup_schedule', 'id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('day', 'like', '%' . $search . '%')
        );
    }
}
