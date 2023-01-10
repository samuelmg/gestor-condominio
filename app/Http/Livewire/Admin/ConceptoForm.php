<?php

namespace App\Http\Livewire\Admin;

use App\Models\Concepto;
use Livewire\Component;

class ConceptoForm extends Component
{
    public $conceptoId, $concepto, $estimado;
    public $isModalOpen;
    public $cuentaId;

    protected $rules = [
        'concepto' => 'required|min:2|max:255',
        'estimado' => 'numeric',
    ];

    public function mount($cuentaId)
    {
        $this->cuentaId = $cuentaId;
    }

    public function render()
    {
        return view('livewire.admin.concepto-form');
    }

    public function save()
    {
        $this->validate();

        if(empty($this->conceptoId)) {
            $concepto = new Concepto;
            $concepto->cuenta_id = $this->cuentaId;
        } else  {
            $concepto = Concepto::find($this->conceptoId);
        }

        $concepto->concepto = $this->concepto;
        $concepto->estimado = $this->estimado ?? 0;
        $concepto->save();

        $this->resetFormInput();
        $this->isModalOpen = false;
        $this->emit('conceptoGuardado');
    }

    private function resetFormInput()
    {
        $this->conceptoId = null;
        $this->concepto = '';
        $this->estimado = '';
    }
}
