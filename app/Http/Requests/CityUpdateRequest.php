<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityUpdateRequest extends FormRequest
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
            'name' => 'string|min:4|max:50',
            'region' => 'string|min:4|max:50',
            'country' => 'string|min:4|max:50',
            'postal_code' => 'string|size:4',
            'lati' => 'string',
            'long' => 'string',
            'time_zone' => "timezone",
            'currency_code' => 'size:3',
            'population' => 'integer',
            'languages_spoken' => 'array',
            'current_gdp_contribution' => 'decimal:2,6'
        ];
    }
}
