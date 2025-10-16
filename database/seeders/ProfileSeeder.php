<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile as ModelsProfile;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsProfile::create([
            'name' => 'Administrador'
        ]);

        ModelsProfile::create([
            'name' => 'Professor'
        ]);

        ModelsProfile::create([
            'name' => 'Aluno'
        ]);
    }
}
