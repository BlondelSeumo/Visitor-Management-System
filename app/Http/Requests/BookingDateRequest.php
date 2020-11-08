<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookingDateRequest extends FormRequest
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
            'purpose'       => 'required',
            'start_at'      => 'required',
            'end_at'        => 'required',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->startDateAndFutureDateValidation()) {
                $validator->errors()->add('start_at', 'the start date field does not take the previous date');
            }
            if ($this->endDateAndFutureDateValidation()) {
                $validator->errors()->add('end_at', 'the end date field does not take the previous date');
            }

            if(!$this->endDateAndFutureDateValidation() && !$this->startDateAndFutureDateValidation()){
                if($this->bookingDateAndFutureDateValidation()){
                    $validator->errors()->add('end_at', 'The end date a booking already');
                    $validator->errors()->add('start_at', 'The start date a  booking already');
                }
            }
        });
    }

    public function bookingDateAndFutureDateValidation()
    {
        $start_at = strtotime($this->input('start_at'));
        $end_at   = strtotime($this->input('end_at'));
        $employee = $this->session()->get('employee');
        $booking  = Booking::where('employee_id',$employee->id)->whereBetween('end_at', [date('Y-m-d h:i', $start_at) , date('Y-m-d h:i', $end_at)])->get();
        if(count($booking)) {
            return true;
        }else {
            return false;
        }
    }
    public function startDateAndFutureDateValidation()
    {
        $start_at = strtotime($this->input('start_at'));
        $end_at   = strtotime($this->input('end_at'));
        if(date('Y-m-d') <= date('Y-m-d', $start_at)) {
            return false;
        }else {
            return true;
        }
    }

    public function endDateAndFutureDateValidation()
    {
        $end_at   = strtotime($this->input('end_at'));
        if( date('Y-m-d') <= date('Y-m-d', $end_at)) {
            return false;
        }else {
            return true;
        }
    }

    public function attributes()
    {
        return [
            'start_at' => 'end time',
            'end_at'   => 'start time',
        ];
    }

}
