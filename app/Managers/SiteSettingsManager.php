<?php

namespace App\Managers;

use App\Setting;
use Illuminate\Http\Request;

class SiteSettingsManager
{
    /**
     * Set the .env and .env.example paths.
     */
    public function __construct()
    {

    }

    /**
     * Save the form content to the .env file.
     *
     * @param Request $request
     * @return string
     */
    public function saveSiteSettings($request)
    {
        foreach ($request as $key => $value) {
            $array['key']   = $key;
            $array['value'] = $value;
            Setting::create($array);
        }
        return $request;
    }

    public function updateSettings(Request $request)
    {
        if ($request->has('site_logo')) {
            /* Image Upload */
            $imageName = time() . '.' . request()->site_logo->getClientOriginalExtension();
            request()->site_logo->move(public_path('images'), $imageName);
            /* end image upload */
            $requestData              = $request->except(['site_logo', '_token']);
            $requestData['site_logo'] = $imageName;
        } else {
            $requestData              = $request->except('_token');
        }

        if ($request->has('id_card_logo')) {
            /* Image Upload */
            $id_card_logo_name = time() . '.' . request()->id_card_logo->getClientOriginalExtension();
            request()->id_card_logo->move(public_path('images'), $id_card_logo_name);
            /* end image upload */
            $requestData['id_card_logo'] = $id_card_logo_name;
        }
        foreach ($requestData as $key => $value) {
            if (!empty($value) || $value == 0) {
                $setting = Setting::where('key', $key)->first();
                if (empty($setting)) {
                    setting()->set($key, $value);
                } else {
                    $setting->key   = $key;
                    $setting->value = $value;
                    $setting->save();
                }
            }
        }
        return $request;
    }
}
