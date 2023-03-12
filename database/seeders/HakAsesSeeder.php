<?php

namespace Database\Seeders;

use App\Models\HakAkses;
use Illuminate\Database\Seeder;

class HakAsesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_hak_akses'=>'admin'],
            ['nama_hak_akses'=>'guru'],
            ['nama_hak_akses'=>'siswa'],
            ['nama_hak_akses'=>'mitra'],
        ];
        foreach ($data as $key => $value) {
            HakAkses::create($value);
        }
    }
    
}
