<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cuenta;
use Livewire\Component;

class Cuentas extends Component
{
    public $cuentas;
    
    public function mount()
    {
        $this->cuentas = Cuenta::all();
    }

    public function render()
    {
        return view('livewire.admin.cuentas')->layoutData(['header' => 'Administración de Cuentas']);
    }
}
