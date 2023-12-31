<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class SendResetLinkRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:front_members,email'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'البريد الإلكتروني مطلوب!',
            'email.email' => 'البريد الإلكتروني غير صحيح!',
            'email.exists' => 'لا يمكننا العثور على مستخدم بعنوان البريد الإلكتروني هذا.'
        ];
    }
}
