<?php

namespace App\Http\Requests\Plans;

use App\Http\Requests\BaseRequest;

class PlansUpdateRequest extends BaseRequest
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
            'data.id' => 'required|integer|exists:plans,id',
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
            'data.id.required' => 'O ID do plano é obrigatório.',
            'data.id.integer' => 'O ID do plano deve ser um número inteiro.',
            'data.id.exists' => 'O plano informado não existe.',

            'data.name.required' => 'O nome do plano é obrigatório.',
            'data.name.string' => 'O nome do plano deve ser um texto.',
            'data.name.min' => 'O nome do plano deve ter pelo menos :min caracteres.',
            'data.name.max' => 'O nome do plano pode ter no máximo :max caracteres.',

            'data.value.required' => 'O valor do plano é obrigatório.',
            'data.value.regex' => 'O valor do plano deve ser um número com até duas casas decimais (ex: 99.90).',

            'data.limit_users.required' => 'O limite de usuários é obrigatório.',
            'data.limit_users.integer' => 'O limite de usuários deve ser um número inteiro.',
            'data.limit_users.min' => 'O limite de usuários deve ser maior que zero.',
        ];
    }
}
