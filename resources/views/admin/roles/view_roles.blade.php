@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Utenti</a> <a href="#" class="current">Visualizza utenti</a> </div>
    <h1>Gruppi</h1>
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
            <h5>Visualizza gruppi</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID gruppo</th>
                  <th>Nome gruppo</th>
                  <th>Supervisore</th>
                  <th>Azioni</th>
                </tr>
              </thead>
              <tbody>
              @foreach($roles as $role)
                <tr class="gradeX">
                  <td>{{$role->id}}</td>
                  <td>{{$role->name}}</td>
                  <td>{{$role->guard_name}}</td> 
                  <td class="center">
                    <a href="{{ url('/admin/edit-role/'.$role->id)  }} " class="btn btn-primary btn-mini" title="Modifica">Modifica</a>
                    <a rel="{{ $role->id }}" rel1="delete-role"   <?php /*href="{{ url('/admin/delete-user/'.$user->id)  }} "  */?> href="javascript:"  class="btn btn-danger btn-mini deleteRecord" title="Elimina">Elimina</a>
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