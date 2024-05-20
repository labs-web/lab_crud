<?php
namespace App\Http\Requests\GestionTasks;

use Illuminate\Foundation\Http\FormRequest;

class taskRequest extends FormRequest
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
        ];
    }


    public function messages(): array
    {
        return [
            'nom.required' => __('GestionTasks/task/validation.nomRequired'),
            'nom.max' => __('GestionTasks/task/validation.nomMax'),
            'description.max' => __('GestionTasks/task/validation.descriptionMax'),
           
        ];
    }
}