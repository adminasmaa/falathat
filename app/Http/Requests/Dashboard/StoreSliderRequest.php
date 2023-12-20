<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
        $rules = [
            'translated_attributes' => 'required|array',
            'image' => ($this->slider ? 'nullable' : 'required_if:type,0') . '|image|max:2048',
            'icon' => 'required_if:type,1',
            'position' => 'required_if:type,0|in:0,1,2',
            'type' => 'required|in:0,1',
            'color' => 'required_if:type,1',
        ];

        Language::all()->each(function ($language) use (&$rules) {
            if ($language->required) {
                $rules["translated_attributes.{$language->id}.title"] = 'required';
                $rules["translated_attributes.{$language->id}.brief"] = 'required';
                $rules["translated_attributes.{$language->id}.link"] = 'nullable';
            }
        });

        return $rules;
    }
}
