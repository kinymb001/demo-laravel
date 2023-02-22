<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
                Rule::unique('categories', 'name')->ignore($this->category)
            ],
            'description' => 'required|max:1000|min:2',
        ];
    }

    public function messages(){
        return [
            'name.required' => "Danh mục không được để trống",
            'name.min' => 'Danh mục kiếm tối thiểu 2 ký tự',
            'name.max' => 'Danh mục tối đa 100 ký tự',
            'name.unique' => 'Danh mục đã có',
            'description.required' => "Mô tả danh mục không được để trống",
            'description.min' => "Mô tả danh mục tối thiểu 2 ký tự",
            'description.max' => "Mô tả danh mục tối đa 1000 ký tự",
        ];
    }
}
