@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Users</a> <a href="#" class="current">View users</a> </div>
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
                  <th>User ID</th>
                  <th>Name</th>
                  <th>Surname</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Email verified at</th>
                  <th>Password</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
                <tr class="gradeX">
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->surname}}</td>
                  <td>{{$user->username}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->email_verified_at}}</td>
                  <td>{{$user->password}}</td>
                  <?php if($user->status == 0) echo '<td>Inactive</td>'?> 
                  <?php if($user->status == 1) echo '<td>Active</td>'?>
                  <td class="center">
                    <a href="{{ url('/admin/edit-user/'.$user->id)  }} " class="btn btn-primary btn-mini" title="Edit">Edit</a>
                    <a rel="{{ $user->id }}" rel1="delete-user"   <?php /*href="{{ url('/admin/delete-user/'.$user->id)  }} "  */?> href="javascript:"  class="btn btn-danger btn-mini deleteRecord" title="Delete">Delete</a>
                  </td> 
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