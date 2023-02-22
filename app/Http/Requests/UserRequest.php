<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:1000|min:2',
            'email' => [
                'required', 'max:100', 'min:2',
                Rule::unique('users', 'email')->ignore($this->user)
            ],
            'description' => 'required|max:1000|min:2',
            'phone' => [
                'required', 'max:100', 'min:2',
                Rule::unique('users', 'phone')->ignore($this->user)
            ],
        ];
    }
}