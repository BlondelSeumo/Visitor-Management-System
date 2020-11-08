<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Services\Booking\BookingService;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $bookings = $this->bookingService->all($request);
        $allCounts =[];
        if (auth()->user()->hasRole('employee')) {
            $allCounts['0'] = Booking::where('user_id', auth()->id())->latest()->count();
            $allCounts['1'] = Booking::where('is_pre_register', 0)->where('user_id', auth()->id())->latest()->count();
            $allCounts['2'] = Booking::where('is_pre_register', 1)->where('user_id', auth()->id())->latest()->count();
        }else{
            $allCounts['0'] = DB::table('employees')->count();
            $allCounts['1'] = DB::table('bookings')->count();
            $allCounts['2'] = Booking::where('is_pre_register', 0)->latest()->count();
            $allCounts['3'] = Booking::where('is_pre_register', 1)->latest()->count();
        }

        return view('admin.dashboard', compact('allCounts','bookings'));
    }

}
