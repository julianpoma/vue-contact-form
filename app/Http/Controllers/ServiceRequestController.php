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

    public function getData(Request $request)
    {
        $searchValue = request('search');
        $search_all = request('all');

        $query = ServiceRequest::select('id', 'name', 'address', 'phone', 'data_plan', 'created_at', 'check');

        if($searchValue != '')
        {
            $query->where('name', 'like', '%'.$searchValue.'%')
                ->orWhere('address', 'like', '%'.$searchValue.'%')
                ->orWhere('phone', 'like', '%'.$searchValue.'%');
        }

        if($search_all == "false")
        {
            $query->where('check', 0);
        }

        $model = $query->latest()->paginate(15);
        $columns = ServiceRequest::$columns;
        return response()->json(["model" => $model, "columns" => $columns], 200);
    }
}
