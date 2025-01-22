<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StoreRescuedPersonRequest;
use App\Http\Requests\UpdateRescuedPersonRequest;
use App\Models\RescuedPerson;
use App\Models\Rescue;
use App\Models\Doctor;


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
        $rescues = Rescue::all(); 
        $doctors = Doctor::all();
    
        return view('rescuedPeople.form_create', compact('rescues', 'doctors'));    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRescuedPersonRequest $request)
    {
        $rescuedPerson = new RescuedPerson;
        $rescuedPerson->name = $request->name;
        $rescuedPerson->country = $request->country;
        $rescuedPerson->genre = $request->genre;
        $rescuedPerson->birth_date = $request->birth_date;
        $rescuedPerson->diagnostic = $request->diagnostic;
        $rescuedPerson->rescue_id = $request->rescue_id;
        $rescuedPerson->doctor_id = $request->doctor_id;
        $rescuedPerson->photo_src = $request->photo_src;


        $rescuedPerson->save();

        return redirect()->route('erreskatatuak.index');    }

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
    public function edit($id)
    {
        $rescuedPerson = RescuedPerson::findOrFail($id);
        $rescuedPerson->birth_date = Carbon::parse($rescuedPerson->birth_date);
        return view('rescuedPeople.form_edit', compact('rescuedPerson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRescuedPersonRequest $request, int $id)
    {
        $rescuedPerson = RescuedPerson::find($id);

        $rescuedPerson->name = $request->name;
        $rescuedPerson->country = $request->country;
        $rescuedPerson->genre = $request->genre;
        $rescuedPerson->birth_date = $request->birth_date;
        $rescuedPerson->diagnostic = $request->diagnostic;
        $rescuedPerson->photo_src = $request->photo_src;
        $rescuedPerson->rescue_id = $rescuedPerson->rescue_id;
        $rescuedPerson->doctor_id = $rescuedPerson->doctor_id;


        $rescuedPerson->save();
        return redirect()->route('erreskatatuak.index');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rescuedPerson=RescuedPerson::where('id',$id)->delete();
        return redirect()->route('erreskatatuak.index');
    }
}
