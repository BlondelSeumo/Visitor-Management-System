<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreRegisterRequest extends FormRequest
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
            'first_name'                => 'required|string|max:255',
            'last_name'                 => 'required|string|max:20',
            'email'                     => 'required|string|max:255|email',
            'phone'                     => 'required|string|max:20',
            'employee_id'               => 'required|numeric',
            'gender'                    => 'required|numeric',
            'expected_date'             => 'required',
            'expected_time'             => 'required',
        ];
    }
}
