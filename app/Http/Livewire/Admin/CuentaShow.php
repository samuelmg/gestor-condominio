<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cuenta;
use Livewire\Component;

class CuentaShow extends Component
{
    public $cuenta;
    public $conceptos;

    public function mount(Cuenta $cuenta)
    {
        $this->cuenta = $cuenta;
        $this->conceptos = $cuenta->conceptos;
    }

    public function render()
    {
        return view('livewire.admin.cuenta-show')->layoutData(['header' => 'Detalle de Cuenta: ' . $this->cuenta->cuenta]);
    }
}
