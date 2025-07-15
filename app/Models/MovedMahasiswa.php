<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovedMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'moved_mahasiswas'; // Name of the table in the database

    protected $guarded = []; // All columns are mass assignable
    protected $primaryKey = 'id'; // Specify the primary key column
    protected $casts = [
    'sertifikat_dikirim' => 'array',
];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}