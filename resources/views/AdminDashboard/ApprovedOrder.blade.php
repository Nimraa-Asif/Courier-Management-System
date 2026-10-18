@extends('AdminDashboard.adminbasiclayout')
<title>GoCourier - Approved Couriers</title>
@section('content')
<br><br><br>

 <div class="container">
    @if(session('updateapprovedcourier'))
    <center><h3 style="font-size: 18px;color:rgb(121, 238, 12)">{{session('updateapprovedcourier')}}</h3></center>
    @endif
    @if(session('deletemessage'))
    <center><h3 style="font-size: 18px;color:red">{{session('deletemessage')}}</h3></center>
    @endif
   <center>
    <form action="/export" method="POST">
        @csrf
        <button class="btn btn-success" type="submit">Export to Excel</button>
    </form>
   </center>
    <div class="row">
        @foreach($approveCourier as $approve)
        <div class="card" style="width: 23rem">
            <img class="card-img-top" src="{{asset('Images/'.$approve->Product_images)}}" alt="Title" style="height: 300px" />
            <div class="card-body">
                <p class="card-title"><b>ID:</b>  {{ $approve->id }}</p>
                <p class="card-text"><b>Added by:</b>  {{ $approve->Added_by }} <b>Agent Id:</b>  {{ $approve->Agent_Info_Id }} </p>
                <p class="card-text"><b>Tracking ID:</b>  {{ $approve->Tracking_id }}</p>
                <p class="card-text"><b>Sender:</b>  {{ $approve->Sender_name }}    <b>Receiver:  </b>{{ $approve->Receiver_name }}</p>
                <p class="card-text"><b>Email:</b>  {{ $approve->Email }}   <b>Contact:</b>  {{ $approve->Contact }}</p>
                <p class="card-text"><b>Weight:</b>  {{ $approve->Weight_KG }} KG <b>Price:</b>   {{ $approve->Price }}</p>
                <p class="card-text"><b>Receiver City:</b>  {{ $approve->Receiver_city }}  <b>Delivery Charges:</b>  {{ $approve->Delivery_charges }}</p>
                <p class="card-text"><b>Sender Adresss:</b>  {{ $approve->Sender_address }}  <b>Receiver Address:</b> {{ $approve->Receiver_address }}</p>
                <p class="card-text"><b>Date Of Order:</b>  {{ $approve->Order_date }} </p>
            
                <h6 class="card-text"> Total Price:  <span style="color: yellow">{{ $approve->Total_price }}</span>  </h6>
                <h6 class="card-text">  Status:  <b><span class="text-success">{{ $approve->Status }}</span></b></h6>

                <form action="approveupdate/{{$approve->id}}" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">Update</button>
                </form>
                <form action="approvedelete/{{$approve->id}}" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
            </div>
      </div>
      @endforeach
        </div>
 </div>
 @endsection
 