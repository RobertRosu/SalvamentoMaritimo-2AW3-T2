<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            "name" => "string|required|max:100",
            "email" => [
                'required',
                'unique:doctors,email',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            "stop_date" => "date|required",
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Izena derrigorrezkoa da.',
            'name.string' => 'Izena testu bat izan behar da.',
            'name.max' => 'Izena 100 karaktere baino gehiago ez izan behar du.',

            'email.required' => 'Email-a derrigorrezkoa da.',
            'email.unique' => 'Email hau dagoeneko erregistratuta dago.',
            'email.regex' => 'Email-a baliozko formatua izan behar du.',

            'stop_date.required' => 'Amaiera data derrigorrezkoa da.',
            'stop_date.date' => 'Amaiera data baliozko data bat izan behar da.',
        ];
    }
}
