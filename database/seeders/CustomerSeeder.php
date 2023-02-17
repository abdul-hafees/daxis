<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Hafees',
                'dob' => '1999-03-25',
                'email' => 'hafees@gmail.com'
            ],
            [
                'name' => 'Danish',
                'dob' => '1997-03-25',
                'email' => 'danish@gmail.com'
            ],
            [
                'name' => 'Nihal',
                'dob' => '2003-03-25',
                'email' => 'nihal@gmail.com'
            ]
        ]);
    }
}
