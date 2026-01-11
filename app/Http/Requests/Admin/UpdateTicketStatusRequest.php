<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // admin middleware already applied
    }

    public function rules(): array
    {
        return [
            'status' => 'required|in:open,in_progress,closed',
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Status is required',
            'status.in'       => 'Invalid status value',
        ];
    }
}
 