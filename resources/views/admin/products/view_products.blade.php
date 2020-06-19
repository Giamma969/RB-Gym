@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">View products</a> </div>
    <h1>Products</h1>
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
            <h5>View products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Category ID</th>
                  <th>Product name</th>
                  <th>Product code</th>
                  <th>Product color</th>
                  <th>Brand</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Description code</th>
                  <!-- <th>Image</th> -->
                  <th>Active</th>
                  <th>Operations</th>
                </tr>
              </thead>
              <tbody>
              @foreach($products as $product)
                <tr class="gradeX">
                  <td>{{$product->id}}</td>
                  <td>{{$product->category_id}}</td>
                  <td style="max-width:20ch;">{{$product->product_name}}</td>
                  <td>{{$product->product_code}}</td>
                  <td>{{$product->product_color}}</td>
                  <td>{{$product->brand}}</td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->stock}}</td>
                  <td> <div style="overflow:auto; max-height:100px!important; max-width:25ch;">{{$product->description}}</div></td>
                  <td>
                    @if($product->status == 0)
                        <span style="color:red">Inactive</span>
                    @else 
                        <span style="color:green">Active</span>
                    @endif
                  </td>
                  <td style="max-width:50px" class="center">
                    <a style="width:80%;"  href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-success btn-mini" title="View">View</a>
                    <a style="width:80%;" float="clear" href="{{ url('/admin/edit-product/'.$product->id)  }} " class="btn btn-primary btn-mini" title="Edit">Edit</a>
                    <a style="width:80%;" href="{{ url('/admin/add-images/'.$product->id)  }} " class="btn btn-info btn-mini" title="Add images">Add images </a>  
                    <a style="width:80%; margin-top:-1px;" rel="{{ $product->id }}" rel1="delete-product"href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                  </td> 
                </tr>
                <div id="myModal{{$product->id}}" class="modal hide">
                <div class="modal-header">
                  <button data-dismiss="modal" class="close" type="button">×</button>
                  <h3><b>{{$product->product_name}}</b></h3>
                </div>
                <div class="modal-body">
                  <p><b>Product ID: </b> {{$product->id}}</p>
                  <p><b>Category ID: </b> {{$product->category_id}}</p>
                  <p><b>Product name: </b> {{$product->product_name}}</p>
                  <p><b>Product code: </b> {{$product->product_code}}</p>
                  <p><b>Product color: </b> {{$product->product_color}}</p>
                  <p><b>Brand: </b> {{$product->brand}}</p>
                  <p><b>Price: </b> {{$product->price}}</p>
                  <p><b>Stock: </b> {{$product->stock}}</p>
                  <p><b>Description: </b> {{$product->description}}</p>
                  <p><b>Status: </b> 
                    @if($product->status == 0)
                      Inactive
                    @else 
                      Active
                    @endif
                  </p>
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