@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#">Users</a>
            <a href="#" class="current">View users</a> 
        </div>

        <h1>Users</h1>
        @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {!! session ('flash_message_error') !!}</strong>
        </div>
        @endif
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong> {!! session ('flash_message_success') !!}</strong>
        </div>
        @endif
    </div>

    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-user"></i></span>
                        <h5>View users</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>Province</th>
                                    <th>City</th>
                                    <th>Pin code</th>
                                    <th>Mobile</th>
                                    <th>Account status</th>
                                    <th>Registration date</th>
                                    <th>Account activation date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Users active -->
                                @foreach($usersDetails as $user)
                                    <tr class="gradeX">
                                        <td class="center">{{$user->id}}</td>
                                        <td class="center">{{$user->name}}</td>
                                        <td class="center">{{$user->surname}}</td>
                                        <td class="center">{{$user->email}}</td>
                                        <td class="center">{{$user->address}}</td>
                                        <td class="center">{{$user->country}}</td>
                                        <td class="center">{{$user->province}}</td>
                                        <td class="center">{{$user->city}}</td>
                                        <td class="center">{{$user->pincode}}</td>
                                        <td class="center">{{$user->mobile}}</td>
                                        <td class="center">
                                            @if($user->status == 0)
                                                <span style="color:red">Inactive</span>
                                            @else 
                                                <span style="color:green">Active</span>
                                            @endif
                                        </td>
                                        <td class="center">{{$user->created_at}}</td>
                                        <td class="center">{{$user->email_verified_at}}</td>
                                        <td style="max-width:40px;" class="center">
                                            <a style="width:80%;"  href="#myModal{{$user->id}}" data-toggle="modal" class="btn btn-success btn-mini" title="View">View</a>
                                            <a style="width:80%;" href="{{ url('/admin/edit-user-status/'.$user->id)  }} " class="btn btn-primary btn-mini" title="Edit">Edit status</a>
                                        </td> 
                                    </tr>
                                    <div id="myModal{{$user->id}}" class="modal hide">
                                        <div class="modal-header">
                                            <button data-dismiss="modal" class="close" type="button">×</button>
                                            <h3><b>{{$user->email}}</b></h3>
                                        </div>
                                        <div class="modal-body">
                                            <p><b>User ID: </b> {{$user->id}}</p>
                                            <p><b>Name: </b> {{$user->name}}</p>
                                            <p><b>Surname: </b> {{$user->surname}}</p>
                                            <p><b>Address: </b> {{$user->address}}</p>
                                            <p><b>Country: </b> {{$user->country}}</p>
                                            <p><b>Province: </b> {{$user->province}}</p>
                                            <p><b>City: </b> {{$user->city}}</p>
                                            <p><b>Pincode: </b> {{$user->pincode}}</p>
                                            <p><b>Mobile: </b> {{$user->mobile}}</p>
                                            <p><b>Status: </b> 
                                            @if($user->status == 0)
                                                Inactive
                                            @else 
                                                Active
                                            @endif
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection