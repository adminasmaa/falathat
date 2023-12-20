<?php

namespace App\Http\Requests\Front;

use App\Models\FrontMember;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
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
            'name_ar' => 'required',
            'type' => 'required|in:' . (implode(',', array_keys(FrontMember::TYPES))),
            'email' => 'required|email|unique:users,email,' . Auth::guard('member')->id()
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
            'type.required' => 'صفة المساهم مطلوبة!',
            'type.in' => 'صفة المساهم غير صحيحة!',
            'email.required' => 'البريد الإلكتروني مطلوب!',
            'email.email' => 'البريد الإلكتروني غير صحيح!',
            'email.unique' => 'البريد الإلكتروني مسجل بالفعل!',
        ];
    }
}
