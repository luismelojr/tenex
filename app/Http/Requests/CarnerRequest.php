<?php

namespace App\Http\Requests;

use App\Enums\FrequencyEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarnerRequest extends FormRequest
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
            'total_amount' => 'required|numeric|min:0',
            'installment_count' => 'required|integer|min:1',
            'first_due_date' => 'required|date',
            'frequency' => ['required', Rule::in(FrequencyEnum::values())],
            'down_payment' => 'nullable|numeric|min:0'
        ];
    }
}
