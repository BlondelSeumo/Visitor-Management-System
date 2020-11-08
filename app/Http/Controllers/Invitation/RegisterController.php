<?php

namespace App\Http\Controllers\Invitation;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Invitation;
use App\Models\Visitor;
use App\Notifications\SendVisitorToEmployee;
use Illuminate\Http\Request;
use DB;

class RegisterController extends Controller
{

    public function index($activeToken)
    {
        $invitation = Invitation::where('activation_token', $activeToken)->first();
        $visitor = Visitor::find($invitation->booking->invitationFirst->visitor->id);
        if ($visitor){
            return view('invitation.register',compact('visitor','invitation'));
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'   => 'required',
            'email'        => 'required',
            'phone'        => 'required',
            'company_name' => '',
            'company_employee_id' => '',
            'national_identification_no' => '',
            'address' => '',
        ]);
        $visitorCheck = Visitor::where('email', $request['email'])->first();
        if($visitorCheck){
            $invitation = Invitation::where('activation_token', $request['activation_token'])->first();
            $invitation-> visitor_id    = $visitorCheck->id;
            $invitation->status         = 5;
            $invitation->save();
            $booking = Booking::find($invitation->booking_id);
            $booking->accept_invitation_count = $booking->accept_invitation_count+1;
            $booking->save();
            try {
                $booking->host->user()->notify(new SendVisitorToEmployee($invitation));
            } catch (\Exception $e) {
                // Using a generic exception

            }

        }else{
            $vuidVisitor =  DB::table('visitors')->orderBy('vuid', 'desc')->first();
            $date   =   date('y-m-d');
            $data  =    substr($date,0,2);
            $data1  =   substr($date,3,2);
            $data2  =   substr($date,6,8);
            if($vuidVisitor){
                $value = substr($vuidVisitor->vuid, -2);
                if($value <100){
                    $vuid =$data.$data1.$data2.$value+1;
                }else{
                    $vuid = $data.$data1.$data2.'00';
                }
            }else{
                $vuid = $data.$data1.$data2.'00';
            }
            $visitor                = new Visitor();
            $visitor->name          = $request['name'];
            $visitor->email         = $request['email'];
            $visitor->phone         = $request['phone'];
            $visitor->company_name  = $request['company_name'];
            $visitor->address       = $request['address'];
            $visitor->vuid          = $vuid;
            $visitor->status        = 1;
            $visitor->company_employee_id  = $request['company_employee_id'];
            $visitor->national_identification_no  = $request['national_identification_no'];
            $visitor->save();

            if($visitor){
                $invitation = Invitation::where('activation_token', $request['activation_token'])->first();
                $invitation-> visitor_id    = $visitor->id;
                $invitation->status         = 5;
                $invitation->save();
                $booking = Booking::find($invitation->booking_id);
                $booking->accept_invitation_count = $booking->accept_invitation_count+1;
                $booking->save();
            }
        }

        return redirect()->route('/');
    }

}
