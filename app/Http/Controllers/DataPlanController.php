<?php

namespace App\Http\Controllers;

use App\DataPlan;

use Illuminate\Http\Request;

class DataPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getData()
    {
        $model = DataPlan::all();
        $columns = DataPlan::$columns;

        return response()->json([
            'model' => $model,
            'columns' => $columns,
        ], 200);
    }

    public function getOne(DataPlan $dataplan)
    {
        return response()->json($dataplan, 200);
    }

    public function store(Request $request)
    {
        Dataplan::create($request->all());

        return response()->json("Data Plan created!", 201);
    }

    public function update(Request $request, DataPlan $dataplan)
    {
        $dataplan->update($request->all());
        
        return response()->json("Data Plan updated!", 201);
    }

    public function destroy(DataPlan $dataplan)
    {
        $dataplan->delete();

        return response()->json("Data Plan deleted!", 201);
    }
    
}
