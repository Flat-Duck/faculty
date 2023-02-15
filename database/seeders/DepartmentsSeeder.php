<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Department::class)->create([
            'name'=> 'حاسب الي'
        ]);
    }
}
