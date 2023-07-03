<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrays = range(0,20);
        foreach ($arrays as $valor) {

        DB::table('emails')->insert([
            'email_address' => Str::random(10).'@uvp.edu.mx',
            'rfc' => Str::random(13),
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'password' => Hash::make('password'),
        ]);

    }
    }
}
