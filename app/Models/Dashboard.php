<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    // Specify the table associated with the model (optional if the table name is plural of the model name)
    protected $table = 'dashboard';

    // Specify the primary key if it's not the default 'id'
    protected $primaryKey = 'id';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'sisa',
        'terima',
    ];
}