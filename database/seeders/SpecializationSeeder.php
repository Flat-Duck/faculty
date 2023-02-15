<?php
namespace Database\Seeders;



use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Specialization::class)->create([
            'name'=> 'حاسب الي'
        ]);
    }
}
