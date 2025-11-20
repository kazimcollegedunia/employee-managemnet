<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('department'); // or route('department')

        return [
            'name' => 'required|max:255|unique:departments,name,' . $id,
            'description' => 'nullable|string',
        ];
    }
}
