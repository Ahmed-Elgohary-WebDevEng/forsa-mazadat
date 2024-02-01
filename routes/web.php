<?php

use App\Http\Controllers\AgentsController;
use App\Http\Controllers\AuctionsController;
use App\Http\Controllers\AuctionsItemsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\stakeholderController;
use App\Http\Controllers\TypeFormController;
use App\Http\Controllers\UserLogController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::get('slider', function () {
    return view('website.slider');
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/terms', function () {
    return view('website.terms');
});
Route::get('/dashboard', function () {
    return view('auth.login');
});
Route::get('/', [FrontendController::class, 'index']);
Route::post('run-command', [ReminderController::class, 'runCommand'])->name('run-command');

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', function () {
        return view('home');
    });
    Route::get('home', function () {
        return view('home');
    });
});
// -----------------------------login-------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

// ------------------------------ register ---------------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->middleware('auth')->name('register');
    Route::post('/register', 'storeUser')->middleware('auth')->name('register');
});


// ------------------------------ register Web user ---------------------------------//
/*Route::controller(RegisterController::class)->group(function () {

Route::get('/register/user', 'showWebRegisterForm')->name('registerWeb');
Route::post('/register/user','createWebuser')->name('registerWeb');
});*/

// -----------------------------login Web user-------------------------------//
/*Route::controller(LoginController::class)->group(function () {

Route::get('Weblogin/user', 'showWebLoginForm')->name('loginWeb');
Route::post('Weblogin/user','webLogin')->name('loginWeb');
Route::group(['middleware'=>'auth:webuser'], function(){

Route::get('/logout/user', 'Weblogout')->name('Weblogout');
});

});*/


// -------------------------- main dashboard ----------------------//
Route::controller(AuctionsController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth')->name('home');
});

// -------------------------- user management ----------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('user/table', 'index')->middleware('auth')->name('user/table');
    Route::post('user/update', 'updateRecord')->name('user/update');
    Route::post('user/delete', 'deleteRecord')->name('user/delete');
    Route::get('user/profile', 'profileUser')->middleware('auth')->name('user/profile');

});

// -------------------------- auction ----------------------//
Route::get('auction', [AuctionsController::class, 'index'])->middleware('auth');
Route::get('add_auction', [AuctionsController::class, 'create'])->middleware('auth');
Route::post('add_auction', [AuctionsController::class, 'store']);
Route::get('edit_auction/{id}', [AuctionsController::class, 'edit'])->middleware('auth');
Route::put('update_auction/{id}', [AuctionsController::class, 'update']);
Route::delete('delete_auction/{id}', [AuctionsController::class, 'destroy']);

Route::get('auctionitem/{id}', [AuctionsItemsController::class, 'index'])->middleware('auth')->name('auctionitem');
Route::get('add_auctionitem/{id}', [AuctionsItemsController::class, 'create'])->middleware('auth');
Route::post('add_auctionitem/{id}', [AuctionsItemsController::class, 'store']);
Route::get('edit_auctionitem/{id}/{auctionId}', [AuctionsItemsController::class, 'edit'])->middleware('auth');
Route::put('update_auctionitem/{id}/{auctionId}', [AuctionsItemsController::class, 'update']);
Route::delete('delete_auctionitem/{id}', [AuctionsItemsController::class, 'destroy']);

Route::get('userlog/{id}', [UserLogController::class, 'index'])->middleware('auth');
Route::get('userlogall', [UserLogController::class, 'indexall'])->middleware('auth')->name('userlogall');
//Route::get('add_userlog/{id}', [UserLogController::class, 'create']);
//Route::post('add_userlog/{id}', [UserLogController::class, 'store']);
Route::get('edit_userlog/{id}/{auctionId}', [UserLogController::class, 'edit'])->middleware('auth');
Route::put('update_userlog/{id}/{auctionId}', [UserLogController::class, 'update']);
Route::delete('delete_userlog/{id}', [UserLogController::class, 'destroy']);

Route::get('reminderindex/{id}', [ReminderController::class, 'index'])->middleware('auth')->name('reminder');
Route::get('reminderindexall', [ReminderController::class, 'indexall'])->middleware('auth')->name('reminderall');
Route::get('add-reminder/{id}', [ReminderController::class, 'create'])->middleware('auth');
Route::post('add-reminder/{id}', [ReminderController::class, 'store']);

