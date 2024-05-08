<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotationCreateRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'university_id' => 'required|exists:universities,id',
            'notation_criterion_id' => 'required|exists:notation_criteria,id', // Assurez-vous que la table des critères de notation est correctement référencée
            'note' => 'required',

        ];

    }
}
