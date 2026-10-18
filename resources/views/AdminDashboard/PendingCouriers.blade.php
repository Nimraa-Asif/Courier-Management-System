@extends('AdminDashboard.adminbasiclayout')
<title>GoCourier - Pending Couriers</title>
@section('content')
<br><br><br>

 <div class="container">
  @if(session('updatecourier'))
  <center><h3 style="font-size: 18px;color:rgb(121, 238, 12)">{{session('updatecourier')}}</h3></center>
  @endif
  @if(session('approvemessage'))
  <center><h3 style="font-size: 18px;color:rgb(121, 238, 12)">{{session('approvemessage')}}</h3></center>
  @endif
  @if(session('deniedmessage'))
  <center><h3 style="font-size: 18px;color:red">{{session('deniedmessage')}}</h3></center>
  @endif
    <div class="row">
        @foreach($fetchCouriers as $couriers)
        <div class="card" style="width: 23rem">
            <img class="card-img-top" src="{{asset('Images/'.$couriers->Product_images)}}" alt="Title" style="height: 300px" />
            <div class="card-body">
                <!-- <p class="card-title"><b>ID:</b>  {{ $couriers->id }}</p> -->
                <p class="card-text"><b>Tracking ID:</b>  {{ $couriers->Tracking_id }}</p>
                <p class="card-text"><b>Agent Name:</b>  {{ $couriers->agent->Agent_Name }}</p>
                <p class="card-text"><b>Sender:</b>  {{ $couriers->Sender_name }}    <b>Receiver:  </b>{{ $couriers->Receiver_name }}</p>
                <p class="card-text"><b>Email:</b>  {{ $couriers->Email }}   <b>Contact:</b>  {{ $couriers->Contact }}</p>
                <p class="card-text"><b>Weight:</b>  {{ $couriers->Weight_KG }} KG <b>Price:</b>   {{ $couriers->Price }}</p>
                <p class="card-text"><b>Receiver City:</b>  {{ $couriers->Receiver_city }}  <b>Delivery Charges:</b>  {{ $couriers->Delivery_charges }}</p>
                <p class="card-text"><b>Sender Adresss:</b>  {{ $couriers->Sender_address }}  <br><b>Receiver Address:</b> {{ $couriers->Receiver_address }}</p>
                <p class="card-text"><b>Date Of Order:</b>  {{ $couriers->Order_date }} </p>
                <h6 class="card-text"> Total Price:<span style="color: gold">{{ $couriers->Total_price }}</span></h6>
                <h6 class="card-text"><b>Status:</b>  <span style="color: gold">{{ $couriers->Status }}</span> </h6>
                
                <form action="update/{{$couriers->id}}" method="POST">
                  @csrf
                  <button class="btn btn-primary" type="submit">Update</button>
              </form>
                <form action="approve/{{$couriers->id}}" method="POST">
                    @csrf
                    <button class="btn btn-success" type="submit">Approve</button>
                </form>
                <form action="deny/{{$couriers->id}}" method="POST">
                  @csrf
                  <button class="btn btn-danger" type="submit">Deny</button>
              </form>
             
            </div>
      </div>
      @endforeach
        </div>
 </div>

 
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
 @endsection
 