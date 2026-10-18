@extends('AdminDashboard.adminbasiclayout');
<title>GoCourier - Manage Agents</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  .labelcolor
  {
    color: yellow;
  }
</style>
@section('content')
<br><br><br>
<div class="container">
  @if(session('agentdeletemessage'))
<center><b><h5 style="font-size: 18px;color: red">{{session('agentdeletemessage')}}</h5></b></center>
@endif
@if(session('agentupdatedmessage'))
<center><b><h5 style="font-size: 18px;color: rgb(19, 223, 19)">{{session('agentupdatedmessage')}}</h5></b></center>
@endif
@if(session('agentmessage'))
<center><p style="font-size: 18px;color: rgb(19, 223, 19)">{{session('agentmessage')}}</p></center>
@endif
<div class="row my-5">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Manage Agents</h4> 
               
                <button class="btn btn-primary" id="viewagents"  data-bs-toggle="modal" data-bs-target="#addAgentModal">Add New Agent</button>
            </div>
        </div>
    </div>
</div>
</div>
           {{-- Add Agent Modal --}}
           <div class="modal fade" id="addAgentModal" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Add Agent</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
                <div class="modal-body">
                    <form action="/addagent" method="POST">
                        @csrf
                      <div class="form-outline mb-4">
                        <label class="form-label labelcolor" for="form3Example1cg">Full Name</label>
                        <input type="text" id="form3Example1cg" class="form-control" name="name" data-name="" required/>
                      </div>
      
                      <div class="form-outline mb-4">
                        <label class="form-label labelcolor" for="form3Example3cg">Email</label>
                        <input type="email" id="form3Example3cg" class="form-control" name="email" data-email="" required/>
                      </div>
      
                      <div class="form-outline mb-4">
                        <label class="form-label labelcolor" for="form3Example4cg">Contact</label>
                        <input type="number" id="form3Example4cg" class="form-control" name="number" data-number="" required/>
                      </div>
      
                      <div class="form-outline mb-4">
                        <label class="form-label labelcolor" for="form3Example4cdg">Location</label>
                        <input type="text" class="form-control " name="location" data-location="" required/>
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label labelcolor" for="form3Example4cdg">Salary</label>
                        <input type="text" class="form-control " name="salary" data-salary="" required/>
                      </div> 

                      <div class="form-outline mb-4">
                        <label class="form-label labelcolor" for="form3Example4cdg">Password</label>
                        <input type="text" class="form-control " name="password" data-salary="" required/>
                      </div> 
                      <center><button type="submit" class="btn btn-warning" >Register</button></center>
                    </form>
                </div>
                <div class="modal-footer"> 
                  <button type="button" class="btn btn-secondary" data-bs-dismis="modal">Close</button>
                  
                </div>
                 
              </div>
            </div>
          </div>          
<br>
<div class="table-responsive container">
  <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Agent_Name</th>
          <th scope="col">Email</th>
          <th scope="col">Contact</th>
          <th scope="col">Location</th>
          <th scope="col">Salary</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
      </tr>
  </thead>
  <tbody>
      @foreach($registeredAgents as $agents)
      <tr class="">
          <td scope="row">{{ $agents->id }}</td>
          <td>{{ $agents->Agent_Name }}</td>
          <td>{{ $agents->Email }}</td>
          <td>{{ $agents->Contact }}</td>
          <td>{{ $agents->Location }}</td>
          <td>{{ $agents->Salary }}</td>
          <td>
            <form action="/upd/{{ $agents->id }}" method="POST">
              @csrf
              <button class="btn btn-primary " type="submit">Update</button>
            </form>
           </td>
         <td>
          <form action="/del/{{ $agents->id }}" method="POST">
            @csrf
            <button class="btn btn-danger btn_del" type="submit">Delete</button>
          </form>
         </td>
      </tr>
      @endforeach
          </tbody>
  </table>
</div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
  <script>
     $('.btn_del').click(function(){
            var rec = $(this).val();
            $('#del').val(rec);
            $('#deletemodal').modal('show');
    $('.btn-del').click(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url:'/delete/'+ rec,
                type:'DELETE',
                success:function(response){
                    $('#deletemodal').modal('hide');
                   
    
                }
            })
    })
            
        })
</script>
@endsection