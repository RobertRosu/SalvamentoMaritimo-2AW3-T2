<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StoreTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Models\Travel;
use App\Models\Doctor;
use App\Models\CrewMember;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::all();
        return view('travels.index', compact('travels')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('travels.form_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTravelRequest $request)
    {
        $lastTravel = Travel::latest('start_date')->first();
        $travel = new Travel;

        $travel->origen = $request->origen;
        $travel->destino = $request->destino;
        $travel->doctor_id = Doctor::select('id')->where('id', '!=', $lastTravel['doctor_id'])->value('id');
        $travel->kapitaina_id = CrewMember::select('id')->where('rol', 'Kapitaina')->where('id', '!=', $lastTravel['kapitaina_id'])->value('id');
        $travel->makinen_arduraduna_id = CrewMember::select('id')->where('rol', 'Makinen arduraduna')->where('id', '!=', $lastTravel['makinen_arduraduna_id'])->value('id');
        $travel->mekanikoa_id = CrewMember::select('id')->where('rol', 'Mekanikoa')->where('id', '!=', $lastTravel['mekanikoa_id'])->value('id');
        $travel->zubiko_ofiziala_id = CrewMember::select('id')->where('rol', 'Zubiko ofiziala')->where('id', '!=', $lastTravel['zubiko_ofiziala_id'])->value('id');
        $travel->marinela_1_id = CrewMember::select('id')->where('rol', 'Marinela')->whereNotIn('id', [$lastTravel['marinela_1_id'], $lastTravel['marinela_2_id'], $lastTravel['marinela_3_id']])->value('id');
        $travel->marinela_2_id = CrewMember::select('id')->where('rol', 'Marinela')->whereNotIn('id', [$lastTravel['marinela_1_id'], $lastTravel['marinela_2_id'], $lastTravel['marinela_3_id'], $travel->marinela_1_id])->value('id');
        $travel->marinela_3_id = CrewMember::select('id')->where('rol', 'Marinela')->whereNotIn('id', [$lastTravel['marinela_1_id'], $lastTravel['marinela_2_id'], $lastTravel['marinela_3_id'], $travel->marinela_1_id, $travel->marinela_2_id])->value('id');
        $travel->erizaina_id = CrewMember::select('id')->where('rol', 'Erizaina')->where('id', '!=', $lastTravel['erizaina_id'])->value('id');
        $travel->start_date = Carbon::parse(Carbon::now());

        $travel->save();
        return redirect()->route('bidaiak.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $travel = Travel::findOrFail($id);
        $doctors = Doctor::select('id', 'name')->value('id');
        $captains = CrewMember::select('id', 'name')->where('rol', 'Kapitaina')->get();
        $machine_managers = CrewMember::select('id', 'name')->where('rol', 'Makinen arduraduna')->get();
        return view('travels.form_edit', compact('travel', 'doctors', 'captains', 'machine_managers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bidaia=Travel::where('id',$id)->delete();
        return redirect()->route('bidaiak.index');
    }
}
