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
    
}
