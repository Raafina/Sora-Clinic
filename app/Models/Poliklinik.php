<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class poliklinik extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_poli', 'id');
    }
}
