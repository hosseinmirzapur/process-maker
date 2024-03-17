<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
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
        return $this->isMethod('post') ? $this->postRules() : $this->putRules();
    }

    /**
     * @return string[]
     */
    private function postRules(): array
    {
        return [
            'content' => 'required',
            'account_id' => ['required', Rule::exists('accounts', 'id')],
            'card_id' => ['required', Rule::exists('cards', 'id')]
        ];
    }

    /**
     * @return string[]
     */
    private function putRules(): array
    {
        return [
            'content' => 'nullable'
        ];
    }
}
