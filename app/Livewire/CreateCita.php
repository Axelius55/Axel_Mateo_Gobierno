<?php

namespace App\Livewire;

use App\Models\Cita;
use App\Models\Horario;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CreateCita extends Component
{

    use WithPagination;

    public $descripcion, $estado = '', $user_id = '', $horario_id = '';

    public $buscador = '';
    public $mEdit = false;
    public $mAdd = false;

    public $idEditable;
    public $citaEdit = [
        'id' => '',
        'descripcion' => '',
        'estado' =>'',
        'user_id' =>'',
        'horario_id' =>'',
    ];

    public $users, $horarios;

    public function mount(){
        $this->users = User::all();
        $this->horarios = Horario::all();
    }

    public function render()
    {
        $citas = Cita::where('descripcion','like','%'.$this->buscador.'%')
        ->orderBy('id', 'asc')->paginate(5);

        return view('livewire.create-cita', compact('citas'));
    }

    public function enviar(){
        $cita = new Cita();
        $cita->descripcion = $this->descripcion;
        $cita->estado = $this->estado;
        $cita->user_id = $this->user_id;
        $cita->horario_id = $this->horario_id;
        $cita->save();
        $this->reset(['descripcion', 'estado', 'user_id', 'horario_id']);
    }

    public function editar($citaID){
        $this->mEdit = true;
        $citaEditable = Cita::find($citaID);
        $this->idEditable = $citaEditable->id;
        $this->citaEdit['descripcion'] = $citaEditable->descripcion;
        $this->citaEdit['estado'] = $citaEditable->estado;
        $this->citaEdit['user_id'] = $citaEditable->user_id;
        $this->citaEdit['horario_id'] = $citaEditable->horario_id;
    }

    public function update(){
        $cita = Cita::find($this->idEditable);
        $cita->update([
            'descripcion' => $this->citaEdit['descripcion'],
            'estado' => $this->citaEdit['estado'],
            'user_id' => $this->citaEdit['user_id'],
            'horario_id' => $this->citaEdit['horario_id'],
        ]);

        $this->reset([
            'citaEdit',
            'idEditable',
            'mEdit',
            'mAdd'
        ]);
    }

    public function eliminar(Horario $cita){
        $cita->delete();
    }

    public function updated($propertyName){
        if ($propertyName === 'buscador') {
            $this->resetPage();
        }
    }
}
