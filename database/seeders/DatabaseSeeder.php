<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CovidCasesMalaysiaTableSeeder::class);
        $this->call(CovidCasesStatesTableSeeder::class);
        $this->call(CovidClustersTableSeeder::class);
        $this->call(CovidDeathsMalaysiaTableSeeder::class);
        $this->call(CovidDeathsStatesTableSeeder::class);
        $this->call(CovidHospitalsTableSeeder::class);
        $this->call(CovidIcusTableSeeder::class);
        $this->call(CovidPKRCTableSeeder::class);
        $this->call(CovidPopulationsTableSeeder::class);
        $this->call(CovidTestMalaysiaTableSeeder::class);
        $this->call(CovidTestStatesTableSeeder::class);
        $this->call(VaxVaxMalaysiasTableSeeder::class);
        $this->call(VaxVaxRegMalaysiasTableSeeder::class);
        $this->call(VaxVaxRegStatesTableSeeder::class);
        $this->call(VaxVaxStatesTableSeeder::class);
    }
}
