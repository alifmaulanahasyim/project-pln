<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash; // Import Hash facade for password hashing

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins'; // Change this to 'admins' to match the migration

    protected $fillable = [
        'username',
        'password',
    ];

    // Mutator to hash the password before saving
    public function setPasswordAttribute($value)
    {
        // Only hash the password if it is being set (not when updating)
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    // Optional: Method to verify the password
    public function verifyPassword($password)
    {
        return Hash::check($password, $this->attributes['password']);
    }
    
}