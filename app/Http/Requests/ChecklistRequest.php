<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChecklistRequest extends FormRequest
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
    public function postRules(): array
    {
        return [
            'title' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function putRules(): array
    {
        return [
            'title' => 'nullable'
        ];
    }
}
