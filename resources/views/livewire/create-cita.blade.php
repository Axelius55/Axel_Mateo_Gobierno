<div>

    <input wire:model.live='buscador' type="text" class="form-control ml-4 rounded-lg" placeholder="Busqueda">

    <x-button class="mt-4 mb-4 ml-4" wire:click="set('mAdd', true)">Agregar Cita</x-button>
    @if ($mAdd)
    <div class="z-50 bg-gray-800 bg-opacity-25 fixed inset-0 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg max-w-lg w-full p-6">
            <div class="py-12">
                <div class="bg-white shadow rounded-lg p-6">
                    <form class="max-w-sm mx-auto" wire:submit='enviar'>
                        <div class="mb-4"><span>Crear nueva cita:</span></div>
                        <div></div>

                        <x-label for="descripcion" value="Descripcion"/>
                        <x-input name="descripcion" wire:model='descripcion'/>

                        <x-label for="estado" value="Estado" />
                        <select name="estado" wire:model='estado' class="block w-full mb-3 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                            <option value="" selected disabled>Seleccione una opcion</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="confirmada">Confirmada</option>
                            <option value="cancelada">Cancelada</option>
                        </select>
                        
                        <x-label for="horario_id" value="Horarios"/>
                        <select wire:model='horario_id' class="block w-full mb-3 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                            <option value="" selected disabled>Seleccione una opcion</option>
                            @foreach ($horarios as $horario)
                                <option wire:key='{{ $horario->id }}' value="{{ $horario->id }}">{{ $horario->id}}</option>
                            @endforeach
                        </select>

                        <x-label for="user_id" value="users"/>
                        <select wire:model='user_id' class="block w-full mb-3 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                            <option value="" selected disabled>Seleccione una opcion</option>
                            @foreach ($users as $user)
                                <option wire:key='{{ $user->id }}' value="{{ $user->id }}">{{ $user->name}}</option>
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
                        Descripcion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Horario
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($citas as $cita)  
                    <tr class="bg-white text-ceter border-b dark:bg-gray-800 dark:border-gray-700" wire:key="{{ $cita->id }}">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $cita->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $cita->descripcion }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cita->estado }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cita->user_id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cita->horario_id }}
                        </td>
                        <td class="px-6 flex space-x-2 py-4">
                            <x-button wire:click='editar({{ $cita->id }})'>Editar</x-button>
                            <x-danger-button wire:click='eliminar({{ $cita }})'>Eliminar</x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-3 pagination-container">
            {{ $citas->links() }}
        </div>
    </div>

    @if ($mEdit)
    <div class="z-50 bg-gray-800 bg-opacity-25 fixed inset-0 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg max-w-lg w-full p-6">
            <div class="py-12">
                <div class="bg-white shadow rounded-lg p-6">
                    <form class="max-w-lg mx-auto" wire:submit='update'>
                        <div class="mb-4"><span>Editar Cita:</span></div>

                        <x-label for="descripcion" value="Descripcion"/>
                        <x-input name="descripcion" wire:model='citaEdit.descripcion'/>

                        <x-label for="estado" value="Estado" />
                        <select name="estado" wire:model='citaEdit.estado' class="block w-full mb-3 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                            <option value="" selected disabled>Seleccione una opcion</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="confirmada">Confirmada</option>
                            <option value="cancelada">Cancelada</option>
                        </select>
                        
                        <x-label for="horario_id" value="Horarios"/>
                        <select wire:model='citaEdit.horario_id' class="block w-full mb-3 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                            <option value="" selected disabled>Seleccione una opcion</option>
                            @foreach ($horarios as $horario)
                                <option wire:key='{{ $horario->id }}' value="{{ $horario->id }}">{{ $horario->id}}</option>
                            @endforeach
                        </select>

                        <x-label for="user_id" value="users"/>
                        <select wire:model='citaEdit.user_id' class="block w-full mb-3 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                            <option value="" selected disabled>Seleccione una opcion</option>
                            @foreach ($users as $user)
                                <option wire:key='{{ $user->id }}' value="{{ $user->id }}">{{ $user->name}}</option>
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
