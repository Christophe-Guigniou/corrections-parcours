<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $settings = Item::all()->load('values');

        $settingsArray = [];

        foreach ($settings as $setting) {
            $settingsArray[$setting->slug] = $setting;
        }

        return response()->json($settingsArray);
    }
}
