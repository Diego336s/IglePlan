<?php

namespace App\Http\Requests\Ministerios;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMinisteriosRequest extends FormRequest
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
        $id = $this->route('ministerio');

        return [
          
            'ministerio' => 'required|string|max:255|unique:ministerios,ministerio,' . $id,
            'estado' => 'required|boolean',
            'descripcion' => 'required|string|max:255'
        ];
    }
}
