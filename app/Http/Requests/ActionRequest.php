<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActionRequest extends FormRequest
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
     * @return array
     */
    private function postRules(): array
    {
        return [
            'title' => ['required', Rule::unique('actions', 'title')],
            'has_upload' => ['required', 'boolean'],
            'has_payment' => ['required', 'boolean'],
            'label_id' => ['required', Rule::exists('labels', 'id')]
        ];
    }

    /**
     * @return array
     */
    private function putRules(): array
    {
        return [
            'title' => ['nullable', Rule::unique('actions', 'title')],
            'has_upload' => ['nullable', 'boolean'],
            'has_payment' => ['nullable', 'boolean']
        ];
    }
}
