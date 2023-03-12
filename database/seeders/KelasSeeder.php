<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_kelas' => 'X-TKJ'],
            ['nama_kelas' => 'X-TKRO'],
            ['nama_kelas' => 'X-PBS'],
            ['nama_kelas' => 'XI-TKJ'],
            ['nama_kelas' => 'XI-TKRO'],
            ['nama_kelas' => 'XI-PBS'],
            ['nama_kelas' => 'XII-TKJ'],
            ['nama_kelas' => 'XII-TKRO'],
            ['nama_kelas' => 'XII-PBS'],
  
        ];
        foreach ($data as $key => $value) {
            Kelas::create($value);
        }
    }
}
