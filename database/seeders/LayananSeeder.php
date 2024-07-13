<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('layanan')->insert([
            'jenis_layanan' => 'listrik',
            'nama_perusahaan' => 'PLN',
        ]);

        DB::table('layanan')->insert([
            'jenis_layanan' => 'air',
            'nama_perusahaan' => 'PDAM',
        ]);

        DB::table('layanan')->insert([
            'jenis_layanan' => 'pulsa',
            'nama_perusahaan' => 'Telkomsel',
        ]);

        DB::table('layanan')->insert([
            'jenis_layanan' => 'pulsa',
            'nama_perusahaan' => 'XL',
        ]);

        DB::table('layanan')->insert([
            'jenis_layanan' => 'pulsa',
            'nama_perusahaan' => 'Tri',
        ]);

        DB::table('layanan')->insert([
            'jenis_layanan' => 'pulsa',
            'nama_perusahaan' => 'Indosat',
        ]);

        DB::table('layanan')->insert([
            'jenis_layanan' => 'pulsa',
            'nama_perusahaan' => 'Smartfren',
        ]);

        DB::table('layanan')->insert([
            'jenis_layanan' => 'internet',
            'nama_perusahaan' => 'IndiHome',
        ]);

        DB::table('layanan')->insert([
            'jenis_layanan' => 'internet',
            'nama_perusahaan' => 'MyRepublic',
        ]);

        DB::table('layanan')->insert([
            'jenis_layanan' => 'internet',
            'nama_perusahaan' => 'MNC Play',
        ]);
    }
}
