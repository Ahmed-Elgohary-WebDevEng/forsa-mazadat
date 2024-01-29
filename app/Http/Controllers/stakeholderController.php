<?php

namespace App\Http\Controllers;

use App\Models\stakeholder;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class stakeholderController extends Controller
{
    public function index()
    {
        $stakeholder = stakeholder::all();
        return view('dashboard.stakeholder.index', compact('stakeholder'));
    }
    
    public function create()
    {
        return view('dashboard.stakeholder.create');
    }
    public function store(Request $request)
    {
        $stakeholder = new stakeholder;
     

        $stakeholder->name = $request->input('name');
        $stakeholder->logo = $request->logo;
        $stakeholder->link = $request->link;


        if($request->hasfile('logo'))
        {
            $file = $request->file('logo');
            $extention = $file->getClientOriginalName();
            $filename = $stakeholder->id . '.'.$extention;
            $file->move('uploads/logo/', $filename);
            $stakeholder->logo = $filename;
            
        }
        $stakeholder->save();
        return redirect()->back()->with('status','stakeholder Image Added Successfully');
    }
    
    public function edit($id)
    {
        $stakeholder = stakeholder::find($id);
        return view('dashboard.stakeholder.edit', compact('stakeholder'));
    }

    public function update(Request $request, $id)
    {
        
        $stakeholder = stakeholder::find($id);
        $stakeholder->name = $request->input('name');
        $stakeholder->link = $request->link;

             if($request->hasfile('logo'))
            {
                $file = $request->file('logo');
                $extention = $file->getClientOriginalName();
                $filename = $stakeholder->id . '.'.$extention;
                $file->move('uploads/logo/', $filename);
                $stakeholder->logo = $filename;
                
            }
		
 

        $stakeholder->update();
        return redirect()->back()->with('status','stakeholder Updated Successfully');
    }

    public function destroy($id)
    {
        $stakeholder = stakeholder::find($id);
        $destination = 'uploads/logo/'.$stakeholder->logo;

        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $stakeholder->delete();
        return redirect()->back()->with('status','Student Image Deleted Successfully');
    }
}
