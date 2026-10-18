<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about-us');
});

Route::get('/contact', function () {
    return view('contact-us');
});


Route::get('/admin-tracking', function (Request $req) {

        $trackid = $req->trackid;
        $SpecificCourier = DB::table('approve_orders')->where('Tracking_id',$trackid)->get();
        if($SpecificCourier)
        {
            return view('AdminDashboard.AdminTracking',compact('SpecificCourier'));
        }
        else
        {

            echo "Record Not Found";
        }
})->name('adminTracking');

Route::get('/agent-new-courier', function () {
    return view('AgentDashboard.AddNewCourier');
})->name('agentAddCourier');

Route::post('/contact-info', [CourierController::class, 'contactInfo'])->name('contactUs');

Route::get('/register',[CourierController::class,'showForm'])->name('register-admin');
Route::get('/logout',[CourierController::class,'logout']);
Route::post('/register', [CourierController::class, 'registerInfo'])->name('registerSubmit');
Route::get('/loginform',[CourierController::class,'showLoginForm'])->name('loginForm');
Route::post('/login', [CourierController::class, 'loginInfo'])->name('loginSubmit');
Route::post('/export', [AdminController::class, 'export']);

////  Agent CRUD ///  
Route::get('/agentform',[AdminController::class,'showAgentForm'])->name('AgentForm');

Route::post('/addagent',[AdminController::class, 'registerAgents'])->name('RegisterAgents');
Route::get('/fetch',[AdminController::class, 'fetchData'])->name('fetchAgent');

Route::post('/del/{id}',[AdminController::class, 'deleteAgent'])->name('deleteRecord');
Route::post('/upd/{id}',[AdminController::class, 'updateAgent'])->name('updateRecord');
Route::post('/update',[AdminController::class, 'updateAgentRecord'])->name('specificUpdate');
////  Agent CRUD End ///  

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin', function () {
       if(Auth::User()->role == 2)
       {
        return view('index');
       }
       else{
        return view('AdminDashboard.adminbasiclayout');
       }
    })->name('dashboard');

//  User Track //
Route::post('/trackCourier',[CourierController::class, ('trackSpecificCourier')])->name('trackOrder');
Route::get('/track',[CourierController::class, 'trackSpecificCourier'])->name('track');
//  User Track End //

//Admin Add Courier //
Route::get('/admin-new-courier', function () {
    return view('AdminDashboard.AddNewCourier');
})->name('adminNewCourier');

//Admin Add Courier End//

//  Registered Users  //
Route::get('/register-user',[AdminController::class,'registeredUsers'])->name('registerUsers');

//Pending Couriers //
Route::get('/fetch-couriers',[AdminController::class, ('fetchAllCouriers')])->name('fetchAll');

Route::post('/approve/{id}',[AdminController::class, 'approvedOrder'])->name('approveOrder');
Route::get('/approve-couriers',[AdminController::class, ('fetchApprovedOrder')])->name('fetchConfirmOrder');

Route::post('/deny/{id}',[AdminController::class, 'deniedOrder'])->name('denyOrders');
Route::get('/deny-couriers',[AdminController::class, ('fetchDeniedOrder')])->name('fetchDenyCourier');

Route::post('/update/{id}',[AdminController::class, 'updateCourier'])->name('updateOrder');
Route::post('/update-courier',[AdminController::class, 'updateSpecificCourier'])->name('updCourier');
//Pending Couriers End //

//Admin Contact Details
Route::get('/admin-user-details',[AdminController::class, 'adminUserContact'])->name('UserContact');

//Admin Courier CRUD //

//Admin Insert Courier //
Route::post('/admin-ins-courier',[AdminController::class, 'adminApprovedOrder'])->name('adminCourier');

//Admin Update Approved Courier //

Route::post('/approveupdate/{id}',[AdminController::class, 'approveUpdateCourier'])->name('approveUpdate');
Route::post('/update-approve-courier',[AdminController::class, 'updateSpecificApproveCourier'])->name('updApproveCourier');

//Admin Delete Approved Courier //
Route::post('/approvedelete/{id}',[AdminController::class, 'deleteApproveCourier'])->name('approveDelete');

//Admin Denied Courier
Route::post('/denied-approved/{id}',[AdminController::class, 'deniedApproveCourier'])->name('deniedApproved');
Route::post('/denied-delete/{id}',[AdminController::class, 'deniedDeleteCourier'])->name('deniedDeleted');

//Admin Courier CRUD End //

//Admin Track Courier //
Route::post('/admin-courier',[AdminController::class, ('adminTrackCourier')])->name('adminFetchTrack');
Route::get('/admin-track',[AdminController::class, 'adminTrackCourier'])->name('adminTrack');

});

//Agent Login
Route::get('/agent-login',[CourierController::class, 'agentLoginForm' ])->name('agentLoginForm');
Route::post('/agent-login-info',[CourierController::class, 'agentLogin'])->name('agentLoginInfo');
Route::get('/agent/dashboard',[CourierController::class, 'agentDashboard'])->name('agent.dashboard');

//Agent Insert Courier
Route::post('/agent-add-courier',[CourierController::class, 'agentAddCourier'])->name('agentCourier.add');
Route::get('/agent-courier',[CourierController::class, 'agentFetchCourier'])->name('agentCourier.fetch');

//Agent Track Courier
Route::post('/agent-ccourier',[CourierController::class, ('agentTrackCourier')])->name('agentFetchTrack');
Route::get('/agent-track',[CourierController::class, 'agentTrackCourier'])->name('agentTrack');
