<?php

namespace Database\Seeders;

use App\Models\Condominio;
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
        Condominio::factory()->count(10)->create();
    }
}
