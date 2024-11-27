<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'cafes';
    protected $primaryKey = 'id_cafe';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama_cafe',
        'foto_cafe',
        'alamat',
        'range_harga',
        'jam_buka',
        'jam_tutup',
        'kecepatan_wifi',
        'kategori_cafe', // Mood atau Agenda
        'nama_kategori', // Nama mood atau agenda
        'id_mood',       // ID mood
        'id_agenda',     // ID agenda
    ];

    /**
     * Relasi dengan model Mood
     * (Jika kategori adalah mood)
     */
    public function mood()
    {
        return $this->belongsTo(Mood::class, 'id_mood', 'id_mood');
    }

    /**
     * Relasi dengan model Agenda
     * (Jika kategori adalah agenda)
     */
    public function agenda()
    {
        return $this->belongsTo(Agenda::class, 'id_agenda', 'id_agenda');
    }
}
