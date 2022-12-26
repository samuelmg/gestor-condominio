<x-app-layout header="{{ isset($persona) ? 'Editar' : 'Agregar' }} Vecino">
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        @isset($persona)
            <form action="{{ route('vecinos.update', $persona) }}" method="POST">
            @method('PATCH')
        @else
            <form action="{{ route('vecinos.store') }}" method="POST">
        @endisset
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Nombre de la persona"
                    name="nombre"
                    value="{{ old('nombre') ?? (isset($persona) ? $persona->nombre : '') }}"
                />
                @error('nombre')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <label class="mt-4 block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Teléfono Celular</span>
                <input
                    type="tel"
                    pattern="[0-9]{10}"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Teléfono a 10 dígitos"
                    name="tel_celular"
                    value="{{ old('tel_celular') ?? (isset($persona) ? $persona->tel_celular : '') }}"
                    />
                @error('tel_celular')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <label class="mt-4 block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Teléfono Fijo</span>
            <input
                type="tel"
                pattern="[0-9]{10}"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="(Opcional)"
                name="tel_fijo"
                value="{{ old('tel_fijo') ?? (isset($persona) ? $persona->tel_fijo : '') }}"
                />
                @error('tel_fijo')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Número de Vivienda
                </span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="vivienda_id"
                    >
                    @foreach ($viviendas as $vivienda)
                        <option value="{{ $vivienda->id }}" @selected( (old('vivienda_id') == $vivienda->id) || (isset($persona) ? $vivienda->id == $persona->viviendas->first()->id : false))>{{ $vivienda->numero }}</option>
                    @endforeach
                </select>
                @error('vivienda_id')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Tipo
                </span>
                <div class="mt-2">
                    <label
                    class="inline-flex items-center text-gray-600 dark:text-gray-400"
                    >
                    <input
                        type="radio"
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="tipo"
                        value="Inquilino"
                        @checked((old('tipo') == 'Inquilino') || (isset($persona) ? $persona->viviendas[0]->pivot->tipo == 'Inquilino' : false))
                    />
                    <span class="ml-2">Inquilino</span>
                    </label>
                    <label
                    class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                    >
                    <input
                        type="radio"
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="tipo"
                        value="Dueño"
                        @checked((old('tipo') == 'Dueño') || (isset($persona) ? $persona->viviendas[0]->pivot->tipo == 'Dueño' : false))
                    />
                    <span class="ml-2">Dueño</span>
                    </label>
                </div>
                @error('tipo')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <input type="submit" class="px-4 mt-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" value="Guardar">
        </form>
    </div>
</x-app-layout>