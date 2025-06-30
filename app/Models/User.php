<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'username',
        'email',
        'alamat',
        'no_ktp',
        'no_hp',
        'no_rm',
        'poli',
        'role',
        'password',
        'id_poli'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function checkupAppointments()
    {
        return $this->hasMany(CheckupAppointment::class, 'id_pasien', 'id');
    }

    public function checkupSchedules()
    {
        return $this->hasMany(CheckupSchedule::class, 'id_dokter', 'id');
    }

    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class, 'id_poli', 'id');
    }

    public function patientConsultations()
    {
        return $this->hasMany(Consultation::class, 'id_user_pasien', 'id');
    }

    public function doctorConsultations()
    {
        return $this->hasMany(Consultation::class, 'id_user_dokter', 'id');
    }
    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('nama', 'like', '%' . $search . '%')
        );
    }
}
