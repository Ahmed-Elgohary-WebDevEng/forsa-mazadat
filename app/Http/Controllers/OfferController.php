<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();

        return view('dashboard.offer.index', compact('offers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'space' => 'required',
            'area' => 'required',
            'location' => 'required|url',
            'image' => 'required|image'
        ]);

        // upload image for company
        $offerImg = '';
        if ($request->hasfile('image')) {
            $destination = 'uploads/offers/'.$request->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $offerImg = time().'.'.$extension;
            $file->move('uploads/offers/', $offerImg);
        }

        Offer::create([
            'type' => $request->input('type'),
            'space' => $request->input('space'),
            'area' => $request->input('area'),
            'location' => $request->input('location'),
            'image' => $offerImg
        ]);

        return redirect()->route('offers.index')->with('status', 'تمت إضافة العرض بنجاح');
    }

    public function create()
    {
        return view('dashboard.offer.create');
    }

    public function edit(Offer $offer)
    {
        return view('dashboard.offer.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'type' => 'required',
            'space' => 'required',
            'area' => 'required',
            'location' => 'required|url',
        ]);

        // upload image for company
        $updatedOfferImg = $offer->image;
        if ($request->hasfile('image')) {
            $destination = 'uploads/offers/'.$request->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $updatedOfferImg = time().'.'.$extension;
            $file->move('uploads/offers/', $updatedOfferImg);
        }

        $offer->update([
            'type' => $request->input('type'),
            'space' => $request->input('space'),
            'area' => $request->input('area'),
            'location' => $request->input('location'),
            'image' => $updatedOfferImg
        ]);


        return redirect()->route('offers.index')->with('status', 'تمت تعديل العرض بنجاح');
    }

    public function destroy(Offer $offer)
    {
        $destination = 'uploads/offers/'.$offer->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $offer->delete();

        return redirect()->route('offers.index')->with('status', 'تم حذف العرض بنجاح');
    }
}
