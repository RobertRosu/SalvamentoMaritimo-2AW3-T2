<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRescuedPersonRequest;
use App\Http\Requests\UpdateRescuedPersonRequest;
use App\Models\RescuedPerson;

class RescuedPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rescued_people = RescuedPerson::all();
        return view('rescuedPeople.index', compact('rescued_people')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rescued_person.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRescuedPersonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RescuedPerson $rescuedPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RescuedPerson $rescuedPerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRescuedPersonRequest $request, RescuedPerson $rescuedPerson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RescuedPerson $rescuedPerson)
    {
        $rescued_person=RescuedPerson::where('id',$id)->delete();
        return redirect()->route('rescued_people.index');
    }
}
