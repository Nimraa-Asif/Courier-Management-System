@extends('AdminDashboard.adminbasiclayout');
<title>GoCourier - Add Agent</title>
@section('content')
<!doctype html>
<html lang="en">
    <head>
        <title>GoCourier - Add Agent</title>
        <style>
          .labelcolor
          {
            color: gold;
          }
        </style>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
       
    </head>

    <body>
       
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
          <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                  <div class="card-body p-5">
                    @if(session('agentmessage'))
                    <center><b><p style="font-size: 18px;color: darkseagreen">{{session('agentmessage')}}</p></b></center>
                    @endif
                    <form action="/addagent" method="POST" id="AgentForm">
                        @csrf
                      <div class="form-outline mb-4 mt-5">
                        <label class="form-label labelcolor" for="form3Example1cg">Agent Full Name</label>
                        <input type="text" id="form3Example1cg" class="form-control" name="name" data-name />
                      </div>
      
                      <div class="form-outline mb-4">
                        <label class="form-label labelcolor" for="form3Example3cg">Email</label>
                        <input type="email" id="form3Example3cg" class="form-control" name="email"data-email />
                      </div>
      
                      <div class="form-outline mb-4">
                        <label class="form-label labelcolor" for="form3Example4cg">Contact</label>
                        <input type="number" id="form3Example4cg" class="form-control" name="number" data-number />
                      </div>
      
                      <div class="form-outline mb-4">
                        <label class="form-label labelcolor" for="form3Example4cdg">Location</label>
                        <input type="text" id="form3Example4cdg" class="form-control " name="location" data-location />
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label labelcolor" for="form3Example4cdg">Salary</label>
                        <input type="text" id="form3Example4cdg" class="form-control " name="salary" data-salary />
                      </div> 

                      <div class="form-outline mb-4">
                        <label class="form-label labelcolor" for="form3Example4cdg" >Password</label>
                        <input type="password" id="form3Example4cdg" class="form-control " name="password" data-password />
                      </div> 

                      <div class="d-flex justify-content-center">
                        <button type="submit"
                          class="btn btn-warning gradient-custom-4 text-body btn-reg" style="border-radius: 20px">Register</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
              </section>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </body>
</html>
<script>
  $('.btn-reg').click(function (){
     var name = $(this).attr('data-name');
     var email = $(this).attr('data-email');
     var number = $(this).attr('data-number');
     var location = $(this).attr('data-location');
     var salary = $(this).attr('data-salary');
     var password = $(this).attr('data-password');
     $.ajax({
      url:"/addagent",
      type:"POST",
      data:{
         name:name,
         email:email,
         number:number,
         location:location,
         salary:salary,
         password:password,
          " _token":"{{ csrf_token() }}"

      },
      success:function()
      {
        alert("Success");
      }
     })

  })

</script>



@endsection