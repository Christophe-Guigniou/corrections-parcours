<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $projectlabelId = DB::table('items')->insertGetId([
            'name' => 'Nom du projet',
            'slug' => 'projectName',
            'type' => 'text',
        ]);

        $projectTypeId = DB::table('items')->insertGetId([
            'name' => 'Type de projet',
            'slug' => 'projectType',
            'type' => 'select',
        ]);

        DB::table('item_values')->insert([
            'label' => 'Laravel',
            'value' => 'laravel',
            'startup_time' => 4 * 60,
            'total_percentage' => 0,
            'item_id' => $projectTypeId,
        ]);

        DB::table('item_values')->insert([
            'label' => 'Laravel + React',
            'value' => 'laravelReact',
            'startup_time' => 6 * 60,
            'total_percentage' => 25,
            'item_id' => $projectTypeId,
        ]);


        $genericDevelopmentsId = DB::table('items')->insertGetId([
            'name' => 'Développements Génériques',
            'slug' => 'genericDevelopments',
            'type' => 'checkboxes',
        ]);

        DB::table('item_values')->insert([
            'label' => 'Homepage',
            'value' => 'homepage',
            'time' => 7 * 60,
            'item_id' => $genericDevelopmentsId,
        ]);

        DB::table('item_values')->insert([
            'label' => "Offres d'emploi",
            'value' => 'jobs',
            'time' => 16 * 60,
            'item_id' => $genericDevelopmentsId,
        ]);

        DB::table('item_values')->insert([
            'label' => "Blog",
            'value' => 'blog',
            'time' => 10 * 60,
            'item_id' => $genericDevelopmentsId,
        ]);

        DB::table('item_values')->insert([
            'label' => "Page éditorial",
            'value' => 'editorialPage',
            'time' => 5 * 60,
            'item_id' => $genericDevelopmentsId,
        ]);

        DB::table('item_values')->insert([
            'label' => "Événements",
            'value' => 'events',
            'time' => 14 * 60,
            'item_id' => $genericDevelopmentsId,
        ]);

        $specificDevelopmentsId = DB::table('items')->insertGetId([
            'name' => 'Développements spécifiques',
            'slug' => 'specificDevelopments',
            'type' => 'multi',
        ]);

        $designTypeId = DB::table('items')->insertGetId([
            'name' => 'Type de design',
            'slug' => 'designType',
            'type' => 'select',
        ]);

        DB::table('item_values')->insert([
            'label' => 'Simple',
            'value' => 'simple',
            'total_percentage' => 0,
            'item_id' => $designTypeId,
        ]);

        DB::table('item_values')->insert([
            'label' => 'Complexe',
            'value' => 'complex',
            'total_percentage' => 15,
            'item_id' => $designTypeId,
        ]);

        DB::table('item_values')->insert([
            'label' => 'Complexe avec animations',
            'value' => 'complexAnimations',
            'total_percentage' => 20,
            'item_id' => $designTypeId,
        ]);
    }
}
