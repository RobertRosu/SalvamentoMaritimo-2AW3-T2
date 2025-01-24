<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RescuedPerson;
use App\Models\CrewMember;
use App\Models\Rescue;

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
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
        //
    }

    public function public_numbers(){
        try{
            $public_numbers = [
                "rescues" => Rescue::count(),
                "rescued_people" => RescuedPerson::count(),
                "workers" => CrewMember::count()
            ];

            return response()->json(
                [
                    "status" => "OK",
                    "message" => "Numbers retrieved successfully",
                    "status_code" => 200,
                    "response" => $public_numbers
                ]
            );
        }catch(\Exception $e){
            return response()->json(
                [
                    "status" => "ERROR",
                    "message" => "Error: $e",
                    "status_code" => 500,
                ]
            );
        }
    }

    public function countries(){
        try{
            $countries = RescuedPerson::select('country')->distinct()->pluck('country');

            if(!$countries){
                return response()->json(
                    [
                        'status' => 'ERROR',
                        'message' => 'Countries not found',
                        'status_code' => 404
                    ]
                );
            }

            return response()->json(
                [
                    'status' => 'OK',
                    'message' => 'Countries retrieved successfully',
                    'response' => $countries,
                    'status_code' => 200
                ]
            );
        }catch(\Exception $e){
            return response()->json(
                [
                    'status' => 'ERROR',
                    'message' => $e,
                    'status_code' => 500
                ]
            );
        }
    }
}
