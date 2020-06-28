@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Faqs</a> <a href="#" class="current">Edit faq</a> </div>
    <h1>Faqs</h1>
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
          <div class="widget-title"> <span class="icon"> <i class="icon-question-sign"></i> </span>
            <h5>Edit faq</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/admin/edit-faq/'.$faqDetails->id)}}" name="edit_faq" id="edit_faq" > {{csrf_field()}}
              
              <div class="control-group">
                <label class="control-label">Question</label>
                <div class="controls">
                    <textarea name="question" id="question" class="paragraph_cms" required>{{$faqDetails->question}}</textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Answer</label>
                <div class="controls">
                    <textarea name="answer" id="answer" class="textarea_admin" required>{{$faqDetails->answer}}</textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Active</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1" @if($faqDetails->status == "1") checked @endif>
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Edit faq" class="btn btn-success">
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