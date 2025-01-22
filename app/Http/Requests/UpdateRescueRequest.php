<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRescueRequest extends FormRequest
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
        $orduak_regex = '/^([01]?[0-9]|2[0-3]):[0-5][0-9](?::[0-5][0-9])?$/';

        return [
            'travel_id' => 'required|exists:travel,id',
            'numero_rescatados' => 'required|integer|min:1',

            'start_time' => ['required', "regex:$orduak_regex"],
            'end_time' => ['required', "regex:$orduak_regex", 'after:start_time'],
        ];
    }

    public function messages(): array
    {
        return [
            'travel_id.required' => 'Bidaiaren IDa derrigorrezkoa da.',
            'travel_id.exists' => 'Aukeratutako bidaiaren IDa ez da existitzen.',

            'numero_rescatados.required' => 'Erreskatatutako pertsona kopurua derrigorrezkoa da.',
            'numero_rescatados.integer' => 'Erreskatatutako pertsona kopuruak zenbaki oso bat izan behar du.',
            'numero_rescatados.min' => 'Erreskatatutako pertsona kopuruak gutxienez 1 izan behar du.',

            'start_time.required' => 'Hasiera ordua derrigorrezkoa da.',
            'start_time.regex' => 'Hasiera orduak HH:mm edo HH:mm:ss formatua izan behar du.',

            'end_time.required' => 'Amaiera ordua derrigorrezkoa da.',
            'end_time.regex' => 'Amaiera orduak HH:mm edo HH:mm:ss formatua izan behar du.',
            'end_time.after' => 'Amaiera orduak hasiera orduaren ondorengoa izan behar du.',
        ];
    }
}
