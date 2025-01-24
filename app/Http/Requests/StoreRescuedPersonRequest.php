<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRescuedPersonRequest extends FormRequest
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
            'country' => 'string|required|max:50',
            'genre' => 'required|in:Gizona,Emakumea,Beste bat',
            'birth_date' => 'nullable|date|before:today',
            'diagnostic' => 'required|string|max:255',
            'rescue_id' => 'required|exists:rescues,id',
            'doctor_id' => 'required|exists:doctors,id',
            'photo_src' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Izena derrigorrezkoa da.',
            'name.string' => 'Izena testu formatuan izan behar da.',
            'name.max' => 'Izena gehienez 100 karaktere izan ditzake.',
            
            'country.required' => 'Herrialdea derrigorrezkoa da.',
            'country.string' => 'Herrialdea testu formatuan izan behar da.',
            'country.max' => 'Herrialdea gehienez 50 karaktere izan ditzake.',
            
            'genre.required' => 'Generoa derrigorrezkoa da.',
            'genre.in' => 'Generoa ez da baliozkoa. Aukeratu Gizona, Emakumea edo Beste bat.',
            
            'birth_date.date' => 'Data balioduna izan behar da.',
            'birth_date.before' => 'Jaiotze-data gaurkoa baino lehen izan behar da.',

            'diagnostic.required' => 'Diagnostikoa derrigorrezkoa da.',
            'diagnostic.string' => 'Diagnostikoa testu formatuan izan behar da.',
            'diagnostic.max' => 'Diagnostikoa gehienez 255 karaktere izan ditzake.',

            'rescue_id.required' => 'Salbamendu identifikadorea derrigorrezkoa da.',
            'rescue_id.exists' => 'Salbamendu identifikadorea ez da existitzen.',
            
            'doctor_id.required' => 'Doktore identifikadorea derrigorrezkoa da.',
            'doctor_id.exists' => 'Doktore identifikadorea ez da existitzen.',
        ];
    }
}
