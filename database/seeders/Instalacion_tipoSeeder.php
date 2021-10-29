<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Instalacion_tipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('instalacion_tipos')->insert([
            'tipo_instalacion' => 'Cámaras'
        ]);

        DB::table('instalacion_tipos')->insert([
            'tipo_instalacion' => 'Alarmas'
        ]);
        DB::table('instalacion_tipos')->insert([
            'tipo_instalacion' => 'Cercas electrificadas'
        ]);
    }
}
