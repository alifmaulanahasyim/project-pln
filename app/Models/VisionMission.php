<?php

// app/Models/VisionMission.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    protected $table = 'vision_mission'; // <--- Add this line

    protected $fillable = ['vision', 'mission'];
}