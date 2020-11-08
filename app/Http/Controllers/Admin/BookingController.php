<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BookingStatus;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingDateRequest;
use App\Models\Attendance;
use App\Models\Booking;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Invitation;
use App\Models\Visitor;
use App\Notifications\SendInvitationToVisitors;
use App\Notifications\SendVisitorToEmployee;
use App\Services\Booking\BookingService;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;

        $this->middleware('auth')->except(['getEmployee', 'getEmployeeProfile']);
        $this->middleware(['role:admin|employee|reception']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $bookings = $this->bookingService->all($request);
        $bookingID = DB::table('bookings')->latest('id')->first();
        if($bookingID){
            $booking = $this->bookingService->find($bookingID->id);
        }else{
            $booking = null;
        }

        session()->forget('visitor');
        session()->forget('employee');
        session()->forget('invitations');
        return view('admin.booking.index', compact('bookings','booking'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show(Request $request, $id)
    {
        $bookings = $this->bookingService->all($request);
        $booking = $this->bookingService->find($id);
        return view('admin.booking.index', compact('bookings','booking' ));
    }

    public function create(Request $request)
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('reception')) {
            $bookings = $this->bookingService->all($request);
            $employees = Employee::all();
            $employeeID = DB::table('employees')->latest('id')->first();
            if($employeeID){
                $employee = Employee::find($employeeID->id);
            } else {
                $employee = null;
            }

            $departments = Department::all();
            return view('admin.booking.create', compact('bookings','employees','employee','departments'));
        } else {
            $employee = Employee::find(auth()->id());
            $request->session()->put('employee', $employee);
            return redirect()->route('admin.bookings.step-two');
        }
    }

    public function postCreateStepOne(Request $request)
    {
        $employee = Employee::find($request['employeeID']);
        $request->session()->put('employee', $employee);
        return redirect()->route('admin.bookings.step-two');
    }

    public function createStepTwo(Request $request)
    {
        $bookings = $this->bookingService->all($request);
        $employee = $request->session()->get('employee');
        return view('admin.booking.create-step-two', compact('bookings','employee'));
    }

    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'name'   => 'required',
            'email'        => 'required|unique:visitors,email',
            'phone'        => 'required|unique:visitors,phone',
            'company_name' => '',
            'company_employee_id' => '',
            'national_identification_no' => '',
            'is_group_enabled' => '',
            'address' => '',
        ]);

        $GroupList = [];
        if($request->counter > 0) {
            for($i = 1; $i <= $request->counter; $i++) {
                $GroupList[$i] = array(
                    'name'          => $request['name_'.$i],
                    'email'       => $request['email_'.$i]
                );
            }
        }

        $request->session()->put('visitor', $validatedData);
        $request->session()->put('invitations', $GroupList);

        return redirect()->route('admin.bookings.step-three');
    }

    public function createStepThree(Request $request)
    {
        $bookings = $this->bookingService->all($request);
        $employee = $request->session()->get('employee');
        $visitor = $request->session()->get('visitor');
        return view('admin.booking.create-step-three', compact('visitor','bookings','employee'));
    }

    public function store(BookingDateRequest $request)
    {

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

        $regBooking =  DB::table('bookings')->orderBy('reg_no', 'desc')->first();
        $date   =   date('y-m-d');
        $data  =    substr($date,0,2);
        $data1  =   substr($date,3,2);
        $data2  =   substr($date,6,8);
        if($regBooking){
            $value = substr($regBooking->reg_no, -2);
            if($value <100){
                $reg_no = $data.$data1.$data2.$value+1;
            }else{
                $reg_no = $data.$data1.$data2.'00';
            }
        }else{
            $reg_no = $data.$data1.$data2.'00';
        }

        $getVisitor = $request->session()->get('visitor');
        $getEmployee = $request->session()->get('employee');
        $getInvitation = $request->session()->get('invitations');

        $visitor                = new Visitor();
        $visitor->name          = $getVisitor['name'];
        $visitor->email         = $getVisitor['email'];
        $visitor->phone         = $getVisitor['phone'];
        $visitor->company_name  = $getVisitor['company_name'];
        $visitor->address       = $getVisitor['address'];
        $visitor->vuid          = $vuid;
        $visitor->status        = 0;
        $visitor->company_employee_id  = $getVisitor['company_employee_id'];
        $visitor->national_identification_no  = $getVisitor['national_identification_no'];
        $visitor->save();

        if($visitor){
            $booking                          = new Booking();
            $booking->reg_no                  = $reg_no;
            $booking->purpose                 = $request['purpose'];
            $booking->start_at                = $request['start_at'];
            $booking->end_at                  = $request['end_at'];
            $booking->user_id                 = $getEmployee->user_id;
            $booking->employee_id             = $getEmployee->id;
            $booking->is_pre_register         = 1;
            $booking->status                  = 10;
            $booking->is_group_enabled        = $getVisitor['is_group_enabled'];
            $booking->invitation_people_count = $getInvitation !=null? count($getInvitation)+1:1;
            $booking->accept_invitation_count = 1;
            $booking->save();

            if($booking){
                do {
                    $activeToken = Str::random(20);
                } while (Invitation::where('activation_token', $activeToken)->first());
                $invitee                          = new Invitation();
                $invitee->booking_id              = $booking->id;
                $invitee->visitor_id              = $visitor->id;
                $invitee->name                    = $visitor->name;
                $invitee->email                   = $visitor->email;
                $invitee->checkin_at              = $request['start_at'];
                $invitee->checkout_at             = $request['end_at'];
                $invitee->activation_token        = $activeToken;
                $invitee->status                  = 5;
                $invitee->save();
                try {
                    $getEmployee->user()->notify(new SendVisitorToEmployee($invitee));
                } catch (\Exception $e) {
                    // Using a generic exception

                }
                if($getInvitation !=null){
                    foreach ($getInvitation as $key=> $invitation) {
                        do {
                            $token = Str::random(20);
                        } while (Invitation::where('activation_token', $token)->first());

                        $invitee                    = new Invitation();
                        $invitee->booking_id        = $booking->id;
                        $invitee->name              = $invitation['name'];
                        $invitee->email             = $invitation['email'];
                        $invitee->checkin_at        = $request['start_at'];
                        $invitee->checkout_at       = $request['end_at'];
                        $invitee->activation_token  = $token;
                        $invitee->status            = 10;
                        $invitee->save();

                        if(setting('notifications_email') == true){
                            try {
                                Notification::route('mail', $invitation['email'])
                                    ->notify(new SendInvitationToVisitors($invitee));
                            } catch (\Exception $e) {
                                // Using a generic exception
                            }

                        }
                    }
                }
                return redirect()->route('admin.bookings.index')->with('success','booking  successfully');
            }
        }
    }

    public function approvedUnapproved($id)
    {
        $booking = $this->bookingService->find($id);
        if($booking->status == '10'){
            $booking->status = BookingStatus::APPROVED;
            $booking->save();
        }else{
            $booking->status = BookingStatus::UNAPPROVED;
            $booking->save();
        }
        return back()->with('success','Booking updated successfully');
    }
    public function destroy($id)
    {
        $this->bookingService->delete($id);
        return back()->with(['success' => 'Booking delete successfully.']);
    }
}
