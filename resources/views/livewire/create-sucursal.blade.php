<div>

    <input wire:model.live='buscador' type="text" class="form-control ml-4 rounded-lg" placeholder="Busqueda">

    <x-button class="mt-4 mb-4 ml-4" wire:click="set('mAdd', true)">Agregar Sucursal</x-button>
    
    @if ($mAdd)
    <div class="z-50 bg-gray-800 bg-opacity-25 fixed inset-0 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg max-w-lg w-full p-6">
            <div class="py-12">
                <div class="bg-white shadow rounded-lg p-6">
                    <form class="max-w-sm mx-auto" wire:submit='enviar'>
                        <div class="mb-4"><span>Crear nueva sucursal:</span></div>
                        <div></div>

                        <x-label for="nombre" value="Nombre"/>
                        <x-input name="nombre" wire:model='nombre'/>

                        <x-label for="direccion" value="Direccion" />
                        <x-input name="direccion" wire:model='direccion'/><br>

                        <x-label for="telefono" value="Telefono" />
                        <x-input name="telefono" wire:model='telefono' type="number"/><br>

                        <x-button wire:click="set('mAdd', false)" class="mt-2">Guardar</x-button>
                        <x-danger-button class="mt-2" wire:click="set('mAdd', false)">Cancelar</x-danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto text-sm text-left text-gray-500 dark:text-gray-400 text-center">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Direccion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Telefono
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sucursales as $sucursal)  
                    <tr class="bg-white text-ceter border-b dark:bg-gray-800 dark:border-gray-700" wire:key="{{ $sucursal->id }}">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $sucursal->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $sucursal->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $sucursal->direccion }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $sucursal->telefono }}
                        </td>
                        <td class="px-6 flex space-x-2 py-4">
                            <x-button wire:click='editar({{ $sucursal->id }})'>Editar</x-button>
                            <x-danger-button wire:click='eliminar({{ $sucursal }})'>Eliminar</x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-3 pagination-container">
            {{ $sucursales->links() }}
        </div>
    </div>

    @if ($mEdit)
    <div class="z-50 bg-gray-800 bg-opacity-25 fixed inset-0 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg max-w-lg w-full p-6">
            <div class="py-12">
                <div class="bg-white shadow rounded-lg p-6">
                    <form class="max-w-lg mx-auto" wire:submit='update'>
                        <div class="mb-4"><span>Editar Sucursal:</span></div>

                        <x-label for="nombre" value="Nombre"/>
                        <x-input name="nombre" wire:model='sucursalEdit.nombre'/>

                        <x-label for="direccion" value="Direccion" />
                        <x-input name="direccion" wire:model='sucursalEdit.direccion'/><br>

                        <x-label for="telefono" value="Telefono" />
                        <x-input name="telefono" wire:model='sucursalEdit.telefono' type="number"/><br>

                        <x-danger-button class="mt-2" wire:click="set('mEdit', false)">Cancelar</x-danger-button>
                        <x-button class="mt-2">Actualizar</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
