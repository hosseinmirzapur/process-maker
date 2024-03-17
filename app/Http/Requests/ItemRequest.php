<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'done' => ['required', 'boolean']
        ];
    }

    /**
     * @return string[]
     */
    private function putRules(): array
    {
        return [
            'title' => 'nullable',
            'done' => 'boolean'
        ];
    }
}
