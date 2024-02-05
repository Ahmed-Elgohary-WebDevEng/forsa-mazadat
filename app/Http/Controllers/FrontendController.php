<?php

namespace App\Http\Controllers;

use App\Models\agents;
use App\Models\Auctions;
use App\Models\reminder;
use App\Models\stakeholder;
use App\Models\userLog;
use App\Models\WebsiteUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;


class FrontendController extends Controller
{
    public function homePage()
    {
        $stakeholder = stakeholder::get();
        $paginate = true;

        $auctions = Auctions::filter(request(['region', 'type', 'date']))
            ->orderBy('dateOfStarting', 'desc')
            ->paginate(6)
            ->withQueryString();

        return view('index', compact('auctions', 'stakeholder', 'paginate'));
    }

    public function showAuctionDetails($slug)
    {
        $auction = Auctions::where('slug', $slug)->first();

        return view('auction-details', compact('auction'));
    }


    // Old functions
    public function index()
    {
        $auctions = Auctions::get();

        $stakeholder = stakeholder::get();

        $agent = agents::get();

        return view('website.index', compact('auctions', 'stakeholder', 'agent'));
    }

    public function auction()
    {
        $auctions = Auctions::get();


        return view('website.allRegion', compact('auctions'));
    }

    public function auctionContent($Auctions_slug)
    {
        $auction = Auctions::where('slug', $Auctions_slug)->first();
        $auctions = Auctions::where('slug', $Auctions_slug)->first();

        return view('website.Actiondetailes', compact('auction', 'auctions'));
    }

    public function userLog($id)
    {

        $Auction = Auctions::findOrFail($id);
        $auctions = Auctions::findOrFail($id);
        return view('website.UserLog', compact('Auction', 'auctions'));


    }

    public function Userlogstore(Request $request, $id)
    {

        $Auction = Auctions::findOrFail($id);
        $auctions = Auctions::findOrFail($id);
        $users = WebsiteUsers::all();

        $userlog = new userLog;

        $userlog->Firstname = $request->Firstname;
        $userlog->lastname = $request->lastname;
        $userlog->identity = $request->identity;
        $userlog->phone = $request->phone;
        $userlog->slug = Str::slug($request->identity);


        // user found
        $Auction->AuctionUserLogs()->save($userlog);
        return view('website.link', compact('Auction', 'userlog', 'auctions'))->with('status',
            'تمت التسيجل بالمزاد بنجاح');


    }

    public function create($id)
    {
        $Auction = Auctions::findOrFail($id);
        $auctions = Auctions::findOrFail($id);
        return view('website.Reminder', compact('Auction', 'auctions'));


    }

    public function reminderstore(Request $request, $id)
    {
        $basic = new Basic("3732c5d6", "QhpmbT4bC1oQeLBm");
        $client = new Client($basic);
        $Auction = Auctions::findOrFail($id);
        $auctions = Auctions::findOrFail($id);

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
            new SMS("966537640392", "966537640392", 'A text message sent using the Nexmo SMS API')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: ".$message->getStatus()."\n";
        }
        $Auction->reminders()->save($reminder);


        return redirect()->back()->with('status', 'تم التسجيل بالتذكير بالمزاد ');


    }

    public function region()
    {

        $auction = Auctions::all();
        $auctions = Auctions::all();

        return view('website.region', compact('auction', 'auctions'));


    }

    public function regionfornve()
    {

        $auctions = Auctions::all();

        return view('website.layouts.layout', compact('auctions'));


    }

    public function qassim_region_content($Region)
    {

        $auction = Auctions::where('Region', $Region)->get();
        $auctions = Auctions::where('Region', $Region)->get();
        $stakeholder = stakeholder::get();

        $agent = agents::get();
        return view('website.regionConatent', compact('auction', 'auctions', 'stakeholder', 'agent'));


    }

    public function Type()
    {

        $auction = Auctions::all();
        $auctions = Auctions::all();

        return view('website.Type', compact('auction', 'auctions'));


    }

    public function TypeContent($Type)
    {

        $auction = Auctions::where('type', $Type)->get();
        $auctions = Auctions::where('type', $Type)->get();
        $stakeholder = stakeholder::get();

        $agent = agents::get();
        return view('website.TypeContent', compact('auction', 'auctions', 'stakeholder', 'agent'));


    }

}
