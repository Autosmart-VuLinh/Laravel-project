<?php

namespace Modules\Categories\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|max: 255',
            'slug' => 'required|max:255',
            'parent_id' => 'integer',
        ];
    }
    public function messages()
    {
        return [
            'required' => __('categories::validation.required'),
            'integer' => __('categories::validation.integer'),
            'max' =>  __('categories::validation.max'),
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('categories::validation.attributes.name'),
            'slug' => __('categories::validation.attributes.slug'),
            'parent_id' => __('categories::validation.attributes.parent_id'),
        ];
    }
}
