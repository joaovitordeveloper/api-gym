<?php

namespace App\Http\Requests\Plans;

use App\Http\Requests\BaseRequest;

class PlansRegisterRequest extends BaseRequest
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
            'data.name' => 'required|string|min:4|max:50',
            'data.value' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'data.limit_users' => 'required|integer|min:1',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'data.name.required' => 'O nome é obrigatório.',
            'data.name.string' => 'O nome deve ser um texto.',
            'data.name.min' => 'O nome deve ter pelo menos :min caracteres.',
            'data.name.max' => 'O nome pode ter no máximo :max caracteres.',

            'data.value.required' => 'O valor é obrigatório.',
            'data.value.regex' => 'O valor deve ser um número com até duas casas decimais (ex: 10.50).',

            'data.limit_users.required' => 'O limite de usuários é obrigatório.',
            'data.limit_users.integer' => 'O limite de usuários deve ser um número inteiro.',
            'data.limit_users.min' => 'O limite de usuários deve ser maior que zero.',
        ];
    }
}
