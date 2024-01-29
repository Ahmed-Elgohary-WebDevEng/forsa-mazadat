<?php

namespace App\Jobs;

use App\Models\reminder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSmsJop implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $retryAfter = 360; // retry in 1 
    private $reminder;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $client = new \GuzzleHttp\Client();
        $url = 'http://REST.GATEWAY.SA/api/SendSMS?';

        $params = [
            'api_id' => env("sms_api_id"),
            'api_password' =>  env('sms_api_password'),
            'templateid' => '2251',
            'sms_type' => 'T',
            'encoding' => 'T',
            'sender_id' => 'Foras-Estat',
            'phonenumber' =>  $this->reminder->mobile_no,
            'V1' =>  $this->reminder->Fullname,
        ];

        $url .= http_build_query($params);

        $response = $client->request('get', $url);
        $responseBody = $response->getBody()->getContents();

        $responseData = json_decode($responseBody, true);
        if ($response->getStatusCode() == 200) {
          //  $this->reminder->update(['is_sent' => true,'message' => $responseData['remarks']]);
            $this->reminder->update(['is_sent' => true]);
        } else {
            $this->reminder->update(['is_sent' => false,'message' => $responseData['remarks']]);
        }
    }
}
