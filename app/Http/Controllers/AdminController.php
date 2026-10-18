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
use App\Exports\ApproveOrdersExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    //Export to Excel
    public function export()
    {
        return Excel::download(new ApproveOrdersExport, 'approve-orders.xlsx');
    }
   // View Registered User 
    public function registeredUsers()
    {
        $registerUsers = User::get();
        return view('AdminDashboard.RegisteredUsers',compact('registerUsers'));
    }
    //Agent Form
    public function showAgentForm()
    {
        return view('AdminDashboard.AddAgent');
    }
    //View All Agents
    public function viewAgents()
    {
    $records = AgentInfo::get();
    return view('AdminDashboard.RegisteredAgents',compact('records'));
    }
    //Agents Register
    public function registerAgents(Request $req)
    {
        $agent_name = $req->post('name');
        $agent_email = $req->post('email');
        $agent_number = $req->post('number');
        $agent_location = $req->post('location');
        $agent_salary = $req->post('salary');
        $agent_password = $req->post('password');

        $table = new AgentInfo();
        $table->Agent_Name = $agent_name;
        $table->Email = $agent_email;
        $table->Contact = $agent_number;
        $table->Location = $agent_location;
        $table->Salary = $agent_salary;
        $table->Password = $agent_password;
        $table->save();
        return redirect()->back()->with("agentmessage","Agent Record has been inserted!");
    }
    //View ALl Agents
    public function fetchData()
    {
        $registeredAgents = AgentInfo::get();
        return view('AdminDashboard.RegisteredAgents',compact('registeredAgents'));
    }
    //Delete Agents
    public function deleteAgent($id)
    {
        $specificAgent = AgentInfo::find($id);
        $specificAgent->delete();
        return redirect('/fetch')->with("agentdeletemessage","Record has been deleted!");
    }
    //Update Agents
    public function updateAgent($id)
    {
        $specificAgent = AgentInfo::find($id);
        return view('AdminDashboard.UpdateAgent',compact('specificAgent'));

    }
    public function updateAgentRecord(Request $req)
    {
        $updateAgent = AgentInfo::find($req->id);
        $updateAgent->Agent_Name =  $req->name;
        $updateAgent->Email =  $req->email;
        $updateAgent->Contact =  $req->contact;
        $updateAgent->Location =  $req->location;
        $updateAgent->Salary =  $req->salary;
        $updateAgent->Password =  $req->password;
        $updateAgent->save();
        return redirect('/fetch')->with("agentupdatedmessage","Record has been updated!");
    }
    //View All Pending Couriers
    public function fetchAllCouriers()
    {
        $fetchCouriers = UserCourier::with('agent')->get();
        return view('AdminDashboard.PendingCouriers',compact('fetchCouriers'));
    }
    //Pending Courier to Approval
    public function approvedOrder($id)
    {
      $approveId = UserCourier::find($id);
      $userCourierDetail = UserCourier::where('Tracking_id', $approveId->Tracking_id)->first();
      $approved =  new ApproveOrder();
      $approved->Tracking_id = $approveId->Tracking_id;
      $approved->Agent_Info_Id = $userCourierDetail->Agent_Id;
      $approved->Sender_name = $approveId->Sender_name;
      $approved->Receiver_name = $approveId->Receiver_name;
      $approved->Email = $approveId->Email;
      $approved->Contact = $approveId->Contact;
      $approved->Product_images = $approveId->Product_images;
      $approved->Weight_KG = $approveId->Weight_KG;
      $approved->Price = $approveId->Price;
      $approved->Receiver_city = $approveId->Receiver_city;
      $approved->Delivery_charges = $approveId->Delivery_charges;
      $approved->Sender_address = $approveId->Sender_address;
      $approved->Receiver_address = $approveId->Receiver_address;
      $approved->Order_date = $approveId->Order_date;
      $approved->Added_by = 'Agent';
      $approved->Total_price = $approveId->Total_price; 
      $approved->save();
      $approveId->delete();
      //Mail::to($approveId->Email)->send(new CourierApproved());
      return redirect()->back()->with('approvemessage',"Pending Courier has been Approved!");
    }
    //View All ApprovedCouriers

    public function fetchApprovedOrder()
    {
        $approveCourier = ApproveOrder::get();
        return view('AdminDashboard.ApprovedOrder',compact('approveCourier'));
    }
    //Pending Couriers to Denied
    public function deniedOrder($id)
    {
      $denyId = UserCourier::find($id);
      $denied =  new deniedCourier();
      $denied->Tracking_id = $denyId->Tracking_id ;
      $denied->Sender_name = $denyId->Sender_name;
      $denied->Receiver_name = $denyId->Receiver_name;
      $denied->Email = $denyId->Email;
      $denied->Contact = $denyId->Contact;
      $denied->Product_images = $denyId->Product_images;
      $denied->Weight_KG = $denyId->Weight_KG;
      $denied->Price = $denyId->Price;
      $denied->Receiver_city = $denyId->Receiver_city;
      $denied->Delivery_charges = $denyId->Delivery_charges;
      $denied->Sender_address = $denyId->Sender_address;
      $denied->Receiver_address = $denyId->Receiver_address;
      $denied->Order_date = $denyId->Order_date;
      $denied->Total_price = $denyId->Total_price; 
      $denied->save();
      $denyId->delete();
      return redirect()->back()->with('deniedmessage',"Pending Courier has been Cancelled!");
    }
    //View Denied Couriers
    public function fetchDeniedOrder()
    {
        $denyCourier = deniedCourier::get();
        return view('AdminDashboard.Denied',compact('denyCourier'));
    }

    //Admin Insert Courier
    public function adminApprovedOrder(Request $req)
    {

      $approved =  new ApproveOrder();
      $approved->Tracking_id = rand();
      $approved->Agent_Info_Id = '0';
      $approved->Sender_name = $req->s_name;
      $approved->Receiver_name = $req->r_name;
      $approved->Email = $req->email;
      $approved->Contact = $req->contact;
      $image=$req->file('image');
      $ext= rand().".".$image->getClientOriginalName();
      $image->move("Images/",$ext);
      $approved->Product_images=$ext;
      $approved->Weight_KG = $req->weight;
      $approved->Price = $req->price;
      $approved->Receiver_city = $req->city;
      $approved->Delivery_charges = $req->delivery;
      $approved->Sender_address = $req->s_address;
      $approved->Receiver_address = $req->r_address;
      $approved->Order_date = $req->date;
      $approved->Total_price = $req->total; 
      $approved->Added_by = 'Admin';
      $approved->save();
      return redirect()->back()->with("couriermessage","Courier Details has been inserted!");
    }
   //Update Approve Courier
    public function approveUpdateCourier($id)
    {
        $approveUpdate = ApproveOrder::find($id);
        return view('AdminDashboard.UpdateApprovedCourier',compact('approveUpdate'));

    }
    public function updateSpecificApproveCourier(Request $req)
    {
        $approveUpdate = ApproveOrder::find($req->id);
        $approveUpdate->Tracking_id = $req->tracking ;
        $approveUpdate->Sender_name = $req->s_name;
        $approveUpdate->Receiver_name = $req->r_name;
        $approveUpdate->Email = $req->email;
        $approveUpdate->Contact = $req->contact;
        $approveUpdate->Weight_KG = $req->weight;
        $approveUpdate->Price = $req->price;
        $approveUpdate->Receiver_city = $req->r_city;
        $approveUpdate->Delivery_charges = $req->dc;
        $approveUpdate->Sender_address = $req->s_address;
        $approveUpdate->Receiver_address = $req->r_address;
        $approveUpdate->Order_date = $req->date;
        $approveUpdate->Total_price = $req->total;
        $approveUpdate->save();
        return redirect()->route('fetchConfirmOrder')->with("updateapprovedcourier","Courier Details has been updated!");
    }
    //Delete Approve Courier
    public function deleteApproveCourier($id)
    {
        $approveDlt = ApproveOrder::find($id);
        $approveDlt->delete();
        return redirect()->route('fetchConfirmOrder')->with('deletemessage',"Approved Courier has been deleted!");
    }
    //Inster Denied Couriers
    public function deniedApproveCourier($id)
    {
      $approveId = deniedCourier::find($id);
      $approved =  new ApproveOrder();
      $approved->Tracking_id = $approveId->Tracking_id ;
      $approved->Sender_name = $approveId->Sender_name;
      $approved->Receiver_name = $approveId->Receiver_name;
      $approved->Email = $approveId->Email;
      $approved->Contact = $approveId->Contact;
      $approved->Product_images = $approveId->Product_images;
      $approved->Weight_KG = $approveId->Weight_KG;
      $approved->Price = $approveId->Price;
      $approved->Receiver_city = $approveId->Receiver_city;
      $approved->Delivery_charges = $approveId->Delivery_charges;
      $approved->Sender_address = $approveId->Sender_address;
      $approved->Receiver_address = $approveId->Receiver_address;
      $approved->Order_date = $approveId->Order_date;
      $approved->Added_by = 'Agent';
      $approved->Total_price = $approveId->Total_price; 
      $approved->Agent_Info_Id = '1';
      $approved->save();
      $approveId->delete();
      return redirect()->back()->with('deniedApproveMessage',"Denied Courier has been Approved!");
    }
