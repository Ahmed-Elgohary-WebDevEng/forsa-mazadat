<?php

namespace App\Http\Controllers;

use App\Models\Auctions;
use App\Models\userLog;
use App\Models\WebsiteUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserLogController extends Controller
{
    public function index($id)
    {
        $userlog= userLog::all();
        $Auction = Auctions::findOrFail($id);
        

		    $counters = $Auction->AuctionUserLogs()->count();

        return view('dashboard.userlog.index', compact('userlog', 'Auction','counters'));
    }
    public function indexall()
    {
        $userlog= userLog::all();
        $Auction = Auctions::all();
        

        return view('dashboard.userlog.indexall', compact('userlog', 'Auction'));
    }

    public function create($id)
    {
        $Auction = Auctions::findOrFail($id);

        return view('website.UserLogtoAuctions',compact('Auction'));
    }

    public function store(Request $request, $id)
    {
        
        $Auction = Auctions::findOrFail($id);
        $users = WebsiteUsers::all();

        $userlog = new userLog;
       
        $userlog->Firstname = $request->Firstname;
        $userlog->lastname = $request->lastname;
        $userlog->identity = $request->identity;
        $userlog->phone = $request->phone;
        $userlog->slug = Str::slug($request->identity);

       
            // user found 
            $Auction->AuctionUserLogs()->save($userlog);

        return view('website.Actiondetailes',compact('Auction'))->with('status','تمت التسيجل بالمزاد بنجاح');
        
        
    } 

    public function edit($id, $auctionId)
    {
        $Auction = Auctions::findOrFail($auctionId);
        $Auctions = Auctions::all();
        $userlog = userLog::findOrFail($id);
        return view('dashboard.userlog.edit', compact('userlog','Auction','Auctions'));
    }

    public function update(Request $request, $userlog_id,$auctionId)
    {
        $Auction = Auctions::findOrFail($auctionId);

        $userlog = $Auction->AuctionUserLogs()->where('id',$userlog_id)->first();
        $userlog->Firstname = $request->Firstname;
        $userlog->lastname = $request->lastname;
        $userlog->identity = $request->identity;
        $userlog->phone = $request->phone;
        $userlog->slug = Str::slug($request->identity);

        //$Auction->acution_item()->update($Actionitems);
        $userlog->update();
        return redirect()->back()->with('status',' Updated Successfully');


}
public function destroy($id)
    {
        
        $Actionitems = userLog::find($id);
        $Actionitems->delete();
        return redirect()->back()->with('status','kid Deleted Successfully');
    }
}
