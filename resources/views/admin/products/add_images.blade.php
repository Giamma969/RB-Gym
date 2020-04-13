@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add product images</a> </div>
    <h1>Alternative product images</h1>
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
            <h5>Add product images</h5>
          </div>
          <div class="widget-content nopadding">
          <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('/admin/add-images/'.$productDetails->id)}}" name="add_image" id="add_image" > {{csrf_field()}}
            <input type="hidden"name="product_id" value="{{$productDetails->id}}"></input>
              
              <div class="control-group">
                <label class="control-label">Product name</label>
                <label class="control-label"><strong>{{ $productDetails->product_name }} </strong></label>
              </div>

              <div class="control-group">
                <label class="control-label">Product code</label>
                <label class="control-label"><strong>{{ $productDetails->product_code }} </strong></label>
              </div>

              <div class="control-group">
                <label class="control-label">Product color</label>
                <label class="control-label"><strong>{{ $productDetails->product_color }} </strong></label>
              </div>

              <div class="control-group">
                <label class="control-label">Alternative image</label>
                <div class="controls">
                  <input type="file" name="image[]" id="image" multiple="multiple" required>
                </div>
              </div>
        
              <div class="form-actions">
                <input type="submit" value="Add image" class="btn btn-success">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View images</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Image ID </th>
                  <th>Product ID</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
                <?php echo $productsImages; ?>
              </thead>
              <tbody> 
                 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection