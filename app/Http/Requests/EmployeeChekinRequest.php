<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeChekinRequest extends FormRequest
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
            'date'          => 'required',
            'checkin_time'  => '',
            'checkout_time' => '',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->DateValidation()) {
                $validator->errors()->add('date', 'the date field does not take the previous date');
            }
        });
    }

    public function DateValidation()
    {
        $start_at = strtotime($this->input('date'));
        if(date('Y-m-d') <= date('Y-m-d', $start_at)) {
            return false;
        }else {
            return true;
        }
    }

    public function attributes()
    {
        return [
            'date' => 'date',
            'checkin_time' => 'checkin time',
            'checkout_time'   => 'checkout time',
        ];
    }

}
