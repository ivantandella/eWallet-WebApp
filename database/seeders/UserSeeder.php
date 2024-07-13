<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ivan Tandella',
            'email' => 'ivantandella@gmail.com',
            'no_hp' => '081381229986',
            'password' => Hash::make('12345678'),
            'saldo' => 1000000,
        ]);

        DB::table('users')->insert([
            'name' => 'Tsabitah Muflihza',
            'email' => 'tsabitah@gmail.com',
            'no_hp' => '08123456789',
            'password' => Hash::make('12345678'),
        ]);
    }
}
