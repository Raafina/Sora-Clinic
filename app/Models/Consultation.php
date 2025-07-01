<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultation extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id_user_patient', 'id_user_doctor', 'subjek', 'pertanyaan', 'jawaban'];

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_user_doctor', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'id_user_patient', 'id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('subjek', 'like', '%' . $search . '%')
        );
    }
}
