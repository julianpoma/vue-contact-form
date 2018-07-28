<?php

namespace App\Http\Controllers;

use App\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    /**
     * Store a new serviceRequest in the database
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
        ]);

        $request['name'] = request('name').' '.request('surname');
        
        ServiceRequest::create($request->all());

        return ['message' => 'Solicitud enviada con exito. ¡Muchas gracias por ponerse en contacto!'];
    }
}