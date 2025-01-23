<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTravelRequest extends FormRequest
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
        ];
    }
}
