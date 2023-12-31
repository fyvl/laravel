<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getPeople(Request $request)
    {
        $searchFields = [
            'last_name',
            'name',
            'patronymic',
            'position',
            'phone',
            'email'
        ];

        $query = Person::query();

        foreach ($searchFields as $field) {
            $input = $request->input($field);

            if ($input) {
                $query->where($field, 'LIKE', '%' . $input . '%');
            }
        }

        $data = $query->paginate(10);

        return response()->json($data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
