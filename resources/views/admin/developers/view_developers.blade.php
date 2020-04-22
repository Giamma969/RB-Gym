@extends('layouts.adminLayout.admin_design')
@section('content')
@php use App\Developer; @endphp

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#">Developers</a>
            <a href="#" class="current">View developers</a> 
        </div>

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

    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>View developers</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Account status</th>
                                    <th>Creation date</th>
                                    <th>Actions ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($developers as $dev)
                                            <tr class="gradeX">
                                                <td class="center">{{$dev->user_id}}</td>
                                                <td class="center">{{$dev->user_name}}</td>
                                                <td class="center">{{$dev->user_surname}}</td>
                                                <td class="center">{{$dev->email}}</td>
                                                <td class="center">
                                                    @if($dev->status == 0)
                                                        <span style="color:red">Inactive</span>
                                                    @else 
                                                        <span style="color:green">Active</span>
                                                    @endif   
                                                </td>
                                                <td class="center">{{$dev->created_at}}</td>
                                                <td style="max-width:80px;" class="center">
                                                    <a style="width:90%;" href="{{ url('/admin/view-dev-groups/'.$dev->user_id) }} " class="btn btn-success btn-mini" title="Groups">View groups</a>
                                                    <a style="width:90%;" href="{{ url('/admin/edit-developer/'.$dev->user_id) }} " class="btn btn-primary btn-mini" title="Edit">Edit</a>
                                                    <a style="width:90%;" rel="{{$dev->user_id}}" rel1="delete-developer"  href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                                </td>
                                            </tr>
                                @endforeach
                                
                                <?php /*
                                        if(Developer::haveGroups($dev->user_id)){
                                            $groups = Developer::getGroupsDev($dev->user_id);
                                            $count = Developer::countGroups($dev->user_id);
                                            $first = Developer::getFirstGroup($dev->user_id);
                                            echo'<td class="center">'.$first->id.'</td>
                                                <td class="center">'.$first->name.'</td>
                                                </tr>';
                                            $i=1;
                                            foreach($groups as $group){
                                                if($i != 1){
                                                    echo'<tr class="gradeX">
                                                            <td class="center"></td>
                                                            <td class="center"></td>
                                                            <td class="center"></td>
                                                            <td class="center"></td>
                                                            <td class="center"></td>
                                                            <td class="center"></td>
                                                            <td class="center">'.$group->id.'</td>
                                                            <td class="center">'.$group->name.'</td>
                                                        </tr>';
                                                }
                                                $i++;
                                            }
                                            }else { echo'<td class="center"></td>
                                                        <td class="center"></td></tr>';}
                                    
                                     } */?>
                                    
                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection