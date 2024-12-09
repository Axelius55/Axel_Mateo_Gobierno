<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sucursal;

class SucursalSeeder extends Seeder
{
    public function run()
    {
        Sucursal::create(['nombre' => 'Sucursal Centro', 'direccion' => 'Av. Central 123', 'telefono' => '555-1234']);
        Sucursal::create(['nombre' => 'Sucursal Norte', 'direccion' => 'Calle Norte 456', 'telefono' => '555-5678']);
        Sucursal::create(['nombre' => 'Sucursal Sur', 'direccion' => 'Avenida Sur 789', 'telefono' => '555-9876']);
    }
}

