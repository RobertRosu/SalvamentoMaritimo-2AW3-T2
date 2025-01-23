<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRescueRequest;
use App\Http\Requests\UpdateRescueRequest;
use App\Models\Rescue;
use App\Models\Travel;

class RescueController extends Controller
{
    public function __construct(){
        $this->middleware('can:erreskateak.index')->only('index');
        $this->middleware('can:erreskateak.update')->only('update');
        $this->middleware('can:erreskateak.destroy')->only('destroy');
        $this->middleware('can:erreskateak.create')->only('create');
        $this->middleware('can:erreskateak.edit')->only('edit');
    }
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
        $rescue_data= $request->validated();
        Rescue::create($rescue_data);
        return redirect()->route('erreskateak.index')->with('success', 'Erreskatea ondo gehitu da');
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
        $rescue_data = $request->validated();
        $rescue->update($rescue_data);
        
        return redirect()->route('erreskateak.index')->with('success', 'Erreskatea ondo eguneratu da');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $rescue=Rescue::where('id',$id)->delete();
            return redirect()->route('erreskateak.index')->with('success', 'Erreskatea ondo ezabatu da');    
        }catch(\Exception $e){
            return redirect()->route('erreskateak.index')->with('error', $e);
        }
    }
}
