<?php

namespace App\Http\Controllers;

use App\Models\Auctions;
use App\Models\WebsuteUsers;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
class FrontendSigninController extends Controller
{
  /*  public function signinweb()
    {   


       return view('website.signin');

    }
  

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
            $credentials = $request->only('identity', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/Auctions')
                        ->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }

public function registration()
    {
        return view('website.register');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'identity' => 'required',
            'Firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("index")->withSuccess('You have signed-in');
    }
    public function create(array $data)
    {
        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
      return WebsuteUsers::create([
        'Firstname' => $data['Firstname'],
        'lastname' => $data['lastname'],
        'phone' => $data['phone'],
        'identity' => $data['identity'],
        'Location' => $data['Location'],
        'Region' => $data['Region'],
        'join_date' => $todayDate,
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function auctions()
    {
        if(Auth::check()){
            return view('website.auction');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }*/
}
    /** logout */
    


