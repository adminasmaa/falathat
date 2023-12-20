<?php

namespace App\Http\Requests\Front;

use App\Models\FrontMember;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name_ar' => 'required|string',
            'type' => 'required|in:' . (implode(',', array_keys(FrontMember::TYPES))),
            'email' => 'required|email|unique:front_members,email',
            'password' => 'required|confirmed'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'name_ar.required' => 'الاسم بالكامل مطلوب!',
            'name_ar.string' => 'الاسم بالكامل غير صحيح!',
            'type.required' => 'حقل من انت ؟ مطلوب!',
            'type.in' => 'حقل من انت ؟ مطلوب!',
            'email.required' => 'البريد الإلكتروني مطلوب!',
            'email.email' => 'البريد الإلكتروني غير صحيح!',
            'email.unique' => 'البريد الإلكتروني مسجل بالفعل!',
            'password.required' => 'كلمة المرور مطلوبة!',
            'password.confirmed' => 'كلمة المرور غير مطابقة!',
        ];
    }
}
