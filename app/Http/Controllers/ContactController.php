<?php

namespace App\Http\Controllers;

use \App\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getData(Request $request)
    {
        $searchValue = request('search');
        $search_all = request('all');

        $query = Contact::select('id', 'name', 'address', 'phone', 'data_plan', 'created_at', 'is_read');

        if($searchValue != '')
        {
            $query->where('name', 'like', '%'.$searchValue.'%')
                ->orWhere('address', 'like', '%'.$searchValue.'%')
                ->orWhere('phone', 'like', '%'.$searchValue.'%');
        }

        if($search_all == "false")
        {
            $query->where('is_read', 0);
        }

        $model = $query->latest()->paginate(15);
        $columns = Contact::$columns;
        return response()->json(["model" => $model, "columns" => $columns], 200);
    }

    public function togglRead(Request $request, Contact $contact)
    {
        $contact->update([
            'is_read' => !$contact->is_read,
        ]);
        return response()->json("Updated!", 200);
    }

    public function show(Contact $contact)
    {
        return response()->json($contact, 200);
    }

    public function destroy (Contact $contact)
    {
        $contact->delete();
        return response()->json("Contact deleted!", 201);
    }
}
