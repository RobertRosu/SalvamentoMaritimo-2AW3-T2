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
        $id = $this->route('id'); // Obtener el ID del miembro de la tripulación desde la ruta

        return [
            'name' => 'required|max:200',
            'email' => [
                'required',
                'email',
                Rule::unique('crew_members', 'email')->ignore($id), // Ignorar el email actual
            ],
            'rol' => 'required',
            'start_date' => 'date',
            'stop_date' => 'nullable|date',  // Este es opcional
            'status' => 'in:Aktibo,Inaktibo,Bajan',
            'reason' => 'nullable|max:200',  // Este también es opcional
        ];
    }
}
