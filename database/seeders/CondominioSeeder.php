<?php

namespace Database\Seeders;

use App\Models\Condominio;
use App\Models\User;
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
            ->has(User::factory())
            ->has(Vivienda::factory()->count(30))
            ->count(5)
            ->create();
    }
}
