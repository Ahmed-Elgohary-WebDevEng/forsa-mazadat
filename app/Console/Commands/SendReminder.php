<?php

namespace App\Console\Commands;

use App\Models\reminder;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Twilio\Rest\Client;

class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends out reminders';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        print_r("Reminder Daemon Started \n");
        while (true) {
            $account_sid = env('TWILIO_SID');
            $account_token = env("TWILIO_TOKEN");
            $sending_number = env("TWILIO_NUMBER");
            $twilio_client = new Client($account_sid, $account_token);
            $now = Carbon::now('Asia/Riyadh')->toDateTimeString();
            $reminders = Reminder::where(['timezoneoffset', '=', $now]);
            foreach ($reminders as $reminder) {
                $twilio_client->messages->create($reminder->mobile_no,
                    array("from" => $sending_number, "body" => "Reminder for: $reminder->message"));
                $reminder->status = 'sent';
                $reminder->save();
            }
            \sleep(1);
    }
}
}
