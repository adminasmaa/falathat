<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommitteeMemberRequest extends FormRequest
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
            'image' => ($this->member ? 'nullable' : 'required') . '|image|max:2048',
            'membership_number' => 'required'
        ];

        Language::all()->each(function ($language) use (&$rules) {
            if ($language->required) {
                $rules["translated_attributes.{$language->id}.name"] = 'required';
            }
        });

        return $rules;
    }
}