<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanHarian extends Model
{
    protected $fillable = ['user_id', 'mahasiswa_nim', 'tanggal', 'kegiatan'];
    protected $casts = [
        'tanggal' => 'date',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nim', 'nim');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
