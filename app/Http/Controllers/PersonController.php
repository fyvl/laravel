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
        $lastName = $request->input('lastName');
        $firstName = $request->input('firstName');
        $patronymic = $request->input('patronymic');
        $phone = $request->input('phone');
        $position = $request->input('position');

        $query = Person::query();

        if ($lastName) {
            $query->where('last_name', 'LIKE', '%' . $lastName . '%');
        }

        if ($firstName) {
            $query->where('name', 'LIKE', '%' . $firstName . '%');
        }

        if ($patronymic) {
            $query->where('patronymic', 'LIKE', '%' . $patronymic . '%');
        }

        if ($phone) {
            $query->where('phone', 'LIKE', '%' . $phone . '%');
        }

        if ($position) {
            $query->where('position', 'LIKE', '%' . $position . '%');
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
