<?php

namespace App\Console\Commands;

use App\Jobs\SendSmsJop;
use App\Models\reminder;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ToDaySendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todayreminder:send';

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
        $today = Carbon::today('Asia/Riyadh');

        $reminders = reminder::whereDate('timezoneoffset', $today)->where('is_sent', false)->get();

        foreach ($reminders as $reminder) {

            SendSmsJop::dispatch($reminder);
        }
       // \Artisan::call('queue:work');

       //exec('php artisan queue:stop');

      // exec('php artisan queue:work');

    }
}
