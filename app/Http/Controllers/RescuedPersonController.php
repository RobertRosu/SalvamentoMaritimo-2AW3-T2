<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StoreRescuedPersonRequest;
use App\Http\Requests\UpdateRescuedPersonRequest;
use App\Models\RescuedPerson;
use App\Models\Rescue;
use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;



class RescuedPersonController extends Controller
{
    public function __construct(){
        $this->middleware('can:erreskatatuak.index')->only('index');
        $this->middleware('can:erreskatatuak.update')->only('update');
        $this->middleware('can:erreskatatuak.destroy')->only('destroy');
        $this->middleware('can:erreskatatuak.create')->only('create');
        $this->middleware('can:erreskatatuak.edit')->only('edit');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rescued_people = RescuedPerson::all();
        return view('rescuedPeople.index', compact('rescued_people')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rescues = Rescue::all(); 
        $doctors = Doctor::all();
    
        return view('rescuedPeople.form_create', compact('rescues', 'doctors'));    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRescuedPersonRequest $request)
    {
        $rescued_person_data = $request->validated();

        if($request->file('photo_src')){
            $path = $request->file('photo_src')->store('images', 'public');
            $rescued_person_data['photo_src'] = basename($path);
        }

        RescuedPerson::create($rescued_person_data);

        return redirect()->route('erreskatatuak.index')->with('success', 'Erreskatatua ondo gehitu da');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $rescuedPerson = RescuedPerson::find($id);
        $rescue = Rescue::find($rescuedPerson->rescue_id);
        $doctor = Doctor::find($rescuedPerson->doctor_id);

        return view("rescuedPeople.details", compact('rescuedPerson', 'rescue', 'doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rescuedPerson = RescuedPerson::findOrFail($id);
        $rescuedPerson->birth_date = Carbon::parse($rescuedPerson->birth_date);
        return view('rescuedPeople.form_edit', compact('rescuedPerson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRescuedPersonRequest $request, int $id)
    {
        $rescued_person = RescuedPerson::findOrFail($id);
        $rescued_person_data = $request->validated();
    
        // Verifica si hay una nueva foto
        if ($request->hasFile('photo_src')) {
            // Eliminar la foto antigua si existe
            if (isset($rescued_person_data['photo_src']) && $rescued_person_data['photo_src']) {
                Storage::disk('public')->delete('images/' . $rescued_person_data['photo_src']);
            }
    
            // Guardar la nueva imagen
            $path = $request->file('photo_src')->store('images', 'public');
            $rescued_person_data['photo_src'] = basename($path); // Guardar solo el nombre del archivo
        }
    
        // Actualiza la base de datos con los nuevos datos
        $rescued_person->update($rescued_person_data);
        

        return redirect()->route('erreskatatuak.index')->with('success', 'Erreskatatua ondo eguneratu da');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $rescuedPerson=RescuedPerson::where('id',$id)->delete();
            return redirect()->route('erreskatatuak.index')->with('success', 'Erreskatatua ondo ezabatu da');    
        }catch(\Exception $e){
            return redirect()->route('erreskatatuak.index')->with('error', $e); 
        }
    }
}
