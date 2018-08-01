<?php

namespace App\Http\Controllers;

use App\DataPlan;
use App\Contact;

use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Store a new contact in the database
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'email',
            'address' => 'required',
            'data_plan' => 'required',
            'dni' => 'required',
            'terms' => 'accepted',
        ]);

        $request['name'] = request('name').' '.request('surname');
        
        Contact::create($request->all());

        return response()->json(['message' => 'Solicitud enviada con exito. ¡Muchas gracias por ponerse en contacto!'], 201);
    }

    /**
     * Get data plans basic info
     */
    public function getDataPlans() 
    {
        $data_plans = DataPlan::select('id', 'name', 'price', 'setup_price')->get();
        return response()->json($data_plans, 200);
    }
}