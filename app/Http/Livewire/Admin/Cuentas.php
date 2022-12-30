<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cuenta;
use Livewire\Component;

class Cuentas extends Component
{
    public $cuentas;

    // Variables para creación de nueva cuenta
    public $cuentaId, $cuenta, $ingreso, $egreso, $clave;

    public $isModalOpen;
    public $updateMode = false;

    protected $rules = [
        'cuenta' => 'required|min:2|max:255',
        'clave' => 'max:50',
        'ingreso' => 'required_without:egreso',
        'egreso' => 'required_without:ingreso',
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

        if(empty($this->cuentaId)) {
            $cuenta = new Cuenta;
        } else  {
            $cuenta = Cuenta::find($this->cuentaId);
        }

        $cuenta->condominio_id = session('condominio_id');
        $cuenta->cuenta = $this->cuenta;
        $cuenta->ingreso = $this->ingreso ?? 0;
        $cuenta->egreso = $this->egreso ?? 0;
        $cuenta->clave = $this->clave ?? '';
        $cuenta->save();

        $this->resetFormInput();
        $this->isModalOpen = false;
        $this->cuentas = Cuenta::all();
    }

    public function edit(Cuenta $cuenta)
    {
        $this->updateMode = true;
        $this->cuentaId = $cuenta->id;
        $this->cuenta = $cuenta->cuenta;
        $this->ingreso = $cuenta->ingreso;
        $this->egreso = $cuenta->egreso;
        $this->clave = $cuenta->clave;
        $this->isModalOpen = true;
    }

    private function resetFormInput()
    {
        $this->cuentaId = null;
        $this->cuenta = '';
        $this->ingreso = '';
        $this->egreso = '';
        $this->clave = '';
    }
}
