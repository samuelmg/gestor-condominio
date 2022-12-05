<?php

namespace Database\Seeders;

use App\Models\Condominio;
use App\Models\Vivienda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CondominioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condominio::factory()
            ->has(Vivienda::factory()->count(60))
            ->count(10)
            ->create();
    }
}
