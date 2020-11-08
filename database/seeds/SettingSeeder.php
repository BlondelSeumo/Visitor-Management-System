<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Setting::truncate();
        $settings['site_name']                  = 'QuickPass';
        $settings['site_email']                 = 'info@quickpass.xyz';
        $settings['site_phone']                 = '91226464545';
        $settings['site_description']           = 'Visitor pass management system';
        $settings['site_address']               = 'Dhaka, Bangladesh.';
        $settings['id_card_template']           = 1;
        $settings['notify_templates']           = '<p>Hello Employee Someone wants meet you, his/her name is</p>';
        $settings['notifications_email']        = 1;
        $settings['invite_templates']           = 'Hello';
        $settings['notifications_sms']          = 1;
        $settings['sms_gateway']                = 1;
        $settings['visitor_img_capture']        = 0;
        $settings['employ_img_capture']         = 0;
        $settings['twilio_token']               = '';
        $settings['twilio_from']                = '';
        $settings['twilio_sid']                 = '';
        $settings['apikey']                     = '';
        $settings['authkey']                    = '';
        $settings['front_end_enable_disable']   = 1;
        $settings['terms_condition']            = 'Terms condition';
        $settings['welcome_screen']             = '<p>Welcome,please tap on button to check-in</p>';
        $settings['mail_host']                   = '';
        $settings['mail_port']                   = '';
        $settings['mail_username']               = '';
        $settings['mail_password']               = '';
        $settings['mail_from_name']              = '';
        $settings['mail_from_address']           = '';
        $settings['mail_disabled']               = 1;


        if (count($settings)) {
            foreach ($settings as $settingKey => $setting) {
                Setting::create(['key' => $settingKey, 'value' => $setting]);
            }
        }
    }
}
