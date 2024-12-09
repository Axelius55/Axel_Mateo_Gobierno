<?php

namespace App\Livewire;

use App\Models\Horario;
use App\Models\Sucursal;
use Livewire\Component;
use Livewire\WithPagination;

class CreateHorario extends Component
{

    use WithPagination;

    public $fecha, $hora_inicio, $hora_fin, $disponible = '', $sucursal_id = '';

    public $buscador = '';
    public $mEdit = false;
    public $mAdd = false;

    public $idEditable;
    public $horarioEdit = [
        'id' => '',
        'fecha' => '',
        'hora_inicio' =>'',
        'hora_fin' =>'',
        'disponible' =>'',
        'sucursal_id' =>'',
    ];

    public $sucursales;

    public function mount(){
        $this->sucursales = Sucursal::all();
    }

    public function render()
    {
        $horarios = Horario::where('fecha','like','%'.$this->buscador.'%')
        ->orderBy('id', 'asc')->paginate(5);

        return view('livewire.create-horario', compact('horarios'));
    }

    public function enviar(){
        $horario = new Horario();
        $horario->fecha = $this->fecha;
        $horario->hora_inicio = $this->hora_inicio;
        $horario->hora_fin = $this->hora_fin;
        $horario->disponible = $this->disponible;
        $horario->sucursal_id = $this->sucursal_id;
        $horario->save();
        $this->reset(['fecha', 'hora_inicio', 'hora_fin', 'disponible', 'sucursal_id']);
    }

    public function editar($horarioID){
        $this->mEdit = true;
        $horarioEditable = Horario::find($horarioID);
        $this->idEditable = $horarioEditable->id;
        $this->horarioEdit['fecha'] = $horarioEditable->fecha;
        $this->horarioEdit['hora_inicio'] = $horarioEditable->hora_inicio;
        $this->horarioEdit['hora_fin'] = $horarioEditable->hora_fin;
        $this->horarioEdit['disponible'] = $horarioEditable->disponible;
        $this->horarioEdit['sucursal_id'] = $horarioEditable->sucursal_id;
    }

    public function update(){
        $horario = Horario::find($this->idEditable);
        $horario->update([
            'fecha' => $this->horarioEdit['fecha'],
            'hora_inicio' => $this->horarioEdit['hora_inicio'],
            'hora_fin' => $this->horarioEdit['hora_fin'],
            'disponible' => $this->horarioEdit['disponible'],
            'sucursal_id' => $this->horarioEdit['sucursal_id'],
        ]);

        $this->reset([
            'horarioEdit',
            'idEditable',
            'mEdit',
            'mAdd'
        ]);
    }

    public function eliminar(Horario $horario){
        $horario->delete();
    }

    public function updated($propertyName){
        if ($propertyName === 'buscador') {
            $this->resetPage();
        }
    }
}
