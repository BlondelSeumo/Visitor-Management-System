<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingDateRequest;
use App\Managers\CheckInManager;
use App\Managers\EmployeeManager;
use App\Models\Booking;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Invitation;
use App\Models\Visitor;
use App\Notifications\SendInvitationToVisitors;
use App\Notifications\SendVisitorToEmployee;
use App\Services\Booking\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use NotificationChannels\Twilio\TwilioChannel;

class CheckInController extends Controller
{
    protected $employeeManager;
    protected $checkInManager;
    /**
     * @var BookingService
     */
    private $bookingService;

    function __construct(EmployeeManager $employeeManager, CheckInManager $checkInManager, BookingService $bookingService)
    {
        $this->employeeManager = $employeeManager;
        $this->checkInManager  = $checkInManager;
        $this->bookingService = $bookingService;
    }

    public function index()
    {
        session()->forget('visitor');
        session()->forget('is_pre_registered');
        session()->forget('employee');
        return view('check-in.dashboard');
    }

    /**
     * Show the step 1 Form for creating a new product.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function createStepOne(Request $request)
    {
        $employees = Employee::all();
        $employeeID = DB::table('employees')->latest('id')->first();
        if($employeeID){
            $employee = Employee::find($employeeID->id);
        }else{
            $employee = null;
        }
        $departments = Department::all();

        return view('check-in.step-one', compact('employees','employee','departments'));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepOne(Request $request)
    {

        $employee = Employee::find($request->get('employeeID'));
        $request->session()->put('employee', $employee);

        return redirect()->route('check-in.step-two');
    }

    /**
     * Show the step 2 Form for creating a new product.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $employee = $request->session()->get('employee');
        $visitor = $request->session()->get('visitor');
        $is_pre_registered = $request->session()->get('is_pre_registered');

        return view('check-in.step-two', compact('employee', 'visitor','is_pre_registered'));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepTwo(Request $request)
    {
        if ($request->session()->get('is_returned') == false || empty($request->session()->get('is_returned'))) {
            $validatedData = $request->validate([
                'name'          => 'required',
                'email'        => 'required',
                'phone'        => 'required',
                'company_name' => '',
                'company_employee_id' => '',
                'national_identification_no' => '',
                'is_group_enabled' => '',
                'address' => '',
            ]);
        } else {
            $validatedData = $request->validate([
                'name'          => 'required',
                'email'        => 'required|unique:visitors,email',
                'phone'        => 'required|unique:visitors,phone',
                'company_name'  => '',
                'company_employee_id' => '',
                'national_identification_no' => '',
                'is_group_enabled' => '',
                'address' => '',
            ]);
        }

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

        return redirect()->route('check-in.step-three');
    }

    /**
     * Show the Product Review page
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function createStepThree(Request $request)
    {
        $employee = $request->session()->get('employee');
        $visitor = $request->session()->get('visitor');

        return view('check-in.step-three', compact('visitor','employee'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreateStepThree(Request $request)
    {
        $visitor = $request->session()->get('visitor');
        if ($visitor) {
            if($request->has('photo')) {
                $request->validate([
                    'photo' => 'required',
                ]);

                $encoded_data = $request['photo'];
                $image = str_replace('data:image/png;base64,', '', $encoded_data);
                $image = str_replace(' ', '+', $image);
                $imageName = Str::random(10).'.'.'png';
                file_put_contents($imageName,  base64_decode($image));
                $url = public_path($imageName);
                $request->session()->put('visitor_photo', $url);
            }
            return redirect()->route('check-in.step-four');
        } else {
            redirect()->route('check-in.step-one')->with('error', 'visitor information not found, fill again!');
        }
    }
    /**
     * Show the Product Review page
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function createStepFour(Request $request)
    {
        $employee = $request->session()->get('employee');
        $visitor = $request->session()->get('visitor');

        return view('check-in.step-four', compact('visitor','employee'));
    }

    /**
     * @param BookingDateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookingDateRequest $request)
    {
        if(setting('visitor_agreement')){
            $request->validate([
                'agreement'     => 'required',
            ]);
        }

        $vuidVisitor =  DB::table('visitors')->orderBy('vuid', 'desc')->first();
        $date   =   date('y-m-d');
        $data   =   substr($date,0,2);
        $data1  =   substr($date,3,2);
        $data2  =   substr($date,6,8);
        if($vuidVisitor){
            $value = substr($vuidVisitor->vuid, -2);
            if($value <100){
                $vuid = $data.$data1.$data2.$value+1;
            } else {
                $vuid = $data.$data1.$data2.'00';
            }
        }else{
            $vuid = $data.$data1.$data2.'00';
        }

        $regBooking =  DB::table('bookings')->orderBy('reg_no', 'desc')->first();
        $date       =   date('y-m-d');
        $data       =   substr($date,0,2);
        $data1      =   substr($date,3,2);
        $data2      =   substr($date,6,8);
        if($regBooking) {
            $value = substr($regBooking->reg_no, -2);
            if($value <100){
                $reg_no = $data.$data1.$data2.$value+1;
            }else{
                $reg_no = $data.$data1.$data2.'00';
            }
        } else {
            $reg_no = $data.$data1.$data2.'00';
        }

        $getVisitor = $request->session()->get('visitor');
        $getEmployee = $request->session()->get('employee');
        $getInvitation = $request->session()->get('invitations');
        $visitor_photo = $request->session()->get('visitor_photo');
        DB::beginTransaction();
        try {
            if ($request->session()->get('is_pre_registered') == false && ($request->session()->get('is_returned') == false || empty($request->session()->get('is_returned')))) {
                $visitor                                = new Visitor();
                $visitor->name                          = $getVisitor['name'];
                $visitor->email                         = $getVisitor['email'];
                $visitor->phone                         = $getVisitor['phone'];
                $visitor->company_name                  = $getVisitor['company_name'];
                $visitor->address                       = $getVisitor['address'];
                $visitor->vuid                          = $vuid;
                $visitor->status                        = 1;
                $visitor->company_employee_id           = $getVisitor['company_employee_id'];
                $visitor->national_identification_no    = $getVisitor['national_identification_no'];
                $visitor->save();
                $visitor->addMedia($visitor_photo)->toMediaCollection('visitor');
                File::delete($visitor_photo);

            } else {
                $visitor = Visitor::find($request->session()->get('visitor_id'));
                $visitor->addMedia($visitor_photo)->toMediaCollection('visitor');
                File::delete($visitor_photo);
            }
            if($request->session()->get('is_pre_registered') == false ){
                if($visitor) {
                    $booking                          = new Booking();
                    $booking->reg_no                  = $reg_no;
                    $booking->purpose                 = $request['purpose'];
                    $booking->start_at                = $request['start_at'];
                    $booking->end_at                  = $request['end_at'];
                    $booking->user_id                 = $getEmployee->user_id;
                    $booking->employee_id             = $getEmployee->id;
                    $booking->is_pre_register         = 0;
                    $booking->status                  = 10;
                    $booking->is_group_enabled        = $getVisitor['is_group_enabled'];
                    $booking->invitation_people_count = $getInvitation !=null? count($getInvitation)+1:1;
                    $booking->accept_invitation_count = 1;
                    $booking->attendee_count          = 1;
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
                    }
                }
            }else {

                if($visitor) {
                        $invitee                          = Invitation::find($visitor->invitation->id);
                        $booking                          = Booking::find($invitee->booking_id);
                        $booking->attendee_count          = $booking->attendee_count + 1;
                        $booking->is_pre_register         = 0;
                        $booking->save();

                        $invitee->checkin_at              = $request['start_at'];
                        $invitee->checkout_at             = $request['end_at'];
                        $invitee->status                  = 5;
                        $invitee->save();
                    }
                }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json(['error' => $ex->getMessage()], 500);
        }

        return redirect()->route('check-in.show', $booking);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $booking = $this->bookingService->find($id);
        if($booking) {
            return view('check-in.show', compact('booking'));
        } else {
            return redirect('/check-in');
        }
    }

    public function visitor_return()
    {
        return view('check-in.return');
    }

    public function find_visitor(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:visitors,email',
        ]);

        $return_visitor = $this->checkInManager->getByEmail($request->get('email'));

        if(!empty($return_visitor)) {
            $current_visitor = [
                "name"                          => $return_visitor->name,
                "email"                         => $return_visitor->email,
                "phone"                         => $return_visitor->phone,
                "company_name"                  => $return_visitor->company_name,
                "company_employee_id"           => $return_visitor->company_name,
                "national_identification_no"    => $return_visitor->national_identification_no,
                "address"                       => $return_visitor->address,
            ];
            $visitor = $this->checkInManager->setVisitor($current_visitor);
            $request->session()->put('visitor', $visitor);
            $request->session()->put('is_returned', true);
            $request->session()->put('visitor_id', $return_visitor->id);
            return redirect()->route('check-in.step-one');
        }
        return redirect()->route('check-in.return')->with('errors', "Visitor not found!");
    }

    public function pre_registered()
    {
        return view('check-in.pre_registered');
    }

    public function find_pre_visitor(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:visitors,email',
        ]);

        $return_visitor = $this->checkInManager->getByEmail($request->get('email'));
        $invitation = Invitation::where('email',$request->get('email'))->first();

        if(!empty($return_visitor)) {
            $current_visitor = [
                "name"                          => $return_visitor->name,
                "email"                         => $return_visitor->email,
                "phone"                         => $return_visitor->phone,
                "company_name"                  => $return_visitor->company_name,
                "company_employee_id"           => $return_visitor->company_name,
                "national_identification_no"    => $return_visitor->national_identification_no,
                "address"                       => $return_visitor->address,
            ];
            $visitor = $this->checkInManager->setVisitor($current_visitor);

            $request->session()->put('visitor', $visitor);
            $request->session()->put('employee', $invitation->booking->host);
            $request->session()->put('is_pre_registered', true);
            $request->session()->put('visitor_id', $return_visitor->id);

            return redirect()->route('check-in.step-two');
        }

        return redirect()->route('check-in.pre_registered')->with('errors', "Visitor not found!");
    }

    public function getEmployee(Request $request)
    {
        $employees = Employee::where('department_id', $request["department"])->get();
        if(count($employees)){
            $employee = Employee::where('department_id', $request["department"])->latest('id')->first();
            return response()->json([
                'employee' => view('admin.booking.partials.employeeList', compact('employees'))->render(),
                'employeeID' => $employee->id
            ]);
        }else{
            return response()->json([
                'employee' => view('admin.booking.partials.employeeList', compact('employees'))->render(),
            ]);
        }

    }
    public function getEmployeeProfile(Request $request)
    {
        $employee = Employee::find($request['employee']);
        return response()->json([
            'profile' => view('admin.booking.partials.employeeProfile', compact('employee'))->render()
        ]);
    }
}
