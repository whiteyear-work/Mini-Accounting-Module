<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreJournalRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'entry_date' => ['required', 'date'],
            'description' => ['nullable', 'string'],
            'lines' => ['required', 'array'],
            'lines.*.account_id' => ['required', 'exists:accounts, id'],
            'lines.*.type' => ['required', 'in:debit,credit'],
            'lines.*.amount' => ['required', 'numeric', 'gt:0'],
        ];
    }

    // #[Override]
    // public function messages(): array
    // {
    //     return [];
    // }
}
