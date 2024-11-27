<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    protected $table = 'cafes';
    protected $primaryKey = 'id_cafe';

    protected $fillable = [
        'nama_cafe',
        'foto_cafe',
        'alamat',
        'range_harga',
        'jam_buka',
        'jam_tutup',
        'kecepatan_wifi',
        'kategori_cafe',
        'nama_kategori',
    ];

    public function kategoriMood()
    {
        return $this->belongsTo(Mood::class, 'nama_kategori', 'nama_kategori_mood');
    }

    public function kategoriAgenda()
    {
        return $this->belongsTo(Agenda::class, 'nama_kategori', 'nama_kategori_agenda');
    }
}

