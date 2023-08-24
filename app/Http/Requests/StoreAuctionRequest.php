<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuctionRequest extends FormRequest
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
            "start_date" => ['required', 'string', 'before_or_equal:end_date', 'after_or_equal:now'],
            "end_date" => ['required', 'date', 'after:start_date'],
        ];
    }
}