Route::get('/stakeholder', [stakeholderController::class, 'index'])->middleware('auth')->name('stakeholder');
Route::get('add-stakeholder', [stakeholderController::class, 'create'])->middleware('auth')->name('addstakeholder');
Route::post('add-stakeholder', [stakeholderController::class, 'store']);
Route::get('edit-stakeholder/{id}',
    [stakeholderController::class, 'edit'])->middleware('auth')->name('updatestakeholder');
Route::put('update-stakeholder/{id}', [stakeholderController::class, 'update']);
Route::delete('delete-stakeholder/{id}', [stakeholderController::class, 'destroy']);


Route::get('/agents', [AgentsController::class, 'index'])->middleware('auth')->name('Agents');
Route::get('add-agents', [AgentsController::class, 'create'])->middleware('auth')->name('addAgents');
Route::post('add-agents', [AgentsController::class, 'store']);
Route::get('edit-agents/{id}', [AgentsController::class, 'edit'])->middleware('auth')->name('updateAgents');
Route::put('update-agents/{id}', [AgentsController::class, 'update']);
Route::delete('delete-agents/{id}', [AgentsController::class, 'destroy']);


// -------------------------- type form ----------------------//
Route::controller(TypeFormController::class)->group(function () {
    Route::get('form/input/new', 'index')->middleware('auth')->name('form/input/new');

});

/* Route::get('/loginweb',  [FrontendSigninController::class, 'signinweb']);
Route::post('/loginweb',  [FrontendSigninController::class, 'authenticate']); */

/* Route::get('/registerweb',  [FrontendRegisterController::class, 'registerweb']);
Route::post('/registerweb',[FrontendRegisterController::class, 'storeUser']);
Route::post('/registerweb',[FrontendRegisterController::class, 'storeUser']); */

Route::get('/Auctions', [FrontendController::class, 'auction']);
Route::get('/index', [FrontendController::class, 'index'])->name('indexweb');
Route::get('/region', [FrontendController::class, 'region']);
Route::get('/type', [FrontendController::class, 'Type']);
Route::get('regioncontent/{Region}', [FrontendController::class, 'qassim_region_content']);
Route::get('typecontent/{Type}', [FrontendController::class, 'TypeContent']);

/* Route::group(['middleware'=>'auth:webuser'], function(){






}); */


Route::get('/auctions/{slug}', [FrontendController::class, 'auctionContent']);
Route::get('userLog/{id}', [FrontendController::class, 'userLog'])->name('userLog');
Route::post('userLog/{id}', [FrontendController::class, 'Userlogstore']);

Route::get('add-reminder/{id}', [ReminderController::class, 'create']);
Route::post('add-reminder/{id}', [ReminderController::class, 'store']);

Route::get('reminder/{id}', [FrontendController::class, 'create'])->name('reminder');
Route::post('reminder/{id}', [FrontendController::class, 'reminderstore']);
/* Route::get('login', [FrontendSigninController::class, 'signinweb'])->name('login');
Route::post('custom-login', [FrontendSigninController::class, 'authenticate'])->name('login.custom');
Route::get('registration', [FrontendSigninController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [FrontendSigninController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [FrontendSigninController::class, 'signOut'])->name('signout');
 */
/* Route::get('/',  [FrontendController::class, 'index']);

Route::get('invtation',  [FrontendController::class, 'invtation'])->name('invtation');
Route::get('showartical/{id}/{sufraa_id}', [FrontendController::class, 'show']);
Route::get('sufraa_massege/{sufraa_slug}', [FrontendController::class, 'sufraa_massege']);
Route::get('activites',  [FrontendController::class, 'activites'])->name('activites');
Route::get('member',  [FrontendController::class, 'member'])->name('member');
Route::get('stackholder',  [FrontendController::class, 'stackholder'])->name('stackholder');
Route::get('dream',  [FrontendController::class, 'dream'])->name('dream');
Route::get('nabdhsports',  [FrontendController::class, 'nabdhsports'])->name('nabdhsports');
Route::get('tech_kid',  [FrontendController::class, 'tech_kid'])->name('tech_kid');
Route::get('activites',  [FrontendController::class, 'activites'])->name('activites');
Route::get('visitAlfahda',  [FrontendController::class, 'visitAlfahda'])->name('visitAlfahda');
Route::get('albaha',  [FrontendController::class, 'albaha'])->name('albaha');
Route::get('eqtafy',  [FrontendController::class, 'eqtafy'])->name('eqtafy');
Route::get('content/{country_slug}',  [FrontendController::class, 'content'])->name('content');
 */
