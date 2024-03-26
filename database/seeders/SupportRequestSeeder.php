<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('support_requests')->insert([
            [
                'description' => 'Beispielproblem 1',
                'start_time' => '2020-01-01 09:00:00',
                'end_time' => '2020-01-01 11:00:00',
                'processing_date' => '2020-01-02',
                'employee_id' => 1, // Stellen Sie sicher, dass diese IDs existieren
                'organization_id' => 1, // Stellen Sie sicher, dass diese IDs existieren
            ],
            // Fügen Sie weitere Supportanfragen nach Bedarf hinzu
        ]);
    }
}
