<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Travel;
use Carbon\Carbon;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $travels = Travel::select('origen', 'destino', 'start_date', 'description')->orderBy('start_date', 'desc')->get();

            return response()->json(
                [
                    "status" => 'OK', 
                    "message" => "Travels retrieved successfully", 
                    "status_code" => 200,
                    "response" => $travels
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
}
