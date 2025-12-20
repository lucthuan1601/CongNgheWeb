<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIssueRequest extends FormRequest
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
            'computer_id' => 'required|exists:computers,id',
            'reported_by' =>'required|string|max:50',
            'reported_date' =>'required|date',
            'description' =>'required',
            'urgency' =>'required',
            'status' =>'required',
        ];
    }
}
