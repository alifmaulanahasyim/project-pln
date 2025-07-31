<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanHarian extends Model
{
     protected $table = 'laporan_harian'; // Ganti sesuai nama tabel di database Anda
    protected $fillable = ['user_id', 'mahasiswa_nim', 'kegiatan'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nim', 'nim');
            return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nim', 'nim');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    
}
