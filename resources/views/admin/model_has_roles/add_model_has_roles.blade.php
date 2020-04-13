@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Utenti-Gruppi</a> <a href="#" class="current">Assegna gruppo</a> </div>
    <h1>Utenti-Gruppi</h1>
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
            <h5>Assegna gruppo</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/admin/add-model-has-roles')}}" name="add_model-has-roles" id="add_model-has-roles" > {{csrf_field()}}


            <div class="control-group">
                <label class="control-label">Utente</label>
                <div class="controls">
                  <select name="username" style="width: 220px;">
                    <option value="0">  </option>
                    @foreach($users as $user)
                      <option value="{{ $user->username }}"> {{ $user->username }} </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Gruppo</label>
                <div class="controls">
                  <select name="role_name" style="width: 220px;">
                    <option value="0">  </option>
                    @foreach($roles as $role)
                      <option value="{{ $role->name }}"> {{ $role->name }} </option>
                    @endforeach
                  </select>
                </div>
              </div>

              

              <div class="form-actions">
                <input type="submit" value="Assegna gruppo" class="btn btn-success">
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