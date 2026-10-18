@extends('AdminDashboard.adminbasiclayout');
<title>GoCourier - Add Courier</title>
<style>
    .title-2
    {
        font-size: 15px;
    }
    input {
  padding: 12px 20px;
  border: 1px solid #7e7e7c!important;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=text]:focus {
  border: 3px solid #555!important;
}

</style>
@section('content')
<br><br><br>
<section class="calculate pt-100">
    <div class=" container">
        @if(session('couriermessage'))
        <center><h3 style="font-size: 18px;color: rgb(146, 226, 26)">{{session('couriermessage')}}</h3></center>
        @endif
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="assets/img/block/Courier-Man.png" alt="" class="wow slideInLeft" data-wow-offset="50" data-wow-delay=".20s" style="padding-right: 6%" />
            </div>
            <div class="col-md-8">
                <div class="pad-100" style="margin-left: 2px">
                <h2 class="section-title pb-10 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" >Courier Details </h2>
                <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">Calculate cost according to Courier Weight
                   </p>
               <form action="/admin-ins-courier" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="calculate-form">
                    <form class="row">
                        <div class="form-group wow fadeInUp"  >
                            <div class="col-sm-3"> <label class="title-2">Sender Name:</label></div>
                            <div class="col-sm-9"> <input data-bind="in:value, f: float" data-name="height" type="text" required="" placeholder="Enter Full Name" class="form-control input" name="s_name"> </div>
                        </div>
                        <div class="form-group wow fadeInUp">
                            <div class="col-sm-3"> <label class="title-2">Receiver Name:</label></div>
                            <div class="col-sm-9"> <input data-bind="in:value, f: float" data-name="height" type="text" required="" placeholder="Enter Full Name" class="form-control" name="r_name"> </div>
                        </div>
                        <div class="form-group wow fadeInUp">
                            <div class="col-sm-3"> <label class="title-2">Email:</label></div>
                            <div class="col-sm-9"> <input data-bind="in:value, f: float" data-name="height" type="email" required="" placeholder="abc@gmail.com" class="form-control" name="email"> </div>
                        </div>
                          <div class="form-group wow fadeInUp">
                            <div class="col-sm-3"> <label class="title-2"> Contact No:</label></div>
                            <div class="col-sm-9"> <input data-bind="in:value, f: float" data-name="height" type="number" required="" placeholder="Contact" class="form-control" name="contact"> </div>
                        </div>
                          <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3"> <label class="title-2"> Product Image</label></div>
                            <div class="col-sm-9"> <input data-bind="in:value, f: float" data-name="height" type="file" required="" class="form-control" name="image"> </div>
                          </div>

                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3"> <label class="title-2"> Courier Weight:</label></div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="selectpicker form-control" data-width="100%" name="weight" id="weightlist" required
                                          >
                                          <option value="" selected disabled>Select Courier Weight</option>
                                          <option value="2">2 KG</option>
                                          <option value="5">5 KG</option>
                                        <option value="7">7 KG</option>
                                        <option value="10">10 KG</option>
                                        <option value="12">12 KG</option>
                                        <option value="15">15 KG</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3"> <label class="title-2">Courier Price:</label></div>
                            <div class="col-sm-9"> <input id="priceinp" type="number" class="form-control" name="price" style="background: transparent"> </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3"> <label class="title-2"> City:</label></div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="selectpicker form-control" data-width="100%" name="city" id="city" required
                                          >
                                          <option value="" selected disabled>Select Receiver City</option>
                                          <option value="Multan">Multan</option>
                                          <option value="Karachi">Karachi</option>
                                          <option value="Lahore">Lahore</option>
                                          <option value="Islamabad">Islamabad</option>
                                          <option value="Faislabad">Faislabad</option>
                                          <option value="Hyderabad">Hyderabad</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3"> <label class="title-2">Delivery Charges:</label></div>
                            <div class="col-sm-9"> <input id="delivery" type="number"  class="form-control" name="delivery" style="background: transparent"> </div>
                        </div>


                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3"> <label class="title-2">Destination: </label></div>
                            <div class="col-sm-9">
                                <div class="col-sm-12 no-pad d-flex">
                                    <input type="text" placeholder="From" class="form-control from fw-600 w-90" name="s_address" required>
                                    <input type="text" placeholder="To" class="form-control to fw-600 w-90" name="r_address" required>

                                </div>
                                <div class="col-sm-6 no-pad">
                                </div>
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3"> <label class="title-2">Date of Order:</label></div>
                            <div class="col-sm-9"> <input type="date"class="form-control " name="date" required > </div>
                        </div>

                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-9 col-xs-12 pull-right">
                                <div > <span style="color: #f5ab35;font-size: 20px"> Total Cost: </span>
                                    <span data-bind="out:price, f:currency" data-name="cost" >
                                        <input id="total_price" type="text"  class="form-control" name="total" style="background: transparent">
                                    </span>
                                </div><br>
                                <center><button class="btn btn-warning" type="submit" onclick="showCourierModal()">Confirm Courier</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
                <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
                <script>
                    function updateTotalCost()
                    {
                        var weightValue = $('#weightlist').val();
                        var cityValue = $('#city').val();

                        var weightBill =  weightValue * 90;
                        var billWithTax = weightBill * 0.2;
                        var weightTotal = weightBill + billWithTax;

                        var deliveryCharges = 0;

     switch (cityValue)
        {
            case 'Karachi':
            deliveryCharges = 90;
          break;
          case 'Multan':
            deliveryCharges = 500;
          break;
          case 'Islamabad':
            deliveryCharges = 300;
          break;
          case 'Hyderabad':
            deliveryCharges = 150;
          break;
          case 'Lahore':
            deliveryCharges = 300;
          break;
          case 'Faislabad':
            deliveryCharges = 600;
          break;
        }

    var totalCost = weightTotal + deliveryCharges;
    $('#priceinp').val(weightTotal);
    $('#delivery').val(deliveryCharges);
    $('#total_price').val(totalCost + '' + 'PKR' );
     }
     $('#weightlist').change(updateTotalCost);
     $('#city').change(updateTotalCost);
                </script>
@endsection
