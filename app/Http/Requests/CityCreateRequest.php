<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityCreateRequest extends FormRequest
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
            'id' => 'required|string',
            'name' => 'required|string|min:4|max:50',
            'region' => 'required|string|min:4|max:50',
            'country' => 'required|string|min:4|max:50',
            'postal_code' => 'required|string|size:4',
            'lati' => 'required|string',
            'long' => 'required|string',
            'time_zone' => "timezone",
            'currency_code' => 'string|size:3',
            'population' => 'required|integer',
            'languages_spoken' => 'array',
            'current_gdp_contribution' => 'decimal:2,6'
        ];
    }
}
