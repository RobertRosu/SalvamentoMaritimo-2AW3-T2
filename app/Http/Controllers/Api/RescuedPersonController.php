<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RescuedPerson;

class RescuedPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rescued = RescuedPerson::all();
        return response()->json($rescued);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $rescued = ResquedPerson::find($id);

        if(!$rescued){
            return response()->json(
                [
                    "status" => "ERROR", 
                    "message" => "Person not found", 
                    "status_code" => 404
                ]
            );
        }
        
        return response()->json(
            [
                "status" => 'OK', 
                "message" => "Person information retrieved successfully", 
                "status_code" => 200, 
                "response" => $rescued
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $rescued = ResquedPersona::find($id);

            if(!$rescued){
                return response()->json(
                    [
                        "status" => "ERROR", 
                        "message" => "Person not found", 
                        "status_code" => 404
                    ]
                );
            }

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
