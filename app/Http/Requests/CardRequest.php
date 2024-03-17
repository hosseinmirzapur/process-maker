<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CardRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'nullable',
            'deadline' => ['nullable', 'date'],
            'list_id' => ['required', Rule::exists('list_objects', 'id')]
        ];
    }

    /**
     * @return array
     */
    private function putRules(): array
    {
        return [
            'title' => 'nullable',
            'description' => 'nullable',
            'deadline' => ['nullable', 'date']

        ];
    }
}
