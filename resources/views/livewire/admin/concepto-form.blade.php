<div x-data="{ isModalOpen: @entangle('isModalOpen') }">
    <button
        @click="openModal('modal-concepto-form')"
        class="flex items-center justify-between px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        aria-label="Like"
        >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
    </button>
    <x-modal
        title="Formulario Concepto"
        modalId="modal-concepto-form"
        >
        <form wire:submit.prevent="save" method="POST">
            <x-form.input
                wire:model.defer="concepto"
                label="Concepto"
                name="concepto"
                placeholder="Nombre del concepto"
                required
                />
            <x-form.input
                wire:model.defer="estimado"
                label="Monto total a recaudar"
                name="estimado"
                wire:model.lazy="estimado"
                placeholder="$"
                />
        </form>
        <x-slot:footer>
            <x-form.submit wire:click="save" texto="Guardar"/>
        </x-slot:footer>
    </x-modal>
</div>
