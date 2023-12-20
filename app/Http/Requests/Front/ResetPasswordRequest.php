<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'token' => 'required',
            'email' => 'required|email|exists:front_members,email',
            'password' => 'required|confirmed',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'token.required' => 'الرابط غير صحيح من فضلك قم بإعادة الطلب مرة اّخري.',
            'email.required' => 'البريد الإلكتروني مطلوب!',
            'email.email' => 'البريد الإلكتروني غير صحيح!',
            'email.exists' => 'لا يمكننا العثور على مستخدم بعنوان البريد الإلكتروني هذا.',
            'password.required' => 'كلمة المرور مطلوبة!',
            'password.confirmed' => 'كلمة المرور غير مطابقة!',
        ];
    }
}
