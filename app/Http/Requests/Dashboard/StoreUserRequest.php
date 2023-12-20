<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email' . ($this->user ? (',' . $this->user->id) : ''),
            'status' => 'required|boolean',
            'role_id' => 'required|exists:roles,id',
            'password' => ($this->user ? 'nullable|confirmed' : 'required|confirmed'),
            'password_confirmation' => ($this->user ? 'nullable' : 'required'),
        ];
    }
}
