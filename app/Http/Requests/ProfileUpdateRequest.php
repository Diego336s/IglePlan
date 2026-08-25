<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('user');
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($id),
            ],
            'last_name' => 'required|string|max:255',
            'rol_id' => 'required|integer|exists:rols,id',
            'password' => 'nullable|string|min:8',
            'telefono' => [
                'required',
                'string',
                'digits:10',
                Rule::unique('users', 'telefono')->ignore($id),
            ],
            'estado' => 'required|integer|boolean',
        ];
    }
}
