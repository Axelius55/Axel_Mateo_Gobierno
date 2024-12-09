<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Horario;
use App\Models\Sucursal;
use Carbon\Carbon;

class HorarioSeeder extends Seeder
{
    public function run()
    {
        $sucursales = Sucursal::all();

        foreach ($sucursales as $sucursal) {
            for ($i = 0; $i < 5; $i++) {
                Horario::create([
                    'sucursal_id' => $sucursal->id,
                    'fecha' => Carbon::now()->addDays($i)->toDateString(),
                    'hora_inicio' => '08:00:00',
                    'hora_fin' => '10:00:00',
                    'disponible' => true,
                ]);
            }
        }
    }
}

