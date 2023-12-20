<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
        return [
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'required|image|max:2048',
            'phone' => 'required',
            'phone_code' => 'required',
            'email' => 'required|email',
            'birthdate' => 'required|date',
            'address' => 'required|string',
            'type' => 'required|in:',
            'CV' => 'required|file',
            'job_id' => 'required|exists:jobs,id'
        ];
    }
}
