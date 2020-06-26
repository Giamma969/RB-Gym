@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">CMS</a> <a href="#" class="current">View CMS</a> </div>
    <h1>CMS</h1>
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
            <h5>View CMS</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>CMS ID</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Logo</th>
                  <th>Creation date</th>
                  
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($cms as $cms)
                <tr class="gradeX">
                  <td>{{$cms->id}}</td>
                  <td>{{$cms->address}}</td>
                  <td>{{$cms->email}}</td>
                  <td>{{$cms->phone}}</td>
                  <td><img src="{{asset('images/frontend_images/logo/'.$cms->logo)}}" alt="" width="50px;">
                  <td>{{$cms->created_at}}</td>
                  
                  <td style="max-width:40px;" class="center">
                    <a style="width:80%;"  href="#myModal{{$cms->id}}" data-toggle="modal" class="btn btn-success btn-mini" title="View">View details</a>
                    <a style="width:80%;" href="{{ url('/admin/edit-cms/'.$cms->id)  }} " class="btn btn-primary btn-mini" title="Edit">Edit</a>
                    <a style="width:80%;"rel="{{ $cms->id }}" rel1="delete-cms" href="javascript:"  class="btn btn-danger btn-mini deleteRecord" title="Delete">Delete</a>
                  </td> 
                </tr>
                <div id="myModal{{$cms->id}}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><b>CMS #{{$cms->id}}</b></h3>
                  </div>
                  <div class="modal-body">
                    <p><b>CMS ID: </b> {{$cms->id}}</p>

                    <p><b>Address: </b> {{$cms->address}}</p>
                    <p><b>Email: </b> {{$cms->email}}</p>
                    <p><b>Phone: </b> {{$cms->phone}}</p>
                    <p><b>Logo: </b> {{$cms->logo}}</p>
                    <p><b>Facebook: </b> {{$cms->facebook}}</p>
                    <p><b>Instagram: </b> {{$cms->instagram}}</p>
                    <p><b>Twitter: </b> {{$cms->twitter}}</p>

                    <p><b>Title first section Privacy: </b> {{$cms->title_first_section_privacy}}</p>
                    <p><b>First section Privacy: </b> {{$cms->first_section_privacy}}</p>
                    <p><b>Title second section Privacy: </b> {{$cms->title_second_section_privacy}}</p>
                    <p><b>Second section Privacy: </b> {{$cms->second_section_privacy}}</p>
                    <p><b>Title third section Privacy: </b> {{$cms->title_third_section_privacy}}</p>
                    <p><b>Third section Privacy: </b> {{$cms->third_section_privacy}}</p>

                    <p><b>Title first section About us: </b> {{$cms->title_first_section_about_us}}</p>
                    <p><b>First section About us: </b> {{$cms->first_section_about_us}}</p>
                    <p><b>Title second section About us: </b> {{$cms->title_second_section_about_us}}</p>
                    <p><b>Second section About us: </b> {{$cms->second_section_about_us}}</p>
                    <p><b>Title third section About us: </b> {{$cms->title_third_section_about_us}}</p>
                    <p><b>Third section About us: </b> {{$cms->third_section_about_us}}</p>
                    
                    <p><b>Creation date: </b> {{$cms->created_at}}</p>
                    <p><b>Modification date: </b> {{$cms->updated_at}}</p>
                    
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
