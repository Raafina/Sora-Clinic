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
        'id_dokter',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'id_dokter', 'id');
    }

    public function checkupAppointments()
    {
        return $this->hasMany(CheckupAppointment::class, 'id_jadwal_periksa', 'id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('hari', 'like', '%' . $search . '%')
        );
    }
}
