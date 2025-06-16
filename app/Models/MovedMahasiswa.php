<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovedMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'moved_mahasiswas'; // Name of the table in the database

    protected $guarded = []; // All columns are mass assignable

    protected $primaryKey = 'nim'; // NIM as the primary key
    public $incrementing = false; // NIM is not auto-incrementing
    protected $keyType = 'string'; // If NIM is a string
}