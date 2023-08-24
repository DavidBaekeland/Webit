<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required', 'string', 'unique:auctions', 'max:255'],
            "end_date" => ['required', 'date'],
            "start_valuation" => ['required', 'integer', 'gte:0', 'lte:end_valuation'],
            "end_valuation" => ['required', 'integer', 'gte:start_valuation'],
            "images" => ['required']
        ];
    }
}
