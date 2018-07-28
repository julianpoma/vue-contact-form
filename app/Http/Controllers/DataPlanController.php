<?php

namespace App\Http\Controllers;

use App\DataPlan;

use Illuminate\Http\Request;

class DataPlanController extends Controller
{
    public function basic() 
    {
        $data_plans = DataPlan::select('id', 'name', 'price', 'setup_price')->get();
        return response()->json($data_plans, 200);
    }
}
