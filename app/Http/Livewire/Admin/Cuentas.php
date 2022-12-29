<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cuenta;
use Livewire\Component;

class Cuentas extends Component
{
    public $cuentas;

    // Variables para creación de nueva cuenta
    public $cuenta, $ingreso, $egreso, $clave;

    protected $rules = [
        'cuenta' => 'required|min:2|max:255',
        'clave' => 'max:50',
        // 'ingreso' => 'required_without:egreso',
        // 'egreso' => 'required_without:ingreso',
    ];
    
    public function mount()
    {
        $this->cuentas = Cuenta::all();
    }

    public function render()
    {
        return view('livewire.admin.cuentas')->layoutData(['header' => 'Administración de Cuentas']);
    }

    public function save()
    {
        $this->validate();
        $nuevaCuenta = new Cuenta;
        $nuevaCuenta->condominio_id = session('condominio_id');
        $nuevaCuenta->cuenta = $this->cuenta;
        $nuevaCuenta->ingreso = $this->ingreso ?? 0;
        $nuevaCuenta->egreso = $this->egreso ?? 0;
        $nuevaCuenta->clave = $this->clave ?? '';
        $nuevaCuenta->save();
        $this->limpiarFormulario();
        $this->hydrate();
    }

    private function limpiarFormulario()
    {
        $this->cuenta = '';
        $this->ingreso = '';
        $this->egreso = '';
        $this->clave = '';
    }
}
