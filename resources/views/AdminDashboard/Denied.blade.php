@extends('AdminDashboard.adminbasiclayout')
<title>GoCourier - Denied Couriers</title>
@section('content')
<br><br><br>

 <div class="container">
    @if(session('deniedApproveMessage'))
    <center><h3 style="font-size: 18px;color:rgb(14, 224, 49)">{{session('deniedApproveMessage')}}</h3></center>
    @endif
    @if(session('deniedDeleteMessage'))
    <center><h3 style="font-size: 18px;color:rgb(14, 224, 49)">{{session('deniedDeleteMessage')}}</h3></center>
    @endif
    <div class="row">
        @foreach($denyCourier as $denied)
        <div class="card" style="width: 25rem">
            <img class="card-img-top" src="{{asset('Images/'.$denied->Product_images)}}" alt="Title" style="height: 300px" />
            <div class="card-body">
                <p class="card-title"><b>ID:</b>  {{ $denied->id }}</p>
                <p class="card-text"><b>Tracking ID:</b>  {{ $denied->Tracking_id }}</p>
                <p class="card-text"><b>Sender:</b>  {{ $denied->Sender_name }}    <b>Receiver:  </b>{{ $denied->Receiver_name }}</p>
                <p class="card-text"><b>Email:</b>  {{ $denied->Email }}   <b>Contact:</b>  {{ $denied->Contact }}</p>
                <p class="card-text"><b>Weight:</b>  {{ $denied->Weight_KG }} KG <b>Price:</b>   {{ $denied->Price }}</p>
                <p class="card-text"><b>Receiver City:</b>  {{ $denied->Receiver_city }}  <b>Delivery Charges:</b>  {{ $denied->Delivery_charges }}</p>
                <p class="card-text"><b>Sender Adresss:</b>  {{ $denied->Sender_address }}  <b>Receiver Address:</b> {{ $denied->Receiver_address }}</p>
                <p class="card-text"><b>Date Of Order:</b>  {{ $denied->Order_date }} </p>
                <h6 class="card-text"> Total Price:  <span style="color: yellow">{{ $denied->Total_price }}</span>  </h6>
                <h6 class="card-text">  Status:  <b><span class="text-danger">{{ $denied->Status }}</span></b></h6>

                <form action="denied-approved/{{$denied->id}}" method="POST">
                    @csrf
                    <button class="btn btn-success" type="submit">Approve</button>
                    </form>
                    <form action="denied-delete/{{$denied->id}}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
            </div>
      </div>
      @endforeach
        </div>
 </div>
 @endsection
 