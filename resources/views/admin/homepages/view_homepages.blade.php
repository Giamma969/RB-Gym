@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Homepages</a> <a href="#" class="current">View homepages</a> </div>
    <h1>Homepages</h1>
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
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View homepages</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Homepage ID</th>
                  <th>First grid</th>
                  <th>Second grid</th>
                  <th>Third grid</th>
                  <th>First slider</th>
                  <th>Second slider</th>
                  <th>Operations</th>
                </tr>
              </thead>
              <tbody>
              @foreach($homepages as $homepage)
                <tr class="gradeX">
                  <td>{{$homepage->id}}</td>
                  <td>{{$homepage->first_grid}}</td>
                  <td>{{$homepage->second_grid}}</td>
                  <td>{{$homepage->third_grid}}</td>
                  <td>{{$homepage->first_slider}}</td>
                  <td>{{$homepage->second_slider}}</td>
                  <td style="max-width:50px" class="center">
                    <a style="width:80%;"  href="#myModal{{$homepage->id}}" data-toggle="modal" class="btn btn-success btn-mini" title="View">View</a>
                    <a style="width:80%;" float="clear" href="{{ url('/admin/customize-homepage/'.$homepage->id)  }} " class="btn btn-primary btn-mini" title="Customize">Customize</a>
                  </td> 
                </tr>
                <div id="myModal{{$homepage->id}}" class="modal hide">
                <div class="modal-header">
                  <button data-dismiss="modal" class="close" type="button">×</button>
                  <h3><b>Homepage #{{$homepage->id}}</b></h3>
                </div>
                <div class="modal-body">
                  <p><b>Homepage ID: </b> {{$homepage->id}}</p>
                  <p><b>First grid: </b> {{$homepage->first_grid}}</p>
                  <p><b>Second grid: </b> {{$homepage->second_grid}}</p>
                  <p><b>Third grid: </b> {{$homepage->third_grid}}</p>
                  <p><b>First slider: </b> {{$homepage->first_slider}}</p>
                  <p><b>Second slider: </b> {{$homepage->second_slider}}</p>
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