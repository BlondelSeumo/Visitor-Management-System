<?php

namespace App\Managers;

use App\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;

class CheckInManager
{

    public function setVisitor($request)
    {
        $visitor = new visitor();
        $visitor->fill($request);

        return $visitor;
    }

    public function store(Request $request)
    {
        $visitor =  DB::table('visitors')->orderBy('visitorID', 'desc')->first();

        $date   =   date('y-m-d');
        $data  =    substr($date,0,2);
        $data1  =   substr($date,3,2);
        $data2  =   substr($date,6,8);

        if($visitor){
            $value = substr($visitor->visitorID, -2);
            if($value <100){
                $visitorID =$data.$data1.$data2.$value+1;
            }else{
                $visitorID = $data.$data1.$data2.'00';
            }
        }else{
            $visitorID = $data.$data1.$data2.'00';
        }

        $visitor = $request->session()->get('visitor');
        $id = $visitor->host_id;
        $host = User::find($id);

        $visitor->date                     = date('d-m-Y');
        $visitor->host_name                = $host->name;
        $visitor->checkin                  = date('h:i A');
        $visitor->host_id                  = $host->id;
        $visitor->visitorID                = $visitorID;
        $visitor->status                   = 1;
        $visitor->save();

        if(setting('notifications_email') == 1){
            $email = $host->email;
            $data = array(
                'name' => $host->name,
                'email' => $visitor->email,
                'company_name' => $visitor->company_name,
                'phone'         => $visitor->phone,
                'visitor_name' => $visitor->first_name.' '.$visitor->last_name,
                'visitorID' => $visitor->visitorID,
                'template' => setting('notify_templates'),
                'date' => $visitor->date,
            );

            Mail::send('check-in.hostemail', $data, function ($message) use ($email) {
                $message->to($email, 'New Visitor')->subject('Visitors');
                $message->from(setting('site_email'),setting('site_name'));
            });
        }

        return $visitor;
    }

    public function getById($id)
    {
        $visitor = Visitor::findOrFail($id);
        return $visitor;
    }

    public function getByEmail($email)
    {
        return Visitor::where('email',$email)->first();
    }

}
