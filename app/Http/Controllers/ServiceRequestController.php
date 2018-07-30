<?php

namespace App\Http\Controllers;

use \App\ServiceRequest;

use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
