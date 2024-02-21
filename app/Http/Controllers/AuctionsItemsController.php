<?php

namespace App\Http\Controllers;

use App\Models\AcutionItems;
use App\Models\Auctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AuctionsItemsController extends Controller
{
    public function index($id)
    {
        $auction = Auctions::findOrFail($id);

        $auction_items_details = $auction->acutionItems()->get();

        return view('dashboard.auctionItem.index', compact('auction_items_details', 'auction'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'space' => 'required',
            'image' => 'required|image'
        ]);

        $auction = Auctions::findOrFail($id);

        $auction_item_img = '';
        if ($request->hasfile('image')) {
            $destination = 'uploads/auction-items/'.$request->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $auction_item_img = time().'.'.$extention;
            $file->move('uploads/auction-items/', $auction_item_img);
        }

        $auction->acutionItems()->create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'space' => $request->input('space'),
            'item_image' => $auction_item_img
        ]);


        return redirect()->route('auctions-items.index', $auction->id)->with('status', 'تم اضافة تفاصيل المزاد بنجاح');
    }

    public function create($id)
    {
        $auction = Auctions::findOrFail($id);

        return view('dashboard.auctionItem.create', compact('auction'));
    }

    public function edit($auctionId, $id)
    {
        $auction = Auctions::findOrFail($auctionId);
        $auction_item = $auction->acutionItems()->findOrFail($id);

        return view('dashboard.auctionItem.edit', compact('auction_item', 'auction'));
    }

    public function update(Request $request, $auctionId, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'space' => 'required',
        ]);

        $auction = Auctions::findOrFail($auctionId);
        $updated_item = $auction->acutionItems()->findOrFail($id);

        // upload image
        $updated_item_img = $updated_item->item_image;
        if ($request->hasfile('image')) {
            $request->validate([
                'image' => 'image'
            ]);
            $destination = 'uploads/auction-items/'.$request->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $updated_item_img = time().'.'.$extention;
            $file->move('uploads/auction-items/', $updated_item_img);
        }

        $updated_item->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'space' => $request->input('space'),
            'item_image' => $updated_item_img
        ]);

        return redirect()->route('auctions-items.index', $auction->id)->with('status', 'تم تعديل تفاصيل المزاد بنجاح');
    }

    public function destroy($id)
    {
        $auction_item = AcutionItems::find($id);

        $destination = 'uploads/auction-items/'.$auction_item->item_image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $auction_item->delete();
        return redirect()->back()->with('status', 'تم حذف تفاصيل المزاد بنجاح');
    }

}
