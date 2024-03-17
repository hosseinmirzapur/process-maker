<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessRequest extends FormRequest
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

        return $this->isMethod('POST') ? $this->createRules() : $this->updateRules();
    }

    /**
     * @return string[]
     */
    private function createRules(): array
    {
        return [
            'name' => 'required',
            'description' => 'nullable',
        ];
    }

    /**
     * @return string[]
     */
    private function updateRules(): array
    {
        return [
            'name' => 'nullable',
            'description' => 'nullable'
        ];
    }
}
