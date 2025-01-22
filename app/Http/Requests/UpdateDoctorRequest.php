<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
            'name' => 'string|required|max:100',
            'email' => [
                'required',
                // Posta elektronikoro balioztatzen duen regex-a
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                'unique:doctors,email,' . $this->route('medikuak'),
            ],
            'status' => 'nullable|string|in:Aktibo,Inaktibo,Bajan',
            'stop_date' => 'nullable|date',
            'reason' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Izena derrigorrezkoa da.',
            'name.string' => 'Izena testu bat izan behar da.',
            'name.max' => 'Izena 100 karaktere baino gehiago ez izan behar du.',
            
            'email.required' => 'Email-a derrigorrezkoa da.',
            'email.regex' => 'Email-a baliozko formatua izan behar du.',
            'email.unique' => 'Email hau dagoeneko erregistratuta dago.',
            
            'status.string' => 'Egoera testu bat izan behar da.',
            'status.in' => 'Egoera baliozko aukera bat izan behar da: Aktibo, Inaktibo, Bajan.',

            'stop_date.date' => 'Amaiera data baliozko data bat izan behar da.',
            
            'reason.string' => 'Arrazoia testu bat izan behar da.',
            'reason.max' => 'Arrazoia 255 karaktere baino gehiago ez izan behar du.',
        ];
    }
}
