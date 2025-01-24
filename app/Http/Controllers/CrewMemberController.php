<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StoreCrewMemberRequest;
use App\Http\Requests\UpdateCrewMemberRequest;
use App\Models\CrewMember;
use App\Models\Travel;

class CrewMemberController extends Controller
{
    public function __construct(){
        $this->middleware('can:langileak.index')->only('index');
        $this->middleware('can:langileak.update')->only('update');
        $this->middleware('can:langileak.destroy')->only('destroy');
        $this->middleware('can:langileak.create')->only('create');
        $this->middleware('can:langileak.edit')->only('edit');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crew_members = CrewMember::all();
        return view('crewMember.index', compact('crew_members'));     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("crewMember.form_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCrewMemberRequest $request)
    {
        $crew_member_data = $request->validated();
        $crew_member_data['start_date'] = Carbon::parse(Carbon::now());
        CrewMember::create($crew_member_data);

        return redirect()->route('langileak.index')->with('success', 'Langilea ondo gehitu da');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $crewMember = CrewMember::findOrFail($id);

        $travels = Travel::where('kapitaina_id', $id)
        ->orWhere('makinen_arduraduna_id', $id)
        ->orWhere('mekanikoa_id', $id)
        ->orWhere('zubiko_ofiziala_id', $id)
        ->orWhere('marinela_1_id', $id)
        ->orWhere('marinela_2_id', $id)
        ->orWhere('marinela_3_id', $id)
        ->orWhere('erizaina_id', $id)
        ->get(['id', 'origen', 'destino']);

        return view('crewMember.details', compact('crewMember', 'travels'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $crewMember = CrewMember::findOrFail($id);
        $crewMember->start_date = Carbon::parse($crewMember->start_date);
        $crewMember->stop_date = Carbon::parse($crewMember->stop_date);
        return view('crewMember.form_edit', compact('crewMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCrewMemberRequest $request, int $id)
    {
        $crew_member = crewMember::find($id);
        $crew_member_data = $request->validated();
        $crew_member_data['start_date'] = Carbon::parse(Carbon::now());
        
        $crew_member->update($crew_member_data);
        return redirect()->route('langileak.index')->with('success', 'Langilea eguneratu da');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            CrewMember::where('id', $id)->delete();
            return redirect()->route('langileak.index')->with('success', 'Langilea ondo ezabatu da');    
        }catch(\Exception $e){
            return redirect()->route('langileak.index')->with('error', $e);
        }
    }
}
