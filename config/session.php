<?php

use Illuminate\Support\Str;

return [

    'driver' => env('SESSION_DRIVER', 'database'), // Ubah sesuai kebutuhan

    'lifetime' => 120, // Set session lifetime to 12 hours
    
    'expire_on_close' => false, // Keep session active even after closing the browser

    'encrypt' => env('SESSION_ENCRYPT', false), // Enkripsi data session

    'files' => storage_path('framework/sessions'), // Lokasi file session

    'connection' => env('SESSION_CONNECTION'), // Koneksi database untuk driver database atau redis

    'table' => env('SESSION_TABLE', 'sessions'), // Tabel untuk menyimpan session jika menggunakan driver database

    'store' => env('SESSION_STORE'), // Store cache untuk session

    'lottery' => [2, 100], // Peluang untuk membersihkan session yang sudah usang

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ), // Nama cookie session

    'path' => env('SESSION_PATH', '/'), // Path cookie session

    'domain' => env('SESSION_DOMAIN'), // Domain cookie session

    'secure' => env('SESSION_SECURE_COOKIE', false), // Hanya kirim cookie jika menggunakan HTTPS

    'http_only' => env('SESSION_HTTP_ONLY', true), // Hanya dapat diakses melalui HTTP

    'same_site' => env('SESSION_SAME_SITE', 'lax'), // Pengaturan Same-Site untuk cookie

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false), // Apakah menggunakan cookies terpartisi

];