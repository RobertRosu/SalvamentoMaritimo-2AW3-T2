<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StoreCrewMemberRequest;
use App\Http\Requests\UpdateCrewMemberRequest;
use App\Models\CrewMember;

class CrewMemberController extends Controller
{
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
    public function show(CrewMember $crewMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
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
