<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$.nMxX3H57GdpZVb/GGaQX./5KLAcn6mIGpgg56ngO7bEnENyCQju.',
        ])->assignRole('Administrador');

        
    }
}
