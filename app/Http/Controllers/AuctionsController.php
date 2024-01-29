<?php

namespace App\Http\Controllers;

use App\Models\Auctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AuctionsController extends Controller
{
    public function index()
    {
        $auction = Auctions::all();
        return view('dashboard.auction.index',compact('auction'));
    }

    public function create()
    {
        return view('dashboard.auction.create');
    }

    public function store(Request $request)
    {
            $auction = new Auctions();
		 $request->validate([
                'Title' => 'required|string|unique:auctions',
			     //'dateOfStarting' => 'required|string|unique:auctions',
			      //'dateOfEnding' => 'required|string|unique:auctions',
            ]);
            $auction->Region = $request->Region;
            $auction->Title = $request->Title;
            $auction->type = $request->type;
            $auction->link = $request->link;
            $auction->onsiteLink = $request->onsiteLink;
			$auction->onsiteLinkoo = $request->onsiteLinkoo;
            $auction->ShowInfath = $request->ShowInfath;
            $auction->PlatformName = $request->PlatformName;
            $auction-> description = $request->description;
            $auction-> dateOfStarting = $request->dateOfStarting;
            $auction-> timeOfStarting = $request->timeOfStarting;
           // $auction-> timeOfEnding = $request->timeOfEnding;
            $auction-> dateOfEnding = $request->dateOfEnding;
            $auction-> nowdate = Carbon::now()->toDateTimeString();;
            $auction-> slug = Str::slug($request->Title);
            $auction->image =  $request->image;
            if($request->hasfile('image'))
            {
                $destination = 'uploads/auction/'.$auction->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time(). '.'.$extention;
                $file->move('uploads/auction/', $filename);
                $auction->image = $filename;
            }

            $auction->PlatformImage =  $request->PlatformImage;
            if($request->hasfile('PlatformImage'))
            {
                $destination = 'uploads/auction/'.$auction->PlatformImage;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('PlatformImage');
                $extention = $file->getClientOriginalExtension();
                $filename = time(). '.'.$extention;
                $file->move('uploads/auction/', $filename);
                $auction->PlatformImage = $filename;
            }

            $auction->save();
        return redirect()->route('auctionitem', $auction)->with('status','تمت إضافة المزاد بنجاح');

            // return redirect()->back()->with('status','تمت إضافة المزاد بنجاح');
    }

    public function edit($id)
    {
        $auction = Auctions::find($id);
        return view('dashboard.auction.edit', compact('auction'));
    }

    public function update(Request $request, $id)
    {
        $auction = Auctions::find($id);
		/* $request->validate([
                'Title' => 'required|string|unique:auctions',
            ]);*/
            $auction->Region = $request->Region;
            $auction->Title = $request->Title;
            $auction-> description = $request->description;
            $auction->ShowInfath = $request->ShowInfath;
            $auction->PlatformName = $request->PlatformName;
            $auction-> description = $request->description;
            $auction-> dateOfStarting = $request->dateOfStarting;
            $auction-> timeOfStarting = $request->timeOfStarting;
            $auction->type = $request->type;
            $auction->link = $request->link;
            $auction->onsiteLink = $request->onsiteLink;
		$auction->onsiteLinkoo = $request->onsiteLinkoo;


           // $auction-> timeOfEnding = $request->timeOfEnding;
            $auction-> dateOfEnding = $request->dateOfEnding;
            $auction-> nowdate = Carbon::now();

            $auction-> slug = Str::slug($request->Title);
            /* if($request->hasfile('image'))
            {
                $destination = 'uploads/auction/'.$auction->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time(). '.'.$extention;
                $file->move('uploads/auction/', $filename);
                $auction->image = $filename;
            }
 */
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extention = $file->getClientOriginalName();
                $filename = $auction->id . '.'.$extention;
                $file->move('uploads/auction/', $filename);
                $auction->image = $filename;
                
            }
            if($request->hasfile('PlatformImage'))
            {
                $file = $request->file('PlatformImage');
                $extention = $file->getClientOriginalName();
                $filename = $auction->id . '.'.$extention;
                $file->move('uploads/auction/', $filename);
                $auction->PlatformImage = $filename;
                
            }



        $auction->update();

        return redirect()->back()->with('status',' تم تحديث المزاد بنجاح');


}
public function destroy($id)
    {
        
        $auction = Auctions::find($id);
        $destination = 'uploads/auction/'.$auction->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $auction->delete();
        return redirect()->back()->with('status','تم حذف المزاد بنجاح ');
    }
}
