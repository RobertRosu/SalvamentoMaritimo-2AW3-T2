<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRescueRequest;
use App\Http\Requests\UpdateRescueRequest;
use App\Models\Rescue;
use App\Models\Travel;

class RescueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rescues = Rescue::all();
        return view('rescues.index', compact('rescues')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $travels = Travel::all();
        return view('rescues.form_create', compact('travels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRescueRequest $request)
    {
        Rescue::create($request->validated());
        return redirect()->route('erreskateak.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rescue $rescue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $travels = Travel::all();
        $rescue = Rescue::findOrFail($id);
        return view('rescues.form_edit', compact('travels', 'rescue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRescueRequest $request, int $id)
    {
        $rescue = Rescue::findOrFail($id);
        $rescue->fill($request->validated());
        $rescue->save();
        
        return redirect()->route('erreskateak.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rescue=Rescue::where('id',$id)->delete();
        return redirect()->route('erreskateak.index');
    }
}
