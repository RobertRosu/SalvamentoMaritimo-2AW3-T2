<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\CrewMember;

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
            'origen' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'doctor_id' => 'required|exists:doctors,id',
            'kapitaina_id' => 'required|exists:crew_members,id,rol,Kapitaina',
            'makinen_arduraduna_id' => 'required|exists:crew_members,id,rol,Makinen arduraduna',
            'mekanikoa_id' => 'required|exists:crew_members,id,rol,Mekanikoa',
            'zubiko_ofiziala_id' => 'required|exists:crew_members,id,rol,Zubiko ofiziala',
            'marinela_1_id' => 'required|exists:crew_members,id,rol,Marinela|different:marinela_2_id|different:marinela_3_id',
            'marinela_2_id' => 'required|exists:crew_members,id,rol,Marinela|different:marinela_1_id|different:marinela_3_id',
            'marinela_3_id' => 'required|exists:crew_members,id,rol,Marinela|different:marinela_1_id|different:marinela_2_id',
            'erizaina_id' => 'required|exists:crew_members,id,rol,Erizaina',
            'start_date' => 'nullable|date',
            'description' => 'required|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'origen.required' => 'Jatorria derrigorrezkoa da.',
            'origen.string' => 'Jatorria testu bat izan behar da.',
            'origen.max' => 'Jatorria 255 karaktere baino gehiago ez izan behar du.',
            
            'destino.required' => 'Helmuga derrigorrezkoa da.',
            'destino.string' => 'Helmuga testu bat izan behar da.',
            'destino.max' => 'Helmuga 255 karaktere baino gehiago ez izan behar du.',
            
            'description.required' => 'Deskribapena derrigorrezkoa da.',
            'description.string' => 'Deskribapena testu bat izan behar da.',
            'description.max' => 'Deskribapena 1000 karaktere baino gehiago ez izan behar du.',
            
            'marinela_1_id.different' => 'Marinel 1a ezin da izan Marinela 2 edo Marinela 3arekin berdina.',
            'marinela_2_id.different' => 'Marinel 2a ezin da izan Marinela 1 edo Marinela 3arekin berdina.',
            'marinela_3_id.different' => 'Marinel 3a ezin da izan Marinela 1 edo Marinela 2arekin berdina.',
        ];
    }
}