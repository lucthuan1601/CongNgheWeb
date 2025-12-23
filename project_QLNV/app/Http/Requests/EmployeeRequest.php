<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'department_id'=>'required|exists:departments,id',
            'name'=>'required|string|max:100',
            'email'=>'required|email|string|max:100|unique:employees,email',
            'phone'=>'required|string|min:10|max:20',
            'position'=>'required|string|max:50',
            'salary'=>'required|numeric|min:0',
        ];
    }
}
