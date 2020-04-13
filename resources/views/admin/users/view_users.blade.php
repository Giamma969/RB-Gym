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
        <div class="alert alert-success alert-block">
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
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>View users</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Username</th>
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
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Users active -->
                                @foreach($usersDetails as $user)
                                    <tr class="gradeX">
                                        <td class="center">{{$user->id}}</td>
                                        <td class="center">{{$user->name}}</td>
                                        <td class="center">{{$user->surname}}</td>
                                        <td class="center">{{$user->username}}</td>
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
                                    </tr>
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