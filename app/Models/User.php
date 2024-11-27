<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash; // Pastikan untuk mengimpor class Hash

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false; // Atur sesuai kebutuhan, jika ada timestamp di DB, set ini ke true

    // Menambahkan 'role' ke dalam daftar $fillable agar bisa diisi secara massal
    protected $fillable = [
        'fullname',
        'username',
        'password',
        'role', // Menambahkan kolom 'role'
    ];

    // Menyembunyikan password agar tidak ter-ekspor saat mengambil data pengguna
    protected $hidden = [
        'password',
    ];

    // Mutator untuk hashing password sebelum disimpan
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value); // Gunakan Hash::make untuk enkripsi password yang lebih baik dan aman
    }

    // Mutator untuk men-set role, jika dibutuhkan. Misalnya, set default role sebagai 'user'
    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = $value ?: 'user'; // Default ke 'user'
    }
}
