<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
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
            'name' => [
                'required', 'max:100', 'min:2',
                Rule::unique('tags', 'name')->ignore($this->tag)
            ],
        ];
    }

    public function messages(){
        return [
            'name.required' => "Tag không được để trống",
            'name.min' => 'Tag kiếm tối thiểu 2 ký tự',
            'name.max' => 'Tag tối đa 100 ký tự',
            'name.unique' => 'Tag đã có',
        ];
    }
}
