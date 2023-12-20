<?php

namespace App\Http\Requests\Dashboard\BulkActions\Admins;

use Illuminate\Foundation\Http\FormRequest;

class BulkChangeStatusesRequest extends FormRequest
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
            'bulk_ids' => 'required|array',
            'bulk_ids.*' => 'required|integer',
            'status' => 'required|in:0,1'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'bulk_ids.required' => 'please, select at least one admin to proceed',
            'bulk_ids.*.required' => 'please, select at least one admin to proceed',
            'status.required' => 'please, select status to proceed',
            'status.in' => 'please, select status to proceed'
        ];
    }
}
