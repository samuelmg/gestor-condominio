<?php

namespace Database\Seeders;

use App\Models\Condominio;
use App\Models\Cuenta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuentaSeeder extends Seeder
{
    private $cuentasDefault = [
        [
            'cuenta' => 'Aportaciones',
            'ingreso' => 1,
            'egreso' => 0,
        ],
        [
            'cuenta' => 'Recargos',
            'ingreso' => 1,
            'egreso' => 0,
        ],
        [
            'cuenta' => 'Mantenimiento',
            'ingreso' => 0,
            'egreso' => 1,
        ],
        [
            'cuenta' => 'Reparación',
            'ingreso' => 0,
            'egreso' => 1,
        ],
        [
            'cuenta' => 'Mejora',
            'ingreso' => 0,
            'egreso' => 1,
        ],
        [
            'cuenta' => 'Difusión',
            'ingreso' => 0,
            'egreso' => 1,
        ],
        [
            'cuenta' => 'Oficina',
            'ingreso' => 0,
            'egreso' => 1,
        ],
        [
            'cuenta' => 'Legal',
            'ingreso' => 0,
            'egreso' => 1,
        ],
        [
            'cuenta' => 'Equipo',
            'ingreso' => 0,
            'egreso' => 1,
        ],
    ];

    /**
     * Agregará cuentas default a los condominios existentes
     *
     * @return void
     */
    public function run()
    {
        $condominiosIDs = Condominio::pluck('id');
        foreach ($condominiosIDs as $idCondominio) {
            foreach ($this->cuentasDefault as $cuenta) {
                Cuenta::create(['condominio_id' => $idCondominio] + $cuenta);
            }
        }
    }
}
