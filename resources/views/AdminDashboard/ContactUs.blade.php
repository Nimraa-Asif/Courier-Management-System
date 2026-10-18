@extends('AdminDashboard.adminbasiclayout');
<title>GoCourier - Admin User Contact</title>
@section('content')
<br><br><br>
<div class="container">
  <center>  <h3>User Contact Details:</h3></center>

    <div
        class="table-responsive"
    >
        <table
            class="table table-striped"
        >
            <thead>
                <tr>
                    <th scope="col" style="color: gold">ID</th>
                    <th scope="col" style="color: gold">User Name</th>
                    <th scope="col" style="color: gold">Email</th>
                    <th scope="col" style="color: gold">Contact</th>
                    <th scope="col" style="color: gold">Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contactDetails as $contact)
                <tr class="">
                    <td scope="row">{{ $contact->id }}</td>
                    <td scope="row">{{ $contact->User_Name }}</td>
                    <td scope="row">{{ $contact->Email }}</td>
                    <td scope="row">{{ $contact->Contact }}</td>
                    <td scope="row">{{ $contact->Message }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@endsection