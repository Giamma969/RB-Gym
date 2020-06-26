@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">CMS</a> <a href="#" class="current">Edit CMS</a> </div>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit CMS</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('/admin/edit-cms/'.$cmsDetails->id)}}" name="edit_cms" id="edit_cms" novalidate="novalidate"> {{csrf_field()}}
              
              <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                  <input type="text" name="address" id="address" value="{{$cmsDetails->address}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="text" name="email" id="email" value="{{$cmsDetails->email}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Phone</label>
                <div class="controls">
                  <input type="text" name="phone" id="phone" value="{{$cmsDetails->phone}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Logo</label>
                <div class="controls">
                  <input type="file" name="logo" id="logo">
                  <input type="hidden" name="current_logo" value=" {{ $cmsDetails->logo }}">
                  @if(!empty($cmsDetails->logo))
                    <img style="width:40px;" src="{{asset ('/images/frontend_images/logo/'.$cmsDetails->logo) }}"> 
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Facebook</label>
                <div class="controls">
                  <input type="text" name="facebook" id="facebook" value="{{$cmsDetails->facebook}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Twitter</label>
                <div class="controls">
                  <input type="text" name="twitter" id="twitter" value="{{$cmsDetails->twitter}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Instagram</label>
                <div class="controls">
                  <input type="text" name="instagram" id="instagram" value="{{$cmsDetails->instagram}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Title first section Privacy</label>
                <div class="controls">
                  <input type="text" name="title_first_section_privacy" id="title_first_section_privacy" value="{{$cmsDetails->title_first_section_privacy}}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">First section Privacy</label>
                <div class="controls">
                  <textarea name="first_section_privacy" id="first_section_privacy">{{$cmsDetails->first_section_privacy}}</textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Title second section Privacy</label>
                <div class="controls">
                  <input type="text" name="title_second_section_privacy" id="title_second_section_privacy" value="{{$cmsDetails->title_second_section_privacy}}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Second section Privacy</label>
                <div class="controls">
                  <textarea name="second_section_privacy" id="second_section_privacy">{{$cmsDetails->second_section_privacy}}</textarea>
                </div>
              </div>

               <div class="control-group">
                <label class="control-label">Title third section Privacy</label>
                <div class="controls">
                  <input type="text" name="title_third_section_privacy" id="title_third_section_privacy" value="{{$cmsDetails->title_third_section_privacy}}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Third section Privacy</label>
                <div class="controls">
                  <textarea name="third_section_privacy" id="third_section_privacy">{{$cmsDetails->third_section_privacy}}</textarea>
                </div>
              </div>



            <div class="control-group">
                <label class="control-label">Title first section About Us</label>
                <div class="controls">
                  <input type="text" name="title_first_section_about_us" id="title_first_section_about_us" value="{{$cmsDetails->title_first_section_about_us}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">First section About Us</label>
                <div class="controls">
                  <textarea name="first_section_about_us" id="first_section_about_us">{{$cmsDetails->first_section_about_us}}</textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Title second section About Us</label>
                <div class="controls">
                  <input type="text" name="title_second_section_about_us" id="title_second_section_about_us" value="{{$cmsDetails->title_second_section_about_us}}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Second section About Us</label>
                <div class="controls">
                  <textarea name="second_section_about_us" id="second_section_about_us">{{$cmsDetails->second_section_about_us}}</textarea>
                </div>
              </div>

               <div class="control-group">
                <label class="control-label">Title third section About Us</label>
                <div class="controls">
                  <input type="text" name="title_third_section_about_us" id="title_third_section_about_us" value="{{$cmsDetails->title_third_section_about_us}}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Third section About Us</label>
                <div class="controls">
                  <textarea name="third_section_about_us" id="third_section_about_us">{{$cmsDetails->third_section_about_us}}</textarea>
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Edit CMS" class="btn btn-success">
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