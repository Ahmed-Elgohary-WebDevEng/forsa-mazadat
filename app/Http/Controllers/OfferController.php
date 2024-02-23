<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

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
            'area' => 'required'
        ]);

        Offer::create([
            'type' => $request->input('type'),
            'space' => $request->input('space'),
            'area' => $request->input('area')
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
            'area' => 'required'
        ]);

        $offer->update([
            'type' => $request->input('type'),
            'space' => $request->input('space'),
            'area' => $request->input('area')
        ]);


        return redirect()->route('offers.index')->with('status', 'تمت تعديل العرض بنجاح');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()->route('offers.index')->with('status', 'تم حذف العرض بنجاح');
    }
}
