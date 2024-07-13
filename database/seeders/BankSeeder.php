<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank')->insert([
            'nama_bank' => 'Bank Central Asia (BCA)'
        ]);

        DB::table('bank')->insert([
            'nama_bank' => 'Bank Mandiri'
        ]);

        DB::table('bank')->insert([
            'nama_bank' => 'Bank Negara Indonesia (BNI)'
        ]);

        DB::table('bank')->insert([
            'nama_bank' => 'Bank Rakyat Indonesia (BRI)'
        ]);

        DB::table('bank')->insert([
            'nama_bank' => 'Bank Syariah Indonesia (BSI)'
        ]);
    }
}