//Delete Denied Couriers
    public function deniedDeleteCourier($id)
    {
        $deniedDlt = deniedCourier::find($id);
        $deniedDlt->delete();
        return redirect()->back()->with('deniedApproveMessage',"Denied Courier has been deleted!");
    }

      //Admin User Contact Details

      public function adminUserContact()
      {
          $contactDetails = contactUs::get();
          return view('AdminDashboard.ContactUs',compact('contactDetails'));
      }
    //Admin Track Specific Courier
      public function adminTrackCourier(Request $req)
      {
          $trackid = $req->trackid;
          $SpecificCourier = DB::table('approve_orders')->where('Tracking_id',$trackid)->get();
          if($SpecificCourier)
          {
              return view('AdminDashboard.AdminTracking',compact('SpecificCourier'));
          }
          else
          {
  
              return redirect()->back()->with('trackmessage',"Sorry Record is not found!");
          }
  
      }
      //Update Pending Courier
      public function updateCourier($id)
    {
        $specificCourier = UserCourier::find($id);
        return view('AdminDashboard.UpdateCourier',compact('specificCourier'));

    }
    public function updateSpecificCourier(Request $req)
    {
        $updateCourier = UserCourier::find($req->id);
        $updateCourier->Tracking_id = $req->tracking ;
        $updateCourier->Sender_name = $req->s_name;
        $updateCourier->Receiver_name = $req->r_name;
        $updateCourier->Email = $req->email;
        $updateCourier->Contact = $req->contact;
        $updateCourier->Weight_KG = $req->weight;
        $updateCourier->Price = $req->price;
        $updateCourier->Receiver_city = $req->r_city;
        $updateCourier->Delivery_charges = $req->dc;
        $updateCourier->Sender_address = $req->s_address;
        $updateCourier->Receiver_address = $req->r_address;
        $updateCourier->Order_date = $req->date;
        $updateCourier->Total_price = $req->total;
        $updateCourier->save();
        return redirect()->route('fetchAll')->with("updatecourier","Courier has been updated!");
    }

}