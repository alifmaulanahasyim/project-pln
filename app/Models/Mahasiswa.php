<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas'; // Name of the table in the database

    protected $guarded = []; // All columns are mass assignable

    protected $dates = ['created_at', 'updated_at']; // Date columns

    protected $primaryKey = 'nim'; // NIM as the primary key
    public $incrementing = false; // NIM is not auto-incrementing
    protected $keyType = 'string'; // If NIM is a string
protected $casts = [
    'sertifikat_dikirim' => 'array',
];
    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
public function laporanHarian()
{
    return $this->hasMany(LaporanHarian::class, 'mahasiswa_nim', 'nim');
}
    // Define the relationship with the Histori model
    

    // You can also define any other relationships or custom methods here
}