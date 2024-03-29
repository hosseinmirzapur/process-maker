<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ChangeAccountPassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'old' => 'required',
            'new' => ['required', Password::min(8)->mixedCase()],
            'confirm' => ['required', 'same:new']
        ];
    }
}
