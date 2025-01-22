<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCrewMemberRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'email' => [
                'required',
                // Posta elektronikoro balioztatzen duen regex-a
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                'unique:crew_members,email,' . $this->route('langileak'),
            ],
            'rol' => 'sometimes|required|string|in:Marinela,Erizaina,Mekanikoa,Makinen arduraduna,Zubiko ofiziala,Kapitaina',
            'status' => 'nullable|string|in:Aktibo,Inaktibo,Bajan',
            'stop_date' => 'nullable|date',
            'reason' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Izena derrigorrezkoa da.',
            'email.required' => 'Email-a derrigorrezkoa da.',
            'email.email' => 'Email-a baliozkoa izan behar da.',
            'email.unique' => 'Email hau dagoeneko erregistratuta dago.',
            'rol.required' => 'Rol-a derrigorrezkoa da.',
            'rol.in' => 'Rol-a ez da baliozkoa.',
            'status.required' => 'Egoera derrigorrezkoa da.',
            'status.in' => 'Egoera ez da baliozkoa.',
            'reason.max' => 'Arrazoia ezin da izan 255 karaktere baino gehiago.',
            'stop_date.date' => 'Amaiera data ez da baliozkoa.',
            'stop_date.after_or_equal' => 'Amaiera data hasiera dataren berdina edo handiagoa izan behar da.',
        ];
    }
}
