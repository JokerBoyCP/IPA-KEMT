<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organizations')->insert([
            ['name' => 'Firma A', 'rate' => 150.00],
            ['name' => 'Firma B', 'rate' => 200.00],
            // Fügen Sie weitere Organisationen nach Bedarf hinzu
        ]);
    }
}
