<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidatureRequest extends FormRequest
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
            'nom_entreprise'=> 'required|string|max:255',
            'poste'=> 'required|string|max:255',
            'url_offre'=> 'nullable|url',
            'statut'=> 'required|in:a examiner,entretien programme,offre reçue,refusee,abandonnee',
            'priorite'=> 'required|in:haute,moyenne,faible',
            'date_candidature'=> 'required|date',
            'notes'=> 'nullable|string',
        ];
    }
}
