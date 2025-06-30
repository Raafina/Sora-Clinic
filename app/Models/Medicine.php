<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];

    public function checkupDetail()
    {
        $this->hasMany(CheckupDetail::class, 'id_obat', 'id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('nama_obat', 'like', '%' . $search . '%')
        );
    }
}
