<?php

namespace App\Http\Requests\Ministerios;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMinisteriosRequest extends FormRequest
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
            'ministerio' => 'required|unique:ministerios,ministerio|string|max:255',
            'descripcion' => 'required|string|max:255'
        ];
    }
}
