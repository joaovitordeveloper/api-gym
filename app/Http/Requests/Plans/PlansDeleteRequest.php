<?php

namespace App\Http\Requests\Plans;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;

class PlansDeleteRequest extends BaseRequest
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
            'data.id' => ['required', 'integer', Rule::exists('plans', 'id'),]
        ];
    }

    public function messages(): array
    {
        return [
            'data.id.exists' => 'O ID fornecido não existe.'
        ];
    }
}
