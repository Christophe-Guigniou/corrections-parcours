<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Estimate;
use App\Services\EstimateCreator;
use Illuminate\Http\Request;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return all estimate json
        return response()->json(Estimate::all()->load('lines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, EstimateCreator $estimateCreator)
    {
        // we validate the request before doing any insert in database
        $request->validate([
            'projectName' => 'required|string|max:255',
            'projectType' => 'required|string',
            'designType' => 'required|string',
            'genericDevelopments' => 'required|array'
        ]);

        $data = $request->json()->all();

        $estimate = $estimateCreator->create($data);

        if($estimate) {
            return response()->json($estimate->load('lines'));
        } else {
            return response()->json([
                'error' => 
                'An error occurred while creating the estimate'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // find by id and return json
        return response()->json(Estimate::find($id)->load('lines'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Estimate::destroy($id);

        return response()->json([
            'message' => 'Estimate deleted'
        ]);
    }
}
