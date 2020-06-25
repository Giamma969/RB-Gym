@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Homepages</a> <a href="#" class="current">Customize homepage</a> </div>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Customize homepage</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('/admin/customize-homepage/'.$homepageDetails->id)}}" name="customize_homepage" id="customize_homepage" novalidate="novalidate"> {{csrf_field()}}
              
              <div class="control-group">
                <label class="control-label">First grid</label>
                <div class="controls">
                  <select name="first_grid">
                    <option value="0">Select a category</option>
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}" @if($category->id == $homepageDetails->first_grid) selected @endif> {{ $category->name }} </option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">First grid image</label>
                <div class="controls">
                  <input type="file" name="first_grid_image" id="first_grid_image">
                  <input type="hidden" name="current_first_grid_image" value=" {{ $homepageDetails->first_grid_image }}">
                  @if(!empty($homepageDetails->first_grid_image))
                    <img style="width:40px;" src="{{asset ('/images/backend_images/homepages/'.$homepageDetails->first_grid_image) }}"> 
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Second grid</label>
                <div class="controls">
                  <select name="second_grid">
                    <option value="0">Select a category</option>
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}" @if($category->id == $homepageDetails->second_grid) selected @endif> {{ $category->name }} </option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Second grid image</label>
                <div class="controls">
                  <input type="file" name="second_grid_image" id="second_grid_image">
                  <input type="hidden" name="current_second_grid_image" value=" {{ $homepageDetails->second_grid_image }}">
                  @if(!empty($homepageDetails->second_grid_image))
                    <img style="width:40px;" src="{{asset ('/images/backend_images/homepages/'.$homepageDetails->second_grid_image) }}"> 
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Third grid</label>
                <div class="controls">
                  <select name="third_grid">
                    <option value="0">Select a category</option>
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}" @if($category->id == $homepageDetails->third_grid) selected @endif> {{ $category->name }} </option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Third grid image</label>
                <div class="controls">
                  <input type="file" name="third_grid_image" id="third_grid_image">
                  <input type="hidden" name="current_third_grid_image" value=" {{ $homepageDetails->third_grid_image }}">
                  @if(!empty($homepageDetails->third_grid_image))
                    <img style="width:40px;" src="{{asset ('/images/backend_images/homepages/'.$homepageDetails->third_grid_image) }}"> 
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">First slider</label>
                <div class="controls">
                  <select name="first_slider">
                    <option value="0">Select a category</option>
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}" @if($category->id == $homepageDetails->first_slider) selected @endif> {{ $category->name }} </option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">First slider image</label>
                <div class="controls">
                  <input type="file" name="first_slider_image" id="first_slider_image">
                  <input type="hidden" name="current_first_slider_image" value=" {{ $homepageDetails->first_slider_image }}">
                  @if(!empty($homepageDetails->first_slider_image))
                    <img style="width:40px;" src="{{asset ('/images/backend_images/homepages/'.$homepageDetails->first_slider_image) }}"> 
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Second slider</label>
                <div class="controls">
                  <select name="second_slider">
                    <option value="0">Select a category</option>
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}" @if($category->id == $homepageDetails->second_slider) selected @endif> {{ $category->name }} </option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Second slider image</label>
                <div class="controls">
                  <input type="file" name="second_slider_image" id="second_slider_image">
                  <input type="hidden" name="current_second_slider_image" value=" {{ $homepageDetails->second_slider_image }}">
                  @if(!empty($homepageDetails->second_slider_image))
                    <img style="width:40px;" src="{{asset ('/images/backend_images/homepages/'.$homepageDetails->second_slider_image) }}"> 
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Middle image</label>
                <div class="controls">
                  <input type="file" name="middle_image" id="middle_image">
                  <input type="hidden" name="current_middle_image" value=" {{ $homepageDetails->middle_image }}">
                  @if(!empty($homepageDetails->middle_image))
                    <img style="width:40px;" src="{{asset ('/images/backend_images/homepages/'.$homepageDetails->middle_image) }}"> 
                  @endif
                </div>
              </div>

              

              <div class="form-actions">
                <input type="submit" value="Customize homepage" class="btn btn-success">
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