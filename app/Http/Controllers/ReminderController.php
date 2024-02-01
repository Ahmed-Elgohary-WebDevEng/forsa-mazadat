<?php

namespace App\Http\Controllers;

use Alkoumi\Laravel4jawalySms\Facades\Sms;
use App\Models\Auctions;
use App\Models\reminder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;


class ReminderController extends Controller
{

    public function create($id)
    {
        $Auction = Auctions::findOrFail($id);

        return view('dashboard.Reminder.create', compact('Auction'));
    }

    public function index($id)
    {
        $reminder = reminder::all();
        $Auction = Auctions::findOrFail($id);

        $counters = $Auction->reminders()->count();

        return view('dashboard.Reminder.index', compact('Auction', 'reminder', 'counters'));
    }

    public function runCommand()
    {
        // Call the Artisan command
        Artisan::call('schedule:run');

        // Optionally, you can retrieve the output of the command
        $output = Artisan::output();
        Artisan::call('queue:restart');
        Artisan::call('queue:work --stop-when-empty');

        return response()->json(['output' => $output]);
    }


    public function indexall()
    {
        $reminder = reminder::all();
        $Auction = Auctions::all();


        return view('dashboard.Reminder.indexall', compact('reminder', 'Auction'));


    }


    public function store(Request $request, $id)
    {

        $basic = new Basic("3732c5d6", "QhpmbT4bC1oQeLBm");
        $client = new Client($basic);
        $Auction = Auctions::findOrFail($id);

        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
        ]);
        $reminder = new reminder();
        $reminder->Fullname = $request->Fullname;

        $reminder->mobile_no = $request->mobile_no;

        $reminder->timezoneoffset = Carbon::parse("{$validatedData['date']} {$validatedData['time']}");
        $reminder->message = "يبدا المزاد فس الساعة $Auction->timeOfStarting $Auction->dateOfStarting سيقام بتاريخ  $Auction->Title عزيزي المشترك هذا تذكير بالمزاد ";
        $reminder->slug = Str::slug($request->Fullname);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("966537640392", "966537640392", 'A text message sent using the Nexmo SMS API')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: ".$message->getStatus()."\n";
        }
        $Auction->reminders()->save($reminder);
        return redirect()->route('reminder', $Auction);


        /* $account_sid = getenv('TWILIO_SID');
        $auth_token = getenv('TWILIO_TOKEN');
        $sendernumber = getenv('TWILIO_PHONE');



        $client = new Client($account_sid, $auth_token);
        $client->messages->create($reminder->mobile_no,
            // Where to send a text message (your cell phone?)
            //'+966 53 764 0392',
            array(
                'from' => $sendernumber,
                'body' => $reminder->message
            )
        );
        dd('SMS Sent Successfully.'); */

        /*  $validatedData = $request->validate([
             'mobile_no' => 'required',
             'date' => 'required|date',
             'time' => 'required',
             'message' => 'required',
         ]);

         $reminder = new reminder();
         $reminder->Fullname = $request->Fullname;

         $reminder->mobile_no = $validatedData['mobile_no'];
         $reminder->timezoneoffset = Carbon::parse("{$validatedData['date']} {$validatedData['time']}");
         $reminder->message = $validatedData['message'];
         $reminder->slug = Str::slug($request->message);

         $Auction->reminders()->save($reminder);
         try {

             $account_sid = getenv("TWILIO_SID");
             $auth_token = getenv("TWILIO_TOKEN");
             $twilio_number = getenv("TWILIO_NUMBER");

             $client = new Client($account_sid, $auth_token);
             $client->messages->create($reminder->mobile_no, [
                 'from' => $twilio_number,
                 'body' =>  $reminder->message]);

             dd('SMS Sent Successfully.');
             dd($reminder->timezoneoffset);

         } catch (Exception $e) {
             dd("Error: ". $e->getMessage());
         }
         return redirect()->back()->with( ['success' => "Event reminder for {$reminder->timezoneoffset} set"]);

  */


    }
}
