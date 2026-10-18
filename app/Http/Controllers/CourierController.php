<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\AgentInfo;
use App\Models\UserCourier;
use App\Models\ApproveOrder;
use App\Models\deniedCourier;
use App\Models\contactUs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Exports\ApproveOrdersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\CourierApproved;
use Illuminate\Support\Facades\Mail;



class CourierController extends Controller
{
    public function export()
{
    return Excel::download(new ApproveOrdersExport, 'approve-orders.xlsx');
}
   
   //Registration Form
    public function showForm()
    {
        return view('auth.register');
    }
    //Registration Data Insert
    public function registerInfo(Request $req)
    {
        $req->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
     $user = new User();
     $user->name = $req->name;
     $user->email = $req->email;
     $user->password = bcrypt($req->password);
     $user->role = 2;
     $user->save();
     return view('auth.login');
    }
    //Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }
   //Login Data Check
    public function loginInfo(Request $request)
    {
        $userCredentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($userCredentials)) {
            $user = auth()->user();
            session(['courier' => $request->email, 'user' => $user]);
            if ($user->role == 2) {
                return view('index');
            }
            return view('AdminDashboard.dashboardlayout'); 
        }
        return view('auth.login')->with('errorloginmessage', 'Login failed. Please check your email and password.');
    }

   //Contact Form Data Inserted
    public function contactInfo(Request $req)
    {
    $usercontact = new contactUs();
    $usercontact->User_Name = $req->u_name;
    $usercontact->Email = $req->email;
    $usercontact->Contact = $req->contact;
    $usercontact->Message = $req->message;
    $usercontact->save();
    return redirect('/contact');
    }
    
    //Logout 

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

   //Track Specific Courier For User
    public function trackSpecificCourier(Request $req)
    {
        $trackid = $req->trackid;
        $fetchSpecificCourier = DB::table('approve_orders')->where('Tracking_id',$trackid)->get();
        if($fetchSpecificCourier)
        {
            return view('tracking',compact('fetchSpecificCourier'));
        }
        else
        {
            return view('tracking')->with("trackmessage","Your Record has not been found");
            
        }

    }

    //Agent Custom Login
    public function agentLoginForm()
    {
        return view('agent-login-form');
    }

    //Agent Login Data Check

    public function agentLogin(Request $req)
    {
        $agentemail = DB::table('agent_infos')
        ->where('Email', $req->email)
        ->where('Password', $req->password)
        ->first();
        if($agentemail) {
            
            session([ "agentDetail" => $agentemail ]);
            return redirect()->route('agent.dashboard');
        } else {
            return redirect()->back()->with('errormessage','Email or Password Incorrect');
        }
    }

    //Agent Logout

    public function agentDashboard ()
    {
        
        if (!Session::has('agentDetail')) {
            return redirect()->back();
        }
        return view('AgentDashboard.AgentbasicLayout');
    }

    //Agent Insert Courier

    public function agentAddCourier(Request $req)
    {
        $agentDetail = session('agentDetail');
        //$userCourierDetail = UserCourier::where('Tracking_id', $approveId->Tracking_id)->first();
        $table =  new UserCourier();
        $table->Tracking_id = rand();
        $table->Sender_name = $req->s_name;
        $table->Receiver_name = $req->r_name;
        $table->Email = $req->email;
        $table->Contact = $req->contact;
        $image=$req->file('image');
        $ext= rand().".".$image->getClientOriginalName();
        $image->move("Images/",$ext);
        $table->Product_images=$ext;
        $table->Weight_KG= $req->weight;
        $table->Price = $req->price;
        $table->Receiver_city = $req->city;
        $table->Delivery_charges = $req->delivery;
        $table->Sender_address = $req->s_address;
        $table->Receiver_address = $req->r_address;
        $table->Order_date = $req->date;
        $table->Total_price = $req ->total;
        $table->Agent_Id = $agentDetail->id;
        $table->save();
        return redirect()->route('agentAddCourier')->with('agentadd',"Courier has been added");
    }

    //Agent Fetch Courier

    public function agentFetchCourier ()
    {
        $getUserDetail = session('agentDetail');
        $getApproveOrders = ApproveOrder::where('Agent_Info_Id', $getUserDetail->id)->with('agent')->get();
        return view('AgentDashboard.CourierFetch', compact('getApproveOrders'));
    }

//Agent Track Courier

    public function agentTrackCourier(Request $req)
    {
        $trackid = $req->trackid;
        $AgentSpecificCourier = DB::table('approve_orders')->where('Tracking_id',$trackid)->get();
        if($AgentSpecificCourier)
        {
            return view('AgentDashboard.AgentTracking',compact('AgentSpecificCourier'));
        }
        else
        {

            return redirect()->back()->with('agenttrackmessage',"Sorry Record is not found!");
        }

    }

    }

