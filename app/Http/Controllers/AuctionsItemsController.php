<?php

namespace App\Http\Controllers;

use App\Models\AcutionItems;
use App\Models\Auctions;
use \Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuctionsItemsController extends Controller
{
    public function index($id)
    {
        $Actionitems = AcutionItems::all();
        $Auction = Auctions::findOrFail($id);
        

        return view('dashboard.auctionItem.index', compact('Actionitems', 'Auction'));
    }

    public function create($id)
    {
        $Auction = Auctions::findOrFail($id);

        return view('dashboard.auctionItem.create',compact('Auction'));
    }

    public function store(Request $request, $id)
    {
        
        $Auction = Auctions::findOrFail($id);

        $Actionitem = new AcutionItems;
       
        $Actionitem->name = $request->name;
        $Actionitem->location = $request->location;
        $Actionitem->descripton = $request->descripton;
        $Actionitem->space = $request->space;
        $Actionitem->maxPrice = $request->maxPrice;
        $Actionitem->lowPrice = $request->lowPrice;
        $Actionitem->width = $request->width;
        $Actionitem->length = $request->length;
        $Actionitem->slug = Str::slug($request->slug);


        $Auction->acution_item()->save($Actionitem);
        return redirect()->route('auctionitem', $Auction);


       // return view('dashboard.auctionItem.create',compact('Auction'))->with('status','تمت إضافة المزاد بنجاح');
    }

    public function edit($id, $auctionId)
    {
        $Auction = Auctions::findOrFail($auctionId);
        $Auctions = Auctions::all();
        $Actionitems = AcutionItems::findOrFail($id);
        return view('dashboard.auctionItem.edit', compact('Actionitems','Auction','Auctions'));
    }

    public function update(Request $request, $Acutionitem_id,$auctionId)
    {
        $Auction = Auctions::findOrFail($auctionId);

        $Actionitems = $Auction->acution_item()->where('id',$Acutionitem_id)->first();

        $Actionitems->name = $request->name;
        $Actionitems->location = $request->location;
        $Actionitems->descripton = $request->descripton;
        $Actionitems->space = $request->space;
        $Actionitems->maxPrice = $request->maxPrice;
        $Actionitems->lowPrice = $request->lowPrice;
        $Actionitems->width = $request->width;
        $Actionitems->length = $request->length;
        $Actionitems->slug = Str::slug($request->slug);

        //$Auction->acution_item()->update($Actionitems);
        $Actionitems->update();
        return redirect()->route('auctionitem', $Auction);

       // return redirect()->back()->with('status',' Updated Successfully');
       //return back();


}
public function destroy($id)
    {
        
        $Actionitems = AcutionItems::find($id);
        $Actionitems->delete();
        return redirect()->back()->with('status','kid Deleted Successfully');
    }

}
