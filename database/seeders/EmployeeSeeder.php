<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            ['name' => 'Max Mustermann'],
            ['name' => 'Erika Musterfrau'],
            // Fügen Sie weitere Mitarbeiter nach Bedarf hinzu
        ]);
    }
}
