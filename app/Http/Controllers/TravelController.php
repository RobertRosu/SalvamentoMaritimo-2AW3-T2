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
    public function __construct(){
        $this->middleware('can:bidaiak.index')->only('index');
        $this->middleware('can:bidaiak.update')->only('update');
        $this->middleware('can:bidaiak.destroy')->only('destroy');
        $this->middleware('can:bidaiak.create')->only('create');
        $this->middleware('can:bidaiak.edit')->only('edit');
        $this->middleware('can:bidaiak.show')->only('show');

    }
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
        $crew = [
            "doctor" => [
                "list" => Doctor::whereNotIn('status', ['Aktibo', 'Bajan'])->where('id', '!=', $lastTravel['doctor_id'])->get(['id', 'name']),
                "current" => Doctor::findOrFail($travel->doctor_id, ['id', 'name']),
                "col" => 'doctor_id'
            ],
            "captain" => [
                "list" =>CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Kapitaina')->where('id' , '!=', $lastTravel['kapitaina_id'])->get(['id', 'name']),
                "current" => CrewMember::findOrFail($travel->kapitaina_id, ['id', 'name']),
                "col" => 'kapitaina_id'
            ],
            "machine_manager" => [
                "list" =>CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Makinen arduraduna')->where('id' , '!=', $lastTravel['makinen_arduraduna_id'])->get(['id', 'name']),
                "current" => CrewMember::findOrFail($travel->makinen_arduraduna_id, ['id', 'name']),
                "col" => "makinen_arduraduna_id"
            ],
            "mechanic" => [
                "list" =>CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Mekanikoa')->where('id' , '!=', $lastTravel['mekanikoa_id'])->get(['id', 'name']),
                "current" => CrewMember::findOrFail($travel->mekanikoa_id, ['id', 'name']),
                "col" => "mekanikoa_id"
            ],
            "bridge_officer" => [
                "list" =>CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Zubiko ofiziala')->where('id' , '!=', $lastTravel['zubiko_ofiziala_id'])->get(['id', 'name']),
                "current" => CrewMember::findOrFail($travel->zubiko_ofiziala_id, ['id', 'name']),
                "col" => "zubiko_ofiziala_id",
            ],
            "sailor_1" => [
                "list" =>CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Marinela')->whereNotIn('id', [$lastTravel['marinela_1_id'], $lastTravel['marinela_2_id'], $lastTravel['marinela_3_id']])->inRandomOrder()->get(['id', 'name']),
                "current" => CrewMember::findOrFail($travel->marinela_1_id, ['id', 'name']),
                "col" => "marinela_1_id"
            ],
            "sailor_2" => [
                "list" =>CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Marinela')->whereNotIn('id', [$lastTravel['marinela_1_id'], $lastTravel['marinela_2_id'], $lastTravel['marinela_3_id']])->inRandomOrder()->get(['id', 'name']),
                "current" => CrewMember::findOrFail($travel->marinela_2_id, ['id', 'name']),
                "col" => "marinela_2_id"
            ],
            "sailor_3" => [
                "list" =>CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Marinela')->whereNotIn('id', [$lastTravel['marinela_1_id'], $lastTravel['marinela_2_id'], $lastTravel['marinela_3_id']])->inRandomOrder()->get(['id', 'name']),
                "current" => CrewMember::findOrFail($travel->marinela_3_id, ['id', 'name']),
                "col" => "marinela_3_id"
            ],
            "nurse" => [
                "list" =>CrewMember::whereNotIn('status', ['Aktibo', 'Bajan'])->where('rol', 'Erizaina')->whereNotIn('id', [$lastTravel['erizaina_id']])->get(['id', 'name']),
                "current" => CrewMember::findOrFail($travel->erizaina_id, ['id', 'name']),
                "col" => "erizaina_id"
            ]
        ];

        return view('travels.form_edit', compact('travel', 'crew'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelRequest $request, int $id)
    {
        $travel = Travel::findOrFail($id);

        if($travel->marinela_1_id == $travel->marinela_2_id && $travel->marinela_1_id == $travel->marinela_3_id){
            $travel->marinela_1_id = CrewMember::where('rol', 'Marinela')->whereNotIn('status', ['Aktibo', 'Bajan'])->whereNotInt('marinela_1_id', [$travel->marinela_2_id, $travel->marinela_3_id])->inRandomOrder()->first()->value('id');
        }

        if($travel->marinela_2_id == $travel->marinela_1_id && $travel->marinela_2_id == $travel->marinela_3_id){
            $travel->marinela_2_id = CrewMember::where('rol', 'Marinela')->whereNotIn('status', ['Aktibo', 'Bajan'])->whereNotInt('marinela_2_id', [$travel->marinela_1_id, $travel->marinela_3_id])->inRandomOrder()->first()->value('id');
        }

        if($travel->marinela_3_id == $travel->marinela_1_id && $travel->marinela_3_id == $travel->marinela_2_id){
            $travel->marinela_3_id = CrewMember::where('rol', 'Marinela')->whereNotIn('status', ['Aktibo', 'Bajan'])->whereNotInt('marinela_3_id', [$travel->marinela_2_id, $travel->marinela_1_id])->inRandomOrder()->first()->value('id');
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
