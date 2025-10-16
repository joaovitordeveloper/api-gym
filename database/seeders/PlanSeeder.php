<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'name' => 'Basic',
            'value' => 9.99,
            'limit_users' => 1
        ]);

        Plan::create([
            'name' => 'Standard',
            'value' => 19.99,
            'limit_users' => 2
        ]);

        Plan::create([
            'name' => 'Plus',
            'value' => 49.99,
            'limit_users' => 5
        ]);

        Plan::create([
            'name' => 'Elite',
            'value' => 79.99,
            'limit_users' => 10
        ]);
    }
}
