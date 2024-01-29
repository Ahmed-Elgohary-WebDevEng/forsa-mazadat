<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auctions;
use App\Models\WebsiteUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'locked',
            'unlock'
        ]);
        $this->middleware('guest:webuser')->except('logout');
    }
    public function register()
    {
        $role = DB::table('role_type_users')->get();

        return view('auth.register',compact('role'));
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        
        User::create([
            'name'      => $request->name,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'join_date' => $todayDate,
            'role_name' => $request->role_name,
            'password'  => Hash::make($request->password),
        ]);
        Toastr::success('Create new account successfully :)','Success');
        return redirect()->intended('home');

       // return redirect('/home');
    }

    public function showWebRegisterForm()
    {
        $auctions =Auctions::all();
        
        return view('website.webAuth.reg', ['url' => 'webuser'] ,  compact('auctions'));
    }

    protected function createWebuser(Request $request)
    {
        $dt       = Carbon::now();
         $todayDate = $dt->toDayDateTimeString();
         
         WebsiteUsers::create([
             'Firstname'      => $request->Firstname,
             'lastname'    => $request->lastname,
             'email'     => $request->email,
             'join_date' => $todayDate,
             'identity' => $request->identity,
             'phone' => $request->phone,
             'Location' => $request->Location,
             'Region' => $request->Region,
             'password'  => Hash::make($request->password),
         ]);

        return redirect()->intended('/index');

}
}

