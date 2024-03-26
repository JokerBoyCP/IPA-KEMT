<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'required|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'processing_date' => 'required|date',
            'employee_id' => 'required|exists:employees,id',
            'organization_id' => 'required|exists:organizations,id',
            'ticket_number' => 'integer',
        ];
    }
}
