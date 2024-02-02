<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LocationsStoreUpdateRequest extends FormRequest
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
            'id' => 'int|required|unique:locations',
            'user_id' => 'int|required|unique:locations',
            'company_id' => 'int|required|unique:locations',
            'sector_id' => 'int|required|unique:locations',
            'return_forecast' => 'nullable',

        ];
    }
}
