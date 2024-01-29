<?php

namespace App\Console;

use App\Jobs\SendSmsJop;
use App\Models\reminder;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       
        $schedule-> call(function () {
            $today = Carbon::today('Asia/Riyadh')->addDay()->toDateString();
            $reminders = reminder::whereDate('timezoneoffset',$today)->where('is_sent', false)->get();
    
            foreach ($reminders as $reminder) {
    
                SendSmsJop::dispatch($reminder);
            }
        })->everyMinute();
        $schedule->command('queue:restart')->everyMinute();
        $schedule->command('queue:work --stop-when-empty')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
