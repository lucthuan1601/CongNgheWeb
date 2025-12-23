<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'student_code'=>'required|string',
            'name'=>'required|string',
            'email'=>'required|email|string',
            'phone'=>'required|max:20',
            'date_of_birth'=>'required',
            'class_id'=>'required|exists:classes,id',
            'address'=>'required|string',
            'gender'=>'required|string',
            'status'=>'required|string'
        ];
    }
}
