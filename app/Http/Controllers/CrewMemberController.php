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
        $crewMember = new CrewMember;
        $crewMember->name = $request->name;
        $crewMember->email = $request->email;
        $crewMember->rol = $request->rol;

        $crewMember->save();

        return redirect()->route('langileak.index');
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
        $crewMember = crewMember::find($id);

        $crewMember->name = $request->name;
        $crewMember->email = $request->email;
        $crewMember->start_date = $crewMember->start_date;
        $crewMember->stop_date = $request->stop_date;
        $crewMember->status = $request->status;
        $crewMember->reason = $request->reason;

        $crewMember->save();
        return redirect()->route('langileak.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $crew_member=CrewMember::where('id',$id)->delete();
        return redirect()->route('langileak.index');
    }
}
