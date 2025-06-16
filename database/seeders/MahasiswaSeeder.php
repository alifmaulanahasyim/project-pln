<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("mahasiswas")->insert([
            'email'=> 'alif@gmail.com',
            'nama'=> 'alif',
            'jeniskelamin'=> 'Laki-Laki',
            'nama_institusi'=> 'Polmed',
            'nim'=> '2205102037',
            'jurusan'=> 'teknik komputer',
            'semester'=> '6',
            'alasan'=> 'keren aja',
            'divisi'=> 'divisi1',
            'linkfoto'=> 'wwww',
            'linksurat'=> 'wwww3',
        ]);
    }
}
