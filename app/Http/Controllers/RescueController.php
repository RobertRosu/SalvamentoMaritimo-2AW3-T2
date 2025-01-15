<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRescueRequest;
use App\Http\Requests\UpdateRescueRequest;
use App\Models\Rescue;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRescueRequest $request)
    {
        //
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
    public function edit(Rescue $rescue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRescueRequest $request, Rescue $rescue)
    {
        //
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
