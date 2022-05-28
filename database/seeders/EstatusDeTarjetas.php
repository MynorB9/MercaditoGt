<?php

namespace Database\Seeders;

use App\Models\EstatusTarjetas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstatusDeTarjetas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estatus = new EstatusTarjetas;
        $estatus->estatus = 'Generada'; //Generada
        $estatus->save();

        $estatus = new EstatusTarjetas;
        $estatus->estatus = 'Canjeada'; //Canjeada
        $estatus->save();

        $estatus = new EstatusTarjetas;
        $estatus->estatus = 'Finalizado'; //FIN
        $estatus->save();
    }
}
