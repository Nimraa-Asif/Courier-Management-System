@extends('AdminDashboard.adminbasiclayout');
<title>GoCourier - Admin Tracking</title>
<style>
    #input
    {
        font-size:15px
    }
</style>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-3.3.6/css/bootstrap.min.css">

<!-- Bootstrap Select Css -->
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css">
<!-- Fonts Css -->
<link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/font-elegant/elegant.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-3.3.6/css/bootstrap.min.css">

<!-- Bootstrap Select Css -->
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css">
<!-- Fonts Css -->
<link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/font-elegant/elegant.css">
<!-- OwlCarousel2 Slider Css -->
<link rel="stylesheet" type="text/css" href="assets/plugins/owl.carousel.2/assets/owl.carousel.css">

<!-- Animate Css -->
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">

<!-- Main Css -->
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
@section('content')

            <!-- Content Wrapper -->
            <article>
                <!-- Breadcrumb -->
                <section class="theme-breadcrumb pad-50">
                    <div class="theme-container container ">
                        <div class="row">
                            <div class="col-sm-8 pull-left">
                                <div class="title-wrap">
                                    <h2 class="section-title no-margin"> Courier Tracking </h2>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- /.Breadcrumb -->

                <!-- Tracking -->
                <section class="pt-20 pb-120 tracking-wrap">
                    <div class="theme-container container ">
                        <div class="row pad-10">
                            <div class="col-md-8 col-md-offset-2 tracking-form wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                <h2 class="title-1 "> Track Courier </h2> <span class="font2-light fs-12"></span>
                                <div class="row">
                                    <form action="{{ route('adminFetchTrack') }}" method="POST">
                                        @csrf
                                        <div class="col-md-7 col-sm-7">
                                            <div class="form-group">
                                                <input type="number" placeholder="Enter Tracking ID" required="" class="form-control box-shadow" id="input" name="trackid">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-5">
                                            <div class="form-group">
                                                <button type="submit" class="btn-1">Track Courier</button>
                                            </div>
                                        </div>
                                    </form>
                                    @if(session('trackmessage'))
                                    <center><b><p style="font-size: 25px;color: rgb(224, 218, 216)">{{session('trackmessage')}}</p></b></center>
                                    @endif
                                </div>
                            </div>
                        </div>
                     
                        <div class="row">
                        @foreach($SpecificCourier as $courier)
                        <div class="col-md-5 pad-30 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".30s" style="height: 70px;margin-top: 7%"> 
                            <img alt="" src="{{asset('Images/'.$courier->Product_images)}}"  />
                            </div>
                            <div class="col-md-7 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s">
                                <div class="prod-info white-clr">
                                    <ul>
                                        <li> <span class="title-2">Product ID:</span> <span class="fs-16">{{ $courier->Tracking_id }}</span> </li>
                                        <li> <span class="title-2">Sender Name:</span> <span class="fs-16">{{ $courier->Sender_name }}</span>
                                            <span class="title-2">Receiver Name:</span> <span class="fs-16">{{ $courier->Receiver_name }}</span></li>
                                        <li> <span class="title-2">Email:</span> <span class="fs-16">{{ $courier->Email}}</span> <span class="title-2">Contact:</span>
                                            <span class="fs-16">{{ $courier->Contact }}</span></li>
                                        <li> <span class="title-2">Weight (KG):</span><span class="fs-16">{{ $courier->Weight_KG }} </span>
                                            <span class="title-2">Price:</span> <span class="fs-16">{{ $courier->Price }}</span>
                                        </li>
                                        <li> <span class="title-2">Receiver City:</span> <span class="fs-16">{{ $courier->Receiver_city }}</span>
                                            <span class="title-2">Delivery Charges:</span> <span class="fs-16">{{ $courier->Delivery_charges }}</span>
                                        </li>

                                        <li> <span class="title-2">Sender Address:</span> <span class="fs-16">{{ $courier->Sender_address }}</span>
                                            <span class="title-2">Receiver Address:</span> <span class="fs-16">{{ $courier->Receiver_address }}</span>
                                        </li>
                                        <li> <span class="title-2">Date of Order:</span> <span class="fs-16">{{ $courier->Order_date }}</span>
                                        </li>
                                        <li><span class="title-2">Order Status:</span> <span class="fs-16" style="color:lightgreen">{{ $courier->Status }}</span>
                                        </li>
                                        <li> <span class="title-2">Total Cost:</span> <span class="fs-16">{{ $courier->Total_price }}</span> </li>
                                    </ul>
                                </div>
                            </div>
                      @endforeach
                        </div>
                       
                    </div>
                </section>
                <!-- /.Tracking -->

            </article>

                        {{-- <div class="row">
                            @foreach($fetchSpecificCourier as $fetch)
                            <div class="col-md-5 pad-30 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".30s" style="height: 60px;margin-top: 6%">
                                <img alt="" src="{{asset('Images/'.$fetch->Product_images)}}"  />
                            </div>
                            <div class="col-md-7 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s">
                                <div class="prod-info white-clr">
                                    <ul>
                                        <li> <span class="title-2">Product ID:</span> <span class="fs-16">{{ $fetch->Tracking_id }}</span> </li>
                                        <li> <span class="title-2">Sender Name:</span> <span class="fs-16">{{ $fetch->Sender_name }}</span>
                                            <span class="title-2">Receiver Name:</span> <span class="fs-16">{{ $fetch->Receiver_name }}</span></li>
                                        <li> <span class="title-2">Email:</span> <span class="fs-16">{{ $fetch->Email }}</span> <span class="title-2">Contact:</span>
                                            <span class="fs-16">{{ $fetch->Contact }}</span></li>
                                        <li> <span class="title-2">Weight (KG):</span> <span class="fs-16">{{ $fetch->Weight_KG }}</span>
                                            <span class="title-2">Price:</span> <span class="fs-16">{{ $fetch->Price }}</span>
                                        </li>
                                        <li> <span class="title-2">Receiver City:</span> <span class="fs-16">{{ $fetch->Receiver_city }}</span>
                                            <span class="title-2">Delivery Charges:</span> <span class="fs-16">{{ $fetch->Delivery_charges }}</span>
                                        </li>

                                        <li> <span class="title-2">Sender Address:</span> <span class="fs-16">{{ $fetch->Sender_address }}</span>
                                            <span class="title-2">Receiver Address:</span> <span class="fs-16">{{ $fetch->Receiver_address }}</span>
                                        </li>
                                        <li> <span class="title-2">Date of Order:</span> <span class="fs-16">{{ $fetch->Order_date }}</span>
                                        </li>
                                        <li><span class="title-2">Order Status:</span> <span class="fs-16 theme-clr">{{ $fetch->Status }}</span>
                                        </li>
                                        <li> <span class="title-2">Total Cost:</span> <span class="fs-16">{{ $fetch->Total_price }}</span> </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div> --}}
@endsection
