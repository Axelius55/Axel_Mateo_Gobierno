<div>

    <input wire:model.live='buscador' type="text" class="form-control ml-4 rounded-lg" placeholder="Busqueda">

    <x-button class="mt-4 mb-4 ml-4" wire:click="set('mAdd', true)">Agregar Horario</x-button>
    @if ($mAdd)
    <div class="z-50 bg-gray-800 bg-opacity-25 fixed inset-0 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg max-w-lg w-full p-6">
            <div class="py-12">
                <div class="bg-white shadow rounded-lg p-6">
                    <form class="max-w-sm mx-auto" wire:submit='enviar'>
                        <div class="mb-4"><span>Crear nuevo horario:</span></div>
                        <div></div>

                        <x-label for="fecha" value="Fecha"/>
                        <x-input name="fecha" wire:model='fecha' type="date"/>

                        <x-label for="hora_inicio" value="Hora de Inicio" />
                        <x-input name="hora_inicio" wire:model='hora_inicio' type="time"/><br>

                        <x-label for="hora_fin" value="Hora Final" />
                        <x-input name="hora_fin" wire:model='hora_fin' type="time"/><br>
                        
                        <x-label for="disponible" value="Disponibilidad" />
                        <x-input name="disponible" wire:model='disponible' type="checkbox"/><br>
                        
                        <x-label for="sucursal_id" value="Sucursal"/>
                        <select wire:model='sucursal_id' class="block w-full mb-3 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                            <option value="" selected disabled>Seleccione una opcion</option>
                            @foreach ($sucursales as $sucursal)
                                <option wire:key='{{ $sucursal->id }}' value="{{ $sucursal->id }}">{{ $sucursal->nombre}}</option>
                            @endforeach
                        </select>

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
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora de Inicio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora Final
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Disponibilidad
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Sucursal
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horarios as $horario)  
                    <tr class="bg-white text-ceter border-b dark:bg-gray-800 dark:border-gray-700" wire:key="{{ $horario->id }}">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $horario->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $horario->fecha }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $horario->hora_inicio }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $horario->hora_fin }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $horario->disponible }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $horario->sucursal_id }}
                        </td>
                        <td class="px-6 flex space-x-2 py-4">
                            <x-button wire:click='editar({{ $horario->id }})'>Editar</x-button>
                            <x-danger-button wire:click='eliminar({{ $horario }})'>Eliminar</x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-3 pagination-container">
            {{ $horarios->links() }}
        </div>
    </div>

    @if ($mEdit)
    <div class="z-50 bg-gray-800 bg-opacity-25 fixed inset-0 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg max-w-lg w-full p-6">
            <div class="py-12">
                <div class="bg-white shadow rounded-lg p-6">
                    <form class="max-w-lg mx-auto" wire:submit='update'>
                        <div class="mb-4"><span>Editar Horario:</span></div>

                        <x-label for="fecha" value="Fecha"/>
                        <x-input name="fecha" wire:model='horarioEdit.fecha' type="date"/>

                        <x-label for="hora_inicio" value="Hora de Inicio" />
                        <x-input name="hora_inicio" wire:model='horarioEdit.hora_inicio' type="time"/><br>

                        <x-label for="hora_fin" value="Hora Final" />
                        <x-input name="hora_fin" wire:model='hora_fin' type="time"/><br>
                        
                        <x-label for="disponible" value="Disponibilidad" />
                        <x-input name="disponible" wire:model='horarioEdit.disponible' type="checkbox"/><br>

                        <x-label for="sucursal_id" value="Categoría" />
                        <select wire:model='horarioEdit.sucursal_id' class="block w-full mb-3 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                            <option value="" selected disabled>Seleccione una opción</option>
                            @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                            @endforeach
                        </select>

                        <x-danger-button class="mt-2" wire:click="set('mEdit', false)">Cancelar</x-danger-button>
                        <x-button class="mt-2">Actualizar</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
