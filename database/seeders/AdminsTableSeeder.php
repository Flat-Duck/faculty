<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::factory()->create([
            'email' => 'admin@test.com',
            'username' => 'admin',
            'is_active'=>true,
            'password' => bcrypt('123456'),
        ]);

        \App\Models\Admin::factory()->create([
            'email' => 'ibraheem@test.com',
            'username' => 'ibraheem',
            'is_active'=>true,
            'password' => bcrypt('123456'),
        ]);
            
        \App\Models\Admin::factory()->create([
            'email' => 'anisa@test.com',
            'username' => 'anisa',
            'is_active'=>true,
            'password' => bcrypt('123123123'),
        ]);
    }
}
