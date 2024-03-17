<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListObjectRequest extends FormRequest
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

    /**
     * @return string[]
     */
    private function createRules(): array
    {
        return [
            'title' => 'required',
            'process_id' => ['required', Rule::exists('processes', 'id')]
        ];
    }

    /**
     * @return string[]
     */
    private function updateRules(): array
    {
        return [
            'title' => 'nullable'
        ];
    }
}
