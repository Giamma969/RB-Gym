@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Utenti-Gruppi</a> <a href="#" class="current">Visualizza Utenti-Gruppi</a> </div>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Visualizza Utenti-Gruppi</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID gruppo</th>
                  <th>Model type</th>
                  <th>ID utente</th>
                  <th>Azioni</th>
                </tr>
              </thead>
              <tbody>
              @foreach($modelhasroles as $val)
                <tr class="gradeX">
                  <td>{{$val->role_id}}</td>
                  <td>{{$val->model_type}}</td>
                  <td>{{$val->model_id}}</td>
                  <td class="center">
                   
                    <a href="{{ url('/admin/edit-model-has-roles/'.$val->role_id.'/'.$val->model_id)  }} " class="btn btn-primary btn-mini" title="Modifica">Modifica</a>
                    <a rel="{{ $val->id }}" rel1="delete-model-has-roles"  href="javascript:"  class="btn btn-danger btn-mini deleteRecord" title="Elimina">Elimina</a>
                  </td> 
                </tr>
                
                <!-- .$val->model_type.$val->model_id -->

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