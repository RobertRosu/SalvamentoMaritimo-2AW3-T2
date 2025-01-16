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

        $excludedSailorIds = [
            $lastTravel['marinela_1_id'],
            $lastTravel['marinela_2_id'],
            $lastTravel['marinela_3_id']
        ];

        $travel = new Travel;

        $travel->origen = $request->origen;
        $travel->destino = $request->destino;
        $travel->doctor_id = Doctor::whereNotIn('status', ['Aktibo', 'Bajan'])->where('id', '!=', $lastTravel['doctor_id'])->inRandomOrder()->value('id');
        $travel->kapitaina_id = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Kapitaina')->where('id', '!=', $lastTravel['kapitaina_id'])->inRandomOrder()->value('id');
        $travel->makinen_arduraduna_id = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Makinen arduraduna')->where('id', '!=', $lastTravel['makinen_arduraduna_id'])->inRandomOrder()->value('id');
        $travel->mekanikoa_id = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Mekanikoa')->where('id', '!=', $lastTravel['mekanikoa_id'])->inRandomOrder()->value('id');
        $travel->zubiko_ofiziala_id = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Zubiko ofiziala')->where('id', '!=', $lastTravel['zubiko_ofiziala_id'])->inRandomOrder()->value('id');

        $travel->marinela_1_id = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Marinela')->whereNotIn('id', $excludedSailorIds)->inRandomOrder()->value('id');
        $excludedSailorIds[] = $travel->marinela_1_id;

        $travel->marinela_2_id = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Marinela')->whereNotIn('id', $excludedSailorIds)->inRandomOrder()->value('id');
        $excludedSailorIds[] = $travel->marinela_2_id;

        $travel->marinela_3_id = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Marinela')->whereNotIn('id', $excludedSailorIds)->inRandomOrder()->value('id');
        
        $travel->erizaina_id = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Erizaina')->where('id', '!=', $lastTravel['erizaina_id'])->inRandomOrder()->value('id');
        $travel->start_date = Carbon::parse(Carbon::now());
        $travel->description = $request->description;

        $travel->save();
        return redirect()->route('bidaiak.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $travel = Travel::find($id);

        $doctor = Doctor::find($travel->doctor_id, ['id', 'name']);
        $captain = CrewMember::findOrFail($travel->kapitaina_id, ['id', 'name']);
        $machine_manager = CrewMember::find($travel->makinen_arduraduna_id, ['id', 'name']);
        $mechanic = CrewMember::find($travel->mekanikoa_id, ['id', 'name']);
        $bridge_officer = CrewMember::find($travel->zubiko_ofiziala_id, ['id', 'name']);
        $sailor_1 = CrewMember::find($travel->marinela_1_id, ['id', 'name']);
        $sailor_2 = CrewMember::find($travel->marinela_2_id, ['id', 'name']);
        $sailor_3 = CrewMember::find($travel->marinela_3_id, ['id', 'name']);
        $nurse = CrewMember::find($travel->erizaina_id, ['id', 'name']);

        return view('travels.details', compact('travel', 'doctor', 'captain', 'machine_manager', 'mechanic', 'bridge_officer', 'sailor_1', 'sailor_2', 'sailor_3', 'nurse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $travel = Travel::findOrFail($id);
        $lastTravel = Travel::latest('start_date')->first();

        // Egoera kontutan artu gabe listatuko dute
        // $currentDoctor = Doctor::findOrFail($travel->doctor_id, ['id', 'name']);
        // $currentCaptain = CrewMember::findOrFail($travel->kapitaina_id, ['id', 'name']);
        // $currentMachineManager = CrewMember::findOrFail($travel->makinen_arduraduna_id, ['id', 'name']);
        // $currentMechanic = CrewMember::findOrFail($travel->mekanikoa_id, ['id', 'name']);
        // $currentBridgeOfficer = CrewMember::findOrFail($travel->zubiko_ofiziala_id, ['id', 'name']);
        // $currentSailor_1 = CrewMember::findOrFail($travel->marinela_1_id, ['id', 'name']);

        // Langile inaktiboak bakarrik listatuko dute
        $doctors = Doctor::whereNotIn('status', ['Aktibo', 'Bajan'])->where('id', '!=', $lastTravel['doctor_id'])->get(['id', 'name']);
        $captains = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Kapitaina')->where('id' , '!=', $lastTravel['kapitaina_id'])->get(['id', 'name']);
        $machine_managers = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Makinen arduraduna')->where('id' , '!=', $lastTravel['makinen_arduraduna_id'])->get(['id', 'name']);
        $mechanics = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Mekanikoa')->where('id' , '!=', $lastTravel['mekanikoa_id'])->get(['id', 'name']);
        $bridge_officers = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Zubiko ofiziala')->where('id' , '!=', $lastTravel['zubiko_ofiziala_id'])->get(['id', 'name']);
        $sailors = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Marinela')->whereNotIn('id', [$lastTravel['marinela_1_id'], $lastTravel['marinela_2_id'], $lastTravel['marinela_3_id']])->get(['id', 'name']);
        $nurses = CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Erizaina')->whereNotIn('id', [$lastTravel['erizaina_id']])->get(['id', 'name']);

        return view('travels.form_edit', compact(
            'travel', 'doctors', 'captains', 'machine_managers', 'mechanics', 'bridge_officers', 'sailors', 'nurses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelRequest $request, int $id)
    {
        $travel = Travel::findOrFail($id);

        if($travel->marinela_1_id == $travel->marinela_2_id && $travel->marinela_1_id == $travel->marinela_3_id){
            $travel->marinela_1_id = CrewMember::where('rol', 'Marinela')->whereNotIn('status', ['Aktibo', 'Bajan'])->inRandomOrder()->first()->value('id');
        }

        if($travel->marinela_2_id == $travel->marinela_1_id && $travel->marinela_2_id == $travel->marinela_3_id){
            $travel->marinela_2_id = CrewMember::where('rol', 'Marinela')->whereNotIn('status', ['Aktibo', 'Bajan'])->inRandomOrder()->first()->value('id');
        }

        if($travel->marinela_3_id == $travel->marinela_1_id && $travel->marinela_3_id == $travel->marinela_2_id){
            $travel->marinela_3_id = CrewMember::where('rol', 'Marinela')->whereNotIn('status', ['Aktibo', 'Bajan'])->inRandomOrder()->first()->value('id');
        }
        
        $travel->update($request->validated());
        return redirect()->route('bidaiak.index');
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
