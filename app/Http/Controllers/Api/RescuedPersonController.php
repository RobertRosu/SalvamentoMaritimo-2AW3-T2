<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RescuedPerson;
use App\Models\Doctor;
use App\Models\Rescue;
use App\Models\Travel;

class RescuedPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $rescued = RescuedPerson::select('id', 'name', 'country', 'genre', 'birth_date', 'photo_src')->get();
            $doctors = Doctor::select('id', 'name')->orderBy("id")->get();
            $rescues = Rescue::select('id',)->orderBy("id")->get();
            
            return response()->json(
                [
                    "status" => "OK",
                    "message" => "Rescued people data retrieved successfully",
                    "status_code" => 200,
                    "response" => $rescued,
                    "response_doc" => $doctors,
                    "response_res" => $rescues                   
                ]
            );

        }catch(\Exception $e){
            return response()->json(
                [
                    "status" => "ERROR",
                    "message" => $e,
                    "status_code" => 500,                   
                ]
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $lastTravel = Travel::latest('start_date')->first();

            $resqued = RescuedPerson::create(
                [
                    "name" => $request->name,
                    "birth_date" => $request->birth_date,
                    "genre" => $request->genre,
                    "country" => $request->country,
                    //"photo_src" => $request->photo_src,
                    "doctor_id" => $request->doctor_id,
                    "rescue_id" => $request->rescue_id,
                    "diagnostic" => $request->diagnostic
                ]
            );

            $resqued->save();

            return response()->json(
                [
                    "status" => 'OK', 
                    "message" => "Person created successfully", 
                    "status_code" => 200,
                ]
            );
        }catch(\Exception $e){
            return response()->json(
                [
                    "status" => 'ERROR', 
                    "message" => $e, 
                    "status_code" => 500,
                ]
            );
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $rescued = RescuedPerson::find($id);

            if(!$rescued){
                return response()->json(
                    [
                        "status" => "ERROR", 
                        "message" => "Person not found", 
                        "status_code" => 404
                    ]
                );
            }

            // Validar y actualizar los campos
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'genre' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                //'photo_src' => 'nullable|url',
            ]);

            // Llenar los datos actualizados
            $rescued->update($validatedData);
            // $rescued->fill($request->validated());
            // $rescued->save();
            
            return response()->json(
                [
                    "status" => 'OK', 
                    "message" => "Person updated successfully", 
                    "status_code" => 200,
                ]
            );
        }catch(\Exception $e){
            return response()->json(
                [
                    "status" => 'ERROR', 
                    "message" => $e, 
                    "status_code" => 500,
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try{
            $rescued = RescuedPerson::find($id);

            if(!$rescued){
                return response()->json(
                    [
                        "status" => "ERROR", 
                        "message" => "Person not found", 
                        "status_code" => 404
                    ]
                );
            }

            $rescued->delete();

            return response()->json(
                [
                    "status" => 'OK', 
                    "message" => "The person has been deleted successfully", 
                    "status_code" => 200
                ]
            );
        }catch(\Exception $e){
            return response()->json(
                [
                    "status" => "ERROR", 
                    "message" => $e, 
                    "status_code" => 500
                ]
            );
        }
    }
}
