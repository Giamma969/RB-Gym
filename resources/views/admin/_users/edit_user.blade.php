@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Users</a> <a href="#" class="current">Edit user</a> </div>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit users</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/admin/edit-user/'.$userDetails->id)}}" name="edit_user" id="edit_user" > {{csrf_field()}}

            <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input value="{{ $userDetails->name }}" type="text" name="name" min="0" id="name" required>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Surname</label>
                <div class="controls">
                  <input value="{{ $userDetails->surname }}"type="text" name="surname" min="0" id="surname" required>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                  <input value="{{ $userDetails->username }}"type="text" name="username" id="username" minlength="5" required>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input value="{{ $userDetails->email }}" type="text" name="email" id="email" minlength="5" required>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input value="{{ $userDetails->password }}" type="password" name="password" id="password" minlength="5" required>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Active</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1" @if($userDetails->status == "1") checked @endif>
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Edit user" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">

  </div>
</div>


@endsection