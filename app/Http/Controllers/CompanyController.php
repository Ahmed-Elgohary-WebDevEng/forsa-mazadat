<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return view('dashboard.company.index', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'logo' => 'required|image',

            'info_details' => ['required', 'string'],
            'description' => ['required']
        ]);

        // upload image for company
        $logoImg = '';
        if ($request->hasfile('logo')) {
            $destination = 'uploads/company/'.$request->logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $logoImg = time().'.'.$extension;
            $file->move('uploads/company/', $logoImg);
        }

        // create company
        Company::create([
            'name' => $request->input('name'),
            'logo' => $logoImg,
            'info_details' => $request->input('info_details'),
            'description' => $request->input('description')
        ]);


        return redirect()->route('companies.index')->with('status', 'تمت إضافة الشركة بنجاح');
    }

    public function create()
    {
        return view('dashboard.company.create');
    }

    public function edit(Company $company)
    {
        return view('dashboard.company.edit', compact('company'));
    }

    public function update(Company $company, Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'info_details' => ['required', 'string'],
            'description' => ['required']
        ]);

        // upload image for company
        $logoImg = '';
        if ($request->hasfile('logo')) {
            $destination = 'uploads/company/'.$request->logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $logoImg = time().'.'.$extension;
            $file->move('uploads/company/', $logoImg);
        }

        $company->update([
            'name' => $request->input('name'),
            'logo' => $logoImg,
            'info_details' => $request->input('info_details'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('companies.index')->with('status', 'تم تعديل الشركة بنجاح');
    }

    public function destroy(Company $company)
    {
        $destination = 'uploads/company/'.$company->logo;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $company->delete();

        return redirect()->route('companies.index')->with('status', 'تم حذف الشركة بنجاح');
    }
}
