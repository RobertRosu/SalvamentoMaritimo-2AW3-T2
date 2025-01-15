<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTravelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "origen" => "required",
            "destino" => "required",
            "doctor_id" => "required",
            "kapitaina_id" => "required",
            "makinen_arduradun" => "required",
            "mekanikoa_id" => "required",
            "zubiko_ofiziala_id" => "required",
            "marinela_1_id" => "required",
            "marinela_2_id" => "required",
            "marinela_3_id" => "required",
            "erizaina_id" => "required"
        ];
    }
}
