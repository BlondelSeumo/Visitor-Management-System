<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param null $type
     * @return \Illuminate\View\View
     */
    public function index($type = null)
    {
        return view('admin.settings.index', compact('type'));
    }

    public function store($type = null, Request $request)
    {
        $ValidateArray    = [];
        $settingArray    = [];
        if($type == 'general'){
            $settingArray = $this->validate($request, $this->generalValidateArray(), [], $ValidateArray);
            if ($request->hasFile('site_logo')) {
                $site_logo                 = request('site_logo');
                $settingArray['site_logo'] = $site_logo->getClientOriginalName();
                request()->site_logo->move(public_path('images'), $settingArray['site_logo']);
            } else {
                unset($settingArray['site_logo']);
            }
        }elseif ($type == 'notifications'){
            $settingArray = $this->validate($request, $this->notificationsValidateArray(), [], $ValidateArray);

        }elseif ($type == 'template'){
            $settingArray = $this->validate($request, $this->templateValidateArray(), [], $ValidateArray);

        }elseif ($type == 'front-end'){
            $settingArray = $this->validate($request, $this->frontendValidateArray(), [], $ValidateArray);

        }elseif ($type == 'email'){
            $settingArray = $this->validate($request, $this->EmailValidateArray(), [], $ValidateArray);

        }elseif ($type == 'photo_id_card'){
            $settingArray = $this->validate($request, $this->photoidCardValidateArray(), [], $ValidateArray);
            if ($request->hasFile('id_card_logo')) {
                $id_card_logo                 = request('id_card_logo');
                $settingArray['id_card_logo'] = $id_card_logo->getClientOriginalName();
                request()->id_card_logo->move(public_path('images'), $settingArray['id_card_logo']);
            } else {
                unset($settingArray['id_card_logo']);
            }
        }

        Setting::set($settingArray);
        Setting::save();

        return redirect("settings/$type")->with('success','Settings updated successfully');
    }

    private function generalValidateArray()
    {
        return [
            'site_name'                    => 'required|string|max:100',
            'site_logo'                    => 'nullable|mimes:jpeg,jpg,png,gif|max:3096',
            'site_phone'                   => 'required|string|max:20',
            'site_description'             => 'nullable|string|max:190',
            'site_email'                   => 'required|string|max:100',
            'site_address'                 => 'nullable|string',
        ];
    }

    private function notificationsValidateArray()
    {
        return [
            'twilio_sid'                        => 'nullable|string',
            'twilio_token'                      => 'nullable|string',
            'twilio_from'                       => 'nullable|string',
            'authkey'                           => 'nullable|string',
            'notifications_email'               => 'nullable',
            'notifications_sms'                 => 'nullable',
            'sms_gateway'                       => 'nullable',
        ];
    }
    private function templateValidateArray()
    {
        return [
            'notify_templates'                  => 'nullable|string',
            'invite_templates'                  => 'nullable|string',
        ];
    }

    private function EmailValidateArray()
    {
        return [
            'mail_host'         => 'required|string|max:100',
            'mail_port'         => 'required|string|max:100',
            'mail_username'     => 'required|string|max:100',
            'mail_password'     => 'required|string|max:100',
            'mail_from_name'    => 'required|string|max:100',
            'mail_from_address' => 'required|string|max:200',
            'mail_disabled'     => 'numeric',
        ];
    }
    private function frontendValidateArray()
    {
        return [
            'welcome_screen'                    => 'nullable|string',
            'terms_condition'                    => 'nullable|string',
            'visitor_agreement'                 => 'nullable',
            'front_end_enable_disable'          => 'nullable',
        ];
    }
    private function photoidCardValidateArray()
    {
        return [
            'employ_img_capture'                => 'nullable',
            'id_card_logo'                      => 'nullable|mimes:jpeg,jpg,png,gif|max:3096',
            'visitor_img_capture'               => 'nullable',
        ];
    }

}
