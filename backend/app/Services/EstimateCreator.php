<?php

namespace App\Services;

use App\Models\Estimate;
use App\Models\ItemValue;

class EstimateCreator
{

    public function create($data)
    {

        // Prepare how much startup time we will have, and percentage 
        $startupTime = 0;
        $percentage = 0;

        // Create the new estimate
        $estimate = new Estimate();

        // Set the estimate project name
        $estimate->name = $data['projectName'];

        // Get the project type and design type
        $projectType = ItemValue::where('value',  $data['projectType'])->first();
        $designType = ItemValue::where('value',  $data['designType'])->first();

        // We handle the startup time and total percentage
        if ($projectType->startup_time) {
            $startupTime += $projectType->startup_time;
        }

        if ($projectType->total_percentage) {
            $percentage += $projectType->total_percentage;
        }

        if ($designType->total_percentage) {
            $percentage += $designType->total_percentage;
        }

        // We save the estimate so we can add estimate_lines to it
        $estimate->save();

        // Create the startup time
        $estimate->lines()->create([
            'label' => 'Mise en route du projet',
            'time' => $startupTime,
        ]);

        foreach ($data['genericDevelopments'] as $genericDev) {
            $genericDevSetting = ItemValue::where('value', $genericDev)->first();

            $estimate->total_time += $genericDevSetting->time;

            $estimate->lines()->create([
                'label' => $genericDevSetting->label,
                'time' => $genericDevSetting->time,
            ]);
        }

        // Specific developments
        foreach ($data['specificDevelopments'] as $specificDev) {
            
            
            $floor = floor($specificDev['hours']);
            $decimal = $specificDev['hours'] - $floor;
            
            $minutes = $floor * 60;
            $decimalMinutes = floor($decimal * 60);
            $total = $minutes + $decimalMinutes;
            
            $estimate->total_time += $total;

            $estimate->lines()->create([
                'label' => $specificDev['name'],
                'time' => $total,
            ]);
        }

        // Design time
        $estimate->lines()->create([
            'label' => 'Design : ' . $designType->label,
            'time' => ($designType->total_percentage * $estimate->total_time / 100),
            'type' => 'additional'
        ]);

        // Project time
        $estimate->lines()->create([
            'label' => 'Type de projet : ' . $projectType->label,
            'time' => ($projectType->total_percentage * $estimate->total_time / 100),
            'type' => 'additional'
        ]);

        // We calculate the additional time
        $additional_time = $estimate->total_time * ($percentage / 100);

        // total time is each time of the lines + startup time + additional time
        $estimate->total_time += $startupTime;
        $estimate->total_time += $additional_time;

        $estimate->save();

        return $estimate;
    }
}
