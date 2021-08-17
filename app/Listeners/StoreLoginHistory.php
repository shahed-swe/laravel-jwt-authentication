<?php

namespace App\Listeners;

use App\Models\LoginHistory;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Jenssegers\Agent\Agent;

class StoreLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;
        $agent = new Agent();
        
        // For testing purpose as postman sends its own useragent
        // $agent->setUserAgent('Mozilla/5.0 (Linux; U; Android 7.1.2; ru-ru; Redmi 4X Build/N2G47H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/71.0.3578.141 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.2.6-g');
        
        $device = $agent->device();

        
        // $client_ip = get_client_ip();
        $client_ip = "103.153.28.26";  // for testing purpose
        $json     = file_get_contents("http://ipinfo.io/$client_ip/geo");
        $json     = json_decode($json, true);
        // $region   = $json['region'];
        $city     = $json['city'];
        $country  = $json['country'];

        // exploding latitude and longitude
        $coordinates = explode(",", $json['loc']);


        $user->loginhistory()->save(new LoginHistory([
            'user_uid' => $user->uid,
            'device_name' => $device,
            'location' => $city.", ".$country,
            'date_time' => Carbon::now(),
            'latitude' => $coordinates[0],
            'longitude' => $coordinates[1],
            'created_by' => $user->uid
        ]));

    }
}
