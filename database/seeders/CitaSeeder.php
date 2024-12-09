<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cita;
use App\Models\User;
use App\Models\Horario;

class CitaSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $horarios = Horario::where('disponible', true)->get();

        foreach ($users as $user) {
            Cita::create([
                'user_id' => $user->id,
                'horario_id' => $horarios->random()->id,
                'descripcion' => 'Consulta general',
                'estado' => 'confirmada',
            ]);
        }
    }
}

