<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstimateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
        $estimateId = DB::table('estimates')->insertGetId([
            'name' => "O'clock",
            'total_time' => 50 * 60,
        ]);

        DB::table('estimate_lines')->insert([
            'label' => 'Mise en place',
            'time' => 4 * 60,
            'estimate_id' => $estimateId,
        ]);

        DB::table('estimate_lines')->insert([
            'label' => 'Homepage',
            'time' => 7 * 60,
            'estimate_id' => $estimateId,
        ]);

        DB::table('estimate_lines')->insert([
            'label' => 'Événements',
            'time' => 14 * 60,
            'estimate_id' => $estimateId,
        ]);

        DB::table('estimate_lines')->insert([
            'label' => 'Offres d\'emploi',
            'time' => 16 * 60,
            'estimate_id' => $estimateId,
        ]);

        DB::table('estimate_lines')->insert([
            'label' => 'Type de projet : Laravel',
            'time' => 0,
            'type' => 'additional',
            'estimate_id' => $estimateId,
        ]);

        DB::table('estimate_lines')->insert([
            'label' => 'Type de design : Simple',
            'time' => 0,
            'type' => 'additional',
            'estimate_id' => $estimateId,
        ]);

        $estimate2Id = DB::table('estimates')->insertGetId([
            'name' => "Centaure",
            'total_time' => 55 * 60,
        ]);

        DB::table('estimate_lines')->insert([
            'label' => 'Mise en place',
            'time' => 6 * 60,
            'estimate_id' => $estimate2Id,
        ]);

        DB::table('estimate_lines')->insert([
            'label' => 'Homepage',
            'time' => 7 * 60,
            'estimate_id' => $estimate2Id,
        ]);

        DB::table('estimate_lines')->insert([
            'label' => 'Événements',
            'time' => 14 * 60,
            'estimate_id' => $estimate2Id,
        ]);

        DB::table('estimate_lines')->insert([
            'label' => 'Offres d\'emploi',
            'time' => 16 * 60,
            'estimate_id' => $estimate2Id,
        ]);

        DB::table('estimate_lines')->insert([
            'label' => 'Type de projet : Laravel + React',
            'time' => 4 * 60,
            'type' => 'additional',
            'estimate_id' => $estimate2Id,
        ]);

        DB::table('estimate_lines')->insert([
            'label' => 'Type de design : Complexe',
            'time' => 5 * 60,
            'type' => 'additional',
            'estimate_id' => $estimate2Id,
        ]);

    }
}
