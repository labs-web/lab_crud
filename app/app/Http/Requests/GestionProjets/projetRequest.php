<?php
namespace App\Http\Requests\GestionProjets;

use Illuminate\Foundation\Http\FormRequest;

class projetRequest extends FormRequest
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
            'nom' => 'required|max:40',
            'description' => 'nullable|max:255',
            'tags' => 'required|max:255'
           
        ];
    }


    public function messages(): array
    {
        return [
            'nom.required' => __('GestionProjets/projet/validation.nomRequired'),
            'nom.max' => __('GestionProjets/projet/validation.nomMax'),
            'description.max' => __('GestionProjets/projet/validation.descriptionMax'),
           
        ];
    }
}