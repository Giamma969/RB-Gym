@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Developers</a> <a href="#" class="current">Add developer</a> </div>
        <h1>Developers</h1>
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
                        <h5>Add developer</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('/admin/add-developer')}}" name="add_developer" id="add_developer" novalidate="novalidate"> {{csrf_field()}}
                        
                            <div class="control-group"> 
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" name="developer_name" id="developer_name">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Surnname</label>
                                <div class="controls">
                                    <input type="text" name="developer_surname" id="developer_surname">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="email" name="developer_email" id="developer_email">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Assign group</label>
                                <div class="controls">
                                    <select name="group_id" style="width: 220px;">
                                        <!-- return all groups-->
                                    </select>
                                </div>
                            </div>
                        
                        
                            <div class="control-group">
                                <label class="control-label">Active</label>
                                    <div class="controls">
                                        <input type="checkbox" name="status" id="status" value="1">
                                    </div>
                            </div>

                            <div class="form-actions">
                                <input type="submit" value="Add developer" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection