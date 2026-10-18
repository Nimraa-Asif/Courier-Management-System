@extends('AdminDashboard.adminbasiclayout')
<title>GoCourier - Additional Details</title>
@section('content')

{{-- <div class="container"> --}}
    {{-- <div class="row">
        @foreach($fetchCouriers as $info)
        <div class="col-md-5 pad-30 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".30s" style="height: 60px;margin-top: 4%">
            <img alt="" src="{{ $info->Product_images }}" />
        </div>
        <div class="col-md-7 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s">
            <div class="prod-info white-clr">
                <ul>
                    <li> <span class="title-2">Product ID:</span> <span class="fs-16">{{ $info->Tracking_id }}</span> </li>
                    <li> <span class="title-2">Sender Name:</span> <span class="fs-16">{{ $info->Sender_name }}</span>
                        <span class="title-2">Receiver Name:</span> <span class="fs-16">{{ $info->Receiver_name }}</span></li>
                    <li> <span class="title-2">Email:</span> <span class="fs-16">{{ $info->Email}}</span> <span class="title-2">Contact:</span>
                        <span class="fs-16">{{ $info->Contact }}</span></li>
                    <li> <span class="title-2">Weight (KG):</span>{{ $info->Weight_KG }} <span class="fs-16"></span>
                        <span class="title-2">Price:</span> <span class="fs-16">{{ $info->Price }}</span>
                    </li>
                    <li> <span class="title-2">Receiver City:</span> <span class="fs-16">{{ $info->Receiver_city }}</span>
                        <span class="title-2">Delivery Charges:</span> <span class="fs-16">{{ $info->Delivery_charges }}</span>
                    </li>

                    <li> <span class="title-2">Sender Address:</span> <span class="fs-16">{{ $info->Sender_address }}</span>
                        <span class="title-2">Receiver Address:</span> <span class="fs-16">{{ $info->Receiver_address }}</span>
                    </li>
                    <li> <span class="title-2">Date of Order:</span> <span class="fs-16">{{ $info->Order_date }}</span>
                    </li>
                    <li><span class="title-2">Order Status:</span> <span class="fs-16" style="color:lightgreen">{{ $info->Status }}</span>
                    </li>
                    <li> <span class="title-2">Total Cost:</span> <span class="fs-16">{{ $info->Total_price }}</span> </li>
                </ul>
            </div>
        </div>
  @endforeach --}}
    {{-- </div> --}}
        <div class="card" style="width: 22rem">
            @foreach($fetchinfoCouriers as $courierinfos)
            {{-- <img class="card-img-top" src="{{asset('Images/'.$courierinfos->Product_images)}}" alt="Title" /> --}}
            <div class="card-body">
                <p class="card-title">{{ $courierinfos->id }}</p>
                <h5 class="card-text">{{ $courierinfos->Tracking_id }}</h5>
                <p class="card-text">{{ $courierinfos->Sender_name }}</p>
                <p class="card-text">{{ $courierinfos->Receiver_name }}</p>
                <p class="card-text">{{ $courierinfos->Email }}</p>
                <p class="card-text">{{ $courierinfos->Contact }}</p>
                <p class="card-text">{{ $courierinfos->Weight }}</p>
                <p class="card-text">{{ $courierinfos->Price }}</p>
                <p class="card-text">{{ $courierinfos->Receiver_city }}</p>
                <p class="card-text">{{ $courierinfos->Delivery_charges }}</p>
                <p class="card-text">{{ $courierinfos->Sender_address }}</p>
                <p class="card-text">{{ $courierinfos->Receiver_address }}</p>
                <p class="card-text">{{ $courierinfos->Order_date }}</p>
                <p class="card-text">{{ $courierinfos->Total_price }}</p>
                <p class="card-text">{{ $courierinfos->Status }}</p>
            </div>
      </div>
      @endforeach
        </div>
 </div>
@endsection
