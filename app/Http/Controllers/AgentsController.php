<?php

namespace App\Http\Controllers;

use App\Models\agents;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class AgentsController extends Controller
{
    public function index()
    {
        $agent = agents::all();
        return view('dashboard.agents.index', compact('agent'));
    }
    
    public function create()
    {
        return view('dashboard.agents.create');
    }
    public function store(Request $request)
    {
        $agent = new agents;
     

        $agent->name = $request->input('name');
        $agent->logo = $request->logo;
        $agent->link = $request->link;


        if($request->hasfile('logo'))
        {
            $file = $request->file('logo');
            $extention = $file->getClientOriginalName();
            $filename = $agent->id . '.'.$extention;
            $file->move('uploads/agentsLogo/', $filename);
            $agent->logo = $filename;
            
        }
        $agent->save();
        return redirect()->back()->with('status','agent Added Successfully');
    }
    
    public function edit($id)
    {
        $agent = agents::find($id);
        return view('dashboard.agents.edit', compact('agent'));
    }

    public function update(Request $request, $id)
    {
        
        $agent = agents::find($id);
        $agent->name = $request->input('name');
        $agent->link = $request->link;

             if($request->hasfile('logo'))
            {
                $file = $request->file('logo');
                $extention = $file->getClientOriginalName();
                $filename = $agent->id . '.'.$extention;
                $file->move('uploads/agentsLogo/', $filename);
                $agent->logo = $filename;
                
            }
		
 

        $agent->update();
        return redirect()->back()->with('status','agent Updated Successfully');
    }

    public function destroy($id)
    {
        $agent = agents::find($id);
        $destination = 'uploads/agentsLogo/'.$agent->logo;

        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $agent->delete();
        return redirect()->back()->with('status','agent Deleted Successfully');
    }
}
