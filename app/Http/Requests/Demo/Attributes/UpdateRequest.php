<?php

namespace App\Http\Requests\Demo\Attributes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'type' => ['required', 'string'],

            'options'   => ['array'],
            'options.*' => ['required', 'string'],
        ];
    }

    /**
     * Get the validator instance for the request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $this->formatOptions();

        return parent::getValidatorInstance();
    }

    protected function formatOptions()
    {
        $options = [];

        foreach ($this->input('options', []) as $option) {
            if (! $option['key'] and ! $option['value']) {
                continue;
            }

            $options[$option['key']] = $option['value'];
        }

        $this->merge(['options' => $options]);
    }
}
