<?php

namespace App\Http\Controllers;

use App\Models\Auctions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AuctionsController extends Controller
{
    public function index()
    {
//        $auction = Auctions::all();

        $auction = Auctions::filter(request(['region', 'type', 'date']))
            ->orderBy('dateOfStarting', 'desc')
            ->get();

        return view('dashboard.auction.index', compact('auction'));
    }

    public function store(Request $request)
    {
//        $auction = new Auctions();
        $request->validate([
            'Title' => 'required|string|unique:auctions',
            'Region' => 'required',
            'type' => 'required',
            'link' => 'required',
//            'onsiteLink' => 'required',
//            'onsiteLinkoo' => 'required',
            'ShowInfath' => 'required',
            'PlatformName' => 'required',
            'description' => 'required',
            'dateOfStarting' => 'required',
            'timeOfStarting' => 'required',
            'dateOfEnding' => 'required',
            'image' => 'required',
        ]);

        $filenameImg = '';
        if ($request->hasfile('image')) {
            $destination = 'uploads/auction/'.$request->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filenameImg = time().'.'.$extention;
            $file->move('uploads/auction/', $filenameImg);
        }

//        $auction->PlatformImage = $request->PlatformImage;

        $platformImg = '';
        if ($request->hasfile('PlatformImage')) {
            $destination = 'uploads/auction/'.$request->PlatformImage;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('PlatformImage');
            $extention = $file->getClientOriginalExtension();
            $platformImg = time().'.'.$extention;
            $file->move('uploads/auction/', $platformImg);
        }

        DB::transaction(function () use ($request, $filenameImg, $platformImg) {
            // 1- create auction data
            $createdAuction = Auctions::create([
                'Region' => $request->Region,
                'Title' => $request->Title,
                'type' => $request->type,
                'link' => $request->link,
                'onsiteLink' => $request->onsiteLink,
                'onsiteLinkoo' => $request->onsiteLinkoo,
                'ShowInfath' => $request->ShowInfath,
                'PlatformName' => $request->PlatformName,
                'description' => $request->description,
                'dateOfStarting' => $request->dateOfStarting,
                'timeOfStarting' => $request->timeOfStarting,
                'dateOfEnding' => $request->dateOfEnding,
                'nowdate' => Carbon::now()->toDateTimeString(),
                'slug' => Str::slug($request->Title),
                'image' => $filenameImg,
                'PlatformImage' => $platformImg,
            ]);

//        dd($updatedAuction);

            // 2- create auction item using auction data

            $createdAuction->acution_item()->create([
                'name' => $request->auctionItemName,
                'space' => $request->auctionItemSpace,
                'slug' => Str::slug($createdAuction->Title)
            ]);
        });

        return redirect()->to('auction')->with('status', 'تمت إضافة المزاد بنجاح');

        // return redirect()->back()->with('status','تمت إضافة المزاد بنجاح');
    }

    public function create()
    {
        return view('dashboard.auction.create');
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
        $auction->description = $request->description;
        $auction->ShowInfath = $request->ShowInfath;
        $auction->PlatformName = $request->PlatformName;
        $auction->description = $request->description;
        $auction->dateOfStarting = $request->dateOfStarting;
        $auction->timeOfStarting = $request->timeOfStarting;
        $auction->type = $request->type;
        $auction->link = $request->link;
        $auction->onsiteLink = $request->onsiteLink;
        $auction->onsiteLinkoo = $request->onsiteLinkoo;


        // $auction-> timeOfEnding = $request->timeOfEnding;
        $auction->dateOfEnding = $request->dateOfEnding;
        $auction->nowdate = Carbon::now();

        $auction->slug = Str::slug($request->Title);
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
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalName();
            $filename = $auction->id.'.'.$extention;
            $file->move('uploads/auction/', $filename);
            $auction->image = $filename;

        }
        if ($request->hasfile('PlatformImage')) {
            $file = $request->file('PlatformImage');
            $extention = $file->getClientOriginalName();
            $filename = $auction->id.'.'.$extention;
            $file->move('uploads/auction/', $filename);
            $auction->PlatformImage = $filename;

        }


        $auction->update();

        return redirect()->back()->with('status', ' تم تحديث المزاد بنجاح');


    }

    public function destroy($id)
    {

        $auction = Auctions::find($id);
        $destination = 'uploads/auction/'.$auction->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $auction->delete();
        return redirect()->back()->with('status', 'تم حذف المزاد بنجاح ');
    }
}
