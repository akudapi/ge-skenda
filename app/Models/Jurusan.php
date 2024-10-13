<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'jurusan',
    ];

    // Relasi ke model Poin
    public function poin()
    {
        return $this->hasMany(Poin::class, 'jurusans_id');
    }
}
