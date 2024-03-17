<?php

namespace App\Http\Requests;

use App\Models\Account;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AccountRequest extends FormRequest
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
        return $this->isMethod('post') ? $this->createRules() : $this->updateRules();
    }

    private function createRules(): array
    {
        return [
            'username'=> ['required', Rule::unique('accounts', 'username')],
            'password' => ['required', Password::min(8)->mixedCase()],
            'fullname' => 'nullable',
            'status' => ['required', Rule::in(Account::STATUS)],
            'role' => 'required'
        ];
    }

    private function updateRules(): array
    {
        return [];
    }
}
