<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCrewMemberRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'unique:crew_members,email',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'rol' => 'required|string|in:Marinela,Erizaina,Mekanikoa,Makinen arduraduna,Zubiko ofiziala,Kapitaina',
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
        ];
    }

}
