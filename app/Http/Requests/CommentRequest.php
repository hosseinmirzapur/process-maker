<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'content' => 'required'
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
