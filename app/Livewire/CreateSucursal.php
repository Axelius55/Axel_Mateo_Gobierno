<?php

namespace App\Livewire;

use App\Models\Sucursal;
use Livewire\Component;
use Livewire\WithPagination;

class CreateSucursal extends Component
{

    use WithPagination;

    public $nombre, $direccion, $telefono;

    public $buscador = '';
    public $mEdit = false;
    public $mAdd = false;

    public $idEditable;
    public $sucursalEdit = [
        'id' => '',
        'nombre' => '',
        'direccion' =>'',
        'telefono' =>'',
    ];

    public function render()
    {
        $sucursales = Sucursal::where('nombre','like','%'.$this->buscador.'%')
        ->orderBy('id', 'asc')->paginate(5);

        return view('livewire.create-sucursal', compact('sucursales'));
    }

    public function enviar(){
        $sucursal = new Sucursal();
        $sucursal->nombre = $this->nombre;
        $sucursal->direccion = $this->direccion;
        $sucursal->telefono = $this->telefono;
        $sucursal->save();
        $this->reset(['nombre', 'telefono', 'direccion']);
    }

    public function editar($sucursalID){
        $this->mEdit = true;
        $sucursalEditable = Sucursal::find($sucursalID);
        $this->idEditable = $sucursalEditable->id;
        $this->sucursalEdit['nombre'] = $sucursalEditable->nombre;
        $this->sucursalEdit['direccion'] = $sucursalEditable->direccion;
        $this->sucursalEdit['telefono'] = $sucursalEditable->telefono;
    }

    public function update(){
        $sucursal = Sucursal::find($this->idEditable);
        $sucursal->update([
            'nombre' => $this->sucursalEdit['nombre'],
            'direccion' => $this->sucursalEdit['direccion'],
            'telefono' => $this->sucursalEdit['telefono'],
        ]);

        $this->reset([
            'sucursalEdit',
            'idEditable',
            'mEdit',
            'mAdd'
        ]);
    }

    public function eliminar(Sucursal $sucursal){
        $sucursal->delete();
    }

    public function updated($propertyName){
        if ($propertyName === 'buscador') {
            $this->resetPage();
        }
    }
}
