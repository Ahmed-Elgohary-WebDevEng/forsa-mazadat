<?php

namespace App\Http\Controllers;

use App\Models\Auctions;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
            'ShowInfath' => 'required',
            'PlatformName' => 'required',
            'description' => 'required',
            'dateOfStarting' => 'required',
            'timeOfStarting' => 'required',
            'dateOfEnding' => 'required',
            'image' => 'required',
            'timeOfEnding' => 'required',
            'company_id' => 'required|numeric',
            'pdf_link' => 'required'
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
                // added new
                'timeOfEnding' => $request->timeOfEnding,
                'company_id' => (int) $request->company_id,
                'pdf_link' => $request->pdf_link
            ]);
        });

        return redirect()->to('auction')->with('status', 'تمت إضافة المزاد بنجاح');
    }

    public function create()
    {
        $companies = Company::select('id', 'name')->get();
        return view('dashboard.auction.create', compact('companies'));
    }

    public function edit($id)
    {
        $auction = Auctions::findOrFail($id);
        $companies = Company::select('id', 'name')->where('id', '!=', $auction->company_id)->get();

        return view('dashboard.auction.edit', compact('auction', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $auction = Auctions::findOrFail($id);

        $request->validate([
            "Title" => ['required', 'string', Rule::unique('auctions', 'Title')->ignore($auction->id)],
            'Region' => 'required',
            'type' => 'required',
            'link' => 'required',
            'ShowInfath' => 'required',
            'PlatformName' => 'required',
            'description' => 'required',
            'dateOfStarting' => 'required',
            'timeOfStarting' => 'required',
            'timeOfEnding' => 'required',
            'dateOfEnding' => 'required',
            'company_id' => 'required|numeric',
            'pdf_link' => 'required'
        ]);

        $filenameImg = $auction->image;
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

        $platformImg = $auction->PlatformImage;
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

        $auction->update([
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
            // added new
            'timeOfEnding' => $request->timeOfEnding,
            'company_id' => (int) $request->company_id,
            'pdf_link' => $request->pdf_link
        ]);

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
