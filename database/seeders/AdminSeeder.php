<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'admin_name' => 'Tata Nofera',
            'username' => 'admin_tata',
            'password' => Hash::make('semangat'),
            'admin_address' => 'Jl. Goa Gong',
            'phone' => '085792306926'
        ]);
    }
}
