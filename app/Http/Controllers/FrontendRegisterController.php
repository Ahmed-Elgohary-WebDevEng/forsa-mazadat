<?php

namespace App\Http\Controllers;

use App\Models\WebsuteUsers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class FrontendRegisterController extends Controller
{
   /* public function registerweb()
     {   


        return view('website.webAuth.register');

     }

     
     public function storeUser(Request $request)
     {
         $request->validate([
             'Firstname'      => 'required|string|max:255',
             'lastname'      => 'required|string|max:255',
             'email'     => 'required|string|email|max:255|unique:website_users',
             'identity'     => 'required|max:10|unique:website_users',
             'password'  => 'required|string|min:8|confirmed',
             'password_confirmation' => 'required',
         ]);
 
         $dt       = Carbon::now();
         $todayDate = $dt->toDayDateTimeString();
         
         WebsuteUsers::create([
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
         Toastr::success('Create new account successfully :)','Success');
         return redirect('login');
     }*/
 }
 