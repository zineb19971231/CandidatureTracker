<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEntretienRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'candidature_id' => [
                'required',
                'exists:candidatures,id'
            ],

            'type' => [
                'required',
                'in:telephonique,RH,technique,final'
            ],

            'date_heure' => [
                'required',
                'date'
            ],

            'notes_prepa' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'resultat' => [
                'nullable',
                'in:positif,negatif,en attente'
            ],

        ];
    }
}
