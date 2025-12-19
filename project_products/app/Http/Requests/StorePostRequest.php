<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'=>'required|string',
            'content'=>'required|string'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Tiêu đề không được bỏ trống',
            'title.string'=>'tiêu đề phải là chuỗi ký tự',
            'title.max'=>"tiêu đề không vượt quá 255 ký tự",
            'content.required'=>'nội dung không được bỏ trống',
            'content.string'=>'nội dung phải là chuỗi ký tự'
        ];
    }
}
