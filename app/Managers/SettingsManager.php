<?php

namespace App\Managers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsManager
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

        $requestData = $request->all();
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
