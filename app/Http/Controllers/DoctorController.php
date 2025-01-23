<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
// use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __construct(){
        $this->middleware('can:medikuak.index')->only('index');
        $this->middleware('can:medikuak.update')->only('update');
        $this->middleware('can:medikuak.destroy')->only('destroy');
        $this->middleware('can:medikuak.create')->only('create');
        $this->middleware('can:medikuak.edit')->only('edit');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view("doctor.index", compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("doctor.form_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        $doctor = new Doctor;
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->start_date = Carbon::parse(Carbon::now());
        $doctor->stop_date = $request->stop_date;

        $doctor->save();

        return redirect()->route('medikuak.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->start_date = Carbon::parse($doctor->start_date);
        $doctor->stop_date = Carbon::parse($doctor->stop_date);
        return view('doctor.form_edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, int $id)
    {
        $doctor = Doctor::find($id);

        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->start_date = $doctor->start_date;
        $doctor->stop_date = $request->stop_date;
        $doctor->status = $request->status;
        $doctor->reason = $request->reason;

        $doctor->save();
        return redirect()->route('medikuak.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Doctor::where('id', $id)->delete();
        return redirect()->route('medikuak.index');
    }
}
