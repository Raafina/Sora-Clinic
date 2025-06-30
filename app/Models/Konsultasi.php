<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Konsultasi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id_user_pasien', 'id_user_dokter', 'subjek', 'pertanyaan', 'jawaban'];

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_user_dokter', 'id');
    }

    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_user_pasien', 'id');
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
